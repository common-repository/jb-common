=== JB Common ===
Contributors: JoanBotella
Donate link: http://www.joanbotella.com/
Tags: common, feature, attachments, auto format, w3c, validator, maintenance, debug, footer, e-mail, favicon, head, meta tag, log, bio, feeds, shorcode, widget, current URL, is login, is register, append vars
Requires at least: 3.5.1
Tested up to: 3.5.1
Stable tag: 1.0
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl.html

A plugin with common features missed in WordPress, like favicon, meta tags, 
adding HTML to head and footer, WordPress e-mail from header filter, etc.

== Description ==

A plugin with common features missed in WordPress, like favicon, meta tags,
adding HTML to head and footer, WordPress e-mail from header filter, etc.

I've developed this plugin for my own job. I've realized that when I create a 
new WordPress project, there are some features I have to plugin every time. I 
decided to bundle they all into a single plugin, and I'm publishing it for 
other creators who may find it useful too.

Take a look to the [Changelog](http://wordpress.org/extend/plugins/jb-common/changelog/ "Go to the Changelog section") 
for a complete feature list, you may be interested in some of them.

== Installation ==

1. Unzip `jb-common.zip` inside the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Customize the plugin options for your own site.

== Frequently Asked Questions ==

= Why not writting a plugin for each feature? =

This plugin was designed for creating new WordPress sites faster, and
managing one plugin is faster than managing many.

= I need only one of your features and I don't want to install them all =

Feel free to copy the code from that feature to your own plugin, but remember
the GNU/GPLv3 or later license!

= Will you add new features in the next version? =

Maybe. I accept suggestions, tell me on [the plugin's WordPress Extend support section](http://wordpress.org/support/plugin/jb-common "Go to the Support section")
if you have one. Only features useful on most blogs will be included.

== Screenshots ==

1. Detail of the popping group on the admin bar. Mind the users and plugins 
shortcuts, and the W3C validator link for the current URL.
1. The JB Common Configuration admin section. Each option is listed as name,
description, custom value and default value.
1. The section for viewing the JB Common log contents. If you integrate the 
log system with your software, you can view your outputs
here.
1. The info admin section. A complete reference for all functions, 
shortcodes, widgets and features.


== Changelog ==

= 1.0 =

* Available languages: english (default), castillian (spanish) (es_ES).

* Some integration with the [Attachments plugin](http://wordpress.org/extend/plugins/attachments/ "Go to WordPress.org Extend entry for the plugin Attachments")
by [Jonathan Christopher](https://github.com/jchristopher/attachments "Go to Jonathan Christopher GitHub site").
(Option `jbcommon_attachments_meta_key`)

* Disable the WordPress auto format feature for exact HTML editing.
(Option `jbcommon_auto_format`)

* W3C Validator link on Admin Bar for entries code validation.
(Option `jbcommon_show_validator_link`)

* Maintenance mode for redirecting your visitors to a custom "under
maintenance" page.
(Options `jbcommon_maintenance_mode` , `jbcommon_maintenance_url` ,
 `jbcommon_maintenance_key` and `jbcommon_maintenance_value`)

* Enable the WordPress debug mode without modifying the wp-config.php
(Option `jbcommon_debug_mode`)

* Text box for inserting custom text on footer, using the wp_footer
hook.
(Option `jbcommon_footer`)

* Filter the WordPress e-mails name and address, for avoiding the
default "WordPress wordpress@your.domain" header.
(Options `jbcommon_email_from_address` and `jbcommon_email_from_name`)

* Add your custom favicon by URL.
(Options `jbcommon_favicon_mime` and `jbcommon_favicon_url`)

* Text box for inserting custom text on head, using the wp_head hook.
(Option `jbcommon_head`)

* Text boxes for some common meta tags like keywords and description,
and override the WordPress generator meta tag for avoid version echoing.
(Options `jbcommon_meta_tag_author` , `jbcommon_meta_tag_description` ,
 `jbcommon_meta_tag_generator` , `jbcommon_meta_tag_keywords` )

* Log features that you can integrate on your own code, with multiple
verbose levels for displaying on screen and writting to a file.
(Options `jbcommon_log` , `jbcommon_log_session_key` ,
 `jbcommon_log_file` , `jbcommon_log_file_max_lines` ,
 `jbcommon_log_level_file` , `jbcommon_log_level_display_admin` ,
 `jbcommon_log_level_display` )

* Author bio echoing.
(Widget `JBCommon_Bio_Widget` and shortcode `jbcommon_sc_bio`)

* Contexted feeds, for example, echoing only the category feed link on
category pages.
(Widget `JBCommon_Feeds_Widget` and shortcode `jbcommon_sc_feeds`)

* Shortcode for calling PHP functions.
(Shortcode `jbcommon_sc_call_function`)

* Shortcode for echoing PHP constants.
(Shortcode `jbcommon_sc_get_constant`)

* Add an admin menu separator.
(Function `jbcommon_add_admin_menu_separator($position)` )

* Echo the attachments from the Attachments plugin.
(Function `jbcommon_echo_attachments($header_level=4)` )

* Retrieve an admin page URL.
(Function `jbcommon_get_admin_page_url($page)` )

* Retrieve the current admin page permalink.
(Function `jbcommon_get_admin_permalink()` )

* Retrieve the current URL, not only inside The Loop like
get_permalink requires.
(Function `jbcommon_get_current_url()` )

* Retrieve the current category for the pre_get_posts hook.
(Function `jbcommon_get_query_category($wp_query=false)` )

* Retrieve the URL for the W3C validation for the current URL.
(Function `jbcommon_get_validator_url($url=false)` )

* Check if all elements inside an array are of a specified type.
(Function `jbcommon_is_array_of($a,$class)` )

* Check if the current page is the login one.
(Function `jbcommon_is_login_page()` )

* Check if the current page is the register one.
(Function `jbcommon_is_register_page()` )

* Echo the print_r PHP function wrapped between `<pre>` and `</pre>`.
(Function `jbcommon_print_r($var)` )

* Retrieve an URL with some vars appended.
(Function `jbcommon_url_append_vars($vars,$url=false,$entity=true)` )