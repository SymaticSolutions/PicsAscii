<?php

/**
 * By: Symatic Solutions <info@symaticsolutions.com>
 * Date: 21/1/17
 * Time: 2:43 PM
 * Website: http://www.symaticsolutions.com
 * Skype: symatic.solutions
 *
 * The public-facing functionality of the plugin.
 *
 * @link       http://symaticsolutions.com
 * @since      1.0.0
 *
 * @package    Picsascii
 * @subpackage Picsascii/public
 *
 * PHP Code contributed by Jason Page
 * Email: pagetelegram@gmail.com
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Picsascii
 * @subpackage Picsascii/public
 * @author     Symatic Solutions <info@symaticsolutions.com>
 */
class Picsascii_Public {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( ) {

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( PICSASCII_NAME, PICSASCII_DIR_PATH . 'css/picsascii-public.css', array(), PICSASCII_VERSION, 'all' );

	}

	/**
	 * check upload file and generate ascii values.
	 *
	 * @since	1.0.0
	 * @return  array
	 */
	private function upload_picsascii_file(){
		// check if form is submitted
		if(isset($_POST['action']) && $_POST['action']==='picsascii'){
			// check if file is uploaded.
			if(isset($_FILES['picsascii_image']) && !empty($_FILES['picsascii_image'])){

				// check file size
				if ($_FILES["picsascii_image"]["size"] > 5000000) {
					return array(
						'message'=> '<p class="message">' . __('Sorry, your file is too large','picsascii') . '</p>',
						'data' => ''
					);
				}

				// check if image
				$check = getimagesize($_FILES["picsascii_image"]["tmp_name"]);
				if($check === false) {
					return array(
						'message'=> '<p class="message">' . __('Please upload an image.', 'picsascii') . '</p>',
						'data' => ''
					);
				}

				// allow certain file types only
				$imageFileType = pathinfo(basename($_FILES["picsascii_image"]["name"]), PATHINFO_EXTENSION);
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
					return array(
						'message'=> '<p class="message">' . __('Sorry, only JPG, JPEG, PNG & GIF files are allowed.', 'picsascii') . '</p>',
						'data' => ''
					);
				}

				// if everything is open let WP handle upload.
				if ( ! function_exists( 'wp_handle_upload' ) ) {
					require_once( ABSPATH . 'wp-admin/includes/file.php' );
				}

				// bypass action check.
				$upload_overrides = array( 'test_form' => false );

				//move file
				$movefile = wp_handle_upload( $_FILES['picsascii_image'], $upload_overrides );

				if ( $movefile && ! isset( $movefile['error'] ) ) {
					if($movefile['type'] === 'image/jpeg'){
						$img = ImageCreateFromJpeg($movefile['file']);
					}
					$img = imagecreatefromstring(file_get_contents($movefile['file']));
					list($width, $height) = getimagesize($movefile['file']);
					$scale = 4;
					$chars = array('#', '0', 'X', 'T', '|', ':', '.', '\'', ' ');
					$chars = array_reverse($chars);
					$c_count = count($chars);
					$data = '<p class="picsascii_sucess">' . __('Click "Highlight All" and copy to clipboard and paste into any HTML field, TEXT page or post.', 'picsascii') . '</p>
					<div class="picsascii_image">
					<pre style="font:' . esc_attr( get_option('picsascii_font_size_x') ) . 'px/' . esc_attr( get_option('picsascii_font_size_y') ) . 'px monospace;">';

					$chars = array_reverse($chars);
					$c_count = count($chars);
					for($y = 0; $y <= $height - $scale - 1; $y += $scale) {
						for($x = 0; $x <= $width - ($scale / 2) - 1; $x += ($scale / 2)) {
							$rgb = imagecolorat($img, $x, $y);
							$red = (($rgb >> 16) & 0xFF);
							$green = (($rgb >> 8) & 0xFF);
							$blue = ($rgb & 0xFF);
							$sat = ($red + $green + $blue) / (255 * 3);
							$data .=  $chars[ (int)( $sat * ($c_count - 1) ) ] ;
						}
						$data .= '</br>';
						$data .= PHP_EOL;
					}

					$data .= '</div><form name="aspinc"><pre><div align="center">
					<input onclick="copyit(\'aspinc.select1\')" type="button" value="Highlight All" name="cpy">
					<p><textarea rows="10" class="codebox-sm" name="select1">';

					$data .= '<pre style="font: ' . esc_attr( get_option('picsascii_font_size_x') ) . 'px/' . esc_attr( get_option('picsascii_font_size_y') ) . 'px monospace;">';

					$chars = array_reverse($chars);
					$c_count = count($chars);

					for($y = 0; $y <= $height - $scale - 1; $y += $scale) {
						for($x = 0; $x <= $width - ($scale / 2) - 1; $x += ($scale / 2)) {
							$rgb = imagecolorat($img, $x, $y);
							$red = (($rgb >> 16) & 0xFF);
							$green = (($rgb >> 8) & 0xFF);
							$blue = ($rgb & 0xFF);
							$sat = ($red + $green + $blue) / (255 * 3);
							$data .= $chars[ (int)( $sat * ($c_count - 1) ) ] ;
						}
						$data .= '</br>';
						$data .= PHP_EOL;
					}

					$data .= '</pre>';
					$data .= '</textarea></p></pre></div></form>';
					$data .= '<script>//<!-- start
								function copyit(theField) {
								    var tempval=eval("document."+theField);
								    tempval.focus();
								    tempval.select();
								    therange=tempval.createTextRange();
								    therange.execCommand("Copy");
								} //End -->
                            </script>';

					// remove image is setting says so
					if(esc_attr( get_option('picsascii_remove_image') )){
						unlink($movefile['file']);
					}

					return array(
						'message'=> '',
						'data' => $data
					);

				} else {
					/**
					 * Error generated by _wp_handle_upload()
					 * @see _wp_handle_upload() in wp-admin/includes/file.php
					 */
					return array(
						'message'=> '<p class="message">' . $movefile['error'] . '</p>',
						'data' => ''
					);
				}
			}
		}else{
            return array(
                'message'=> '',
                'data' => ''
            );
        }
	}

	/**
	 * Shortcode callback function
	 *
	 * @since	1.0.0
	 * @param 	$attributes
	 *
	 * @return 	string
	 */
	public function picsascii_shortcode_fn($attributes){

		$data = $this->upload_picsascii_file();

		$form = '<form class="picsascii_form" action="" enctype="multipart/form-data" method="post">' .
					$data['message'] .
					'<p><strong>' . __('PicsAscii', 'picsascii') . '</strong><br/>' . __('Convert Image to ASCII image.','picsascii') . '</p>
    				<input type="file" name="picsascii_image" id="picsascii_image">
    				<input type="hidden" name="action" value="picsascii">
    				<input type="submit" value="' . __('Convert to ASCII', 'picsascii') . '" name="submit">
				</form>';

		return $form . $data['data'];
	}

}