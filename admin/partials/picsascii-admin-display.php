<?php
/**
 * By: Symatic Solutions <info@symaticsolutions.com>
 * Website: http://www.symaticsolutions.com
 *
 *
 * Provide an admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://symaticsolutions.com
 * @since      1.0.0
 *
 * @package    Picsascii
 * @subpackage Picsascii/admin/partials
 */
?>
<style>
    .picsascii_title{display:block;font-weight:bold;font-family:Arial;letter-spacing:1px;font-size:18px}
    .bold{font-weight:bold}
    .card{margin: 10px}
    a{text-decoration:none}
    span.shortcode{font-size:18px;font-weight:600;letter-spacing:3px;background-color:#efefef;display:block;padding:10px 5px;text-align:center}
</style>

<div class="wrap">
    <h2><?php echo __('PicsAscii Settings', 'picsascii');?></h2>

    <div class="card pull-left">
        <h2 class="title"><?php echo __('Settings', 'picsascii'); ?></h2>
        <p>
            <?php echo __('Changing font size or line height will result in overall height and width of the ASCII image.', 'picsascii'); ?>
            <?php echo __('For better rendering of output try different values.', 'picsascii'); ?>
        </p>
        <form method="post" action="options.php">
            <?php settings_fields( 'picsascii-settings-group' );
            do_settings_sections( 'picsascii-settings-group' ); ?>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th>
                            <label><?php echo __('Font Size', 'picsascii'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="picsascii_font_size_x" value="<?php echo esc_attr( get_option('picsascii_font_size_x') ); ?>" size="2" />Px
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label><?php echo __('Line Height', 'picsascii'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="picsascii_font_size_y" value="<?php echo  esc_attr( get_option('picsascii_font_size_y') );?>" size="2" />Px
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label><?php echo __('Remove uploaded Image?', 'picsascii'); ?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="picsascii_remove_image" value="1" <?php echo (esc_attr( get_option('picsascii_remove_image') )) ? 'checked="checked"' : ''; ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

    <div class="card pull-left">
        <h2 class="title"><?php echo __('Sample Image', 'picsascii'); ?> :</h2>
        <pre style="font: <?php echo  esc_attr( get_option('picsascii_font_size_x') ); ?>px/<?php echo  esc_attr( get_option('picsascii_font_size_y') ); ?>px monospace;text-align:center"><?php require_once PICSASCII_DIR_PATH.'admin/static/wordpress-logo-picsascii.php'; ?></pre>
    </div>

    <div class="card pull-left">
        <h2 class="title"><?php echo __('Shortcode', 'picsascii'); ?></h2>
        <p>
            <?php echo __('A simple shortcode is what it needs.','picsascii'); ?>
            <br/><br/>
            <span class="shortcode">[picsascii]</span>
            <br/>
            <?php echo __('Use this shortcode anywhere in your page/post and enable a functionality to convert an image to its ASCII representation.', 'picsascii'); ?>
        </p>
        <br/><br/>
        <p style="text-align: center">
            <span class="picsascii_title"><?php echo __('PicsAscii', 'picsascii'); ?></span>
            <?php echo __('Version'); ?> <?php echo PICSASCII_VERSION; ?>
            <br><br>
            <i class="fa fa-code fa-lg" aria-hidden="true"></i>&nbsp;with&nbsp;<i class="fa fa-heart fa-lg" aria-hidden="true" style="color:red"></i>&nbsp;By&nbsp;<a href="https://symaticsolutions.com?ref=picsascii" target="_blank" class="bold">SYMATIC SOLUTIONS</a><br/>
            Code <i class="fa fa-code-fork fa-lg" aria-hidden="true"></i> By <a href="mailto:pagetelegram@gmail.com" target="_blank" class="bold">Jason Page</a>
        </p>
    </div>
</div>