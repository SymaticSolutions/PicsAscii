=== PicsAscii ===
Contributors: symatic, saurin
Tags: Picture, Ascii, PicAscii, PicsAscii
Donate link:
Requires at least: 4.5
Tested up to: 5.3.0
Stable tag: 1.0.1
License: GPL-3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.txt

A Simple WordPress Plugin to Convert Image to ASCII Representation.

== Description ==
This plugin converts images to their ASCII representation. This plugin is useful to convert images for websites those do not support adding of image as part of user content. You can always convert image and paste the result in user content area to show image using ASCII codes.

Find out more at https://github.com/SymaticSolutions/PicsAscii

Follow us on Twitter: @symaticsolution

== Installation ==
**The easy way:**

    1. Go to the Plugins Menu in WordPress.
    2. Search for "PicsAscii".
    3. Click "Install".

**The not so easy way:**

    1. Download latest stable copy of this plugin from github and extract it.
    2. Upload the "src" folder to the /wp-content/plugins/ directory and rename it to "PicsAscii".
    3. Activate the plugin through the 'Plugins' menu in WordPress.
    4. Manage plugin settings using the 'PicsAscii' menu option.

== Frequently Asked Questions ==
= Why resulting image not showing in proper dimension? =
To render ASCII image output, "&lt;pre&gt;" tag is used. There might be some CSS being applied to this tag either from your theme or plugin CSS. Please remove such CSS for ASCII images to render correctly.