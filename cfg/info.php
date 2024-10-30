<?php



// --- RESOURCES -------------------------------------------------------------

define('JBCOMMON_INFO_RESOURCES_LABELS',serialize(array(
	__('Name:',JBCOMMON_TEXT_DOMAIN),
	__('View the resource:',JBCOMMON_TEXT_DOMAIN),
	__('Description:',JBCOMMON_TEXT_DOMAIN),
	__('Author:',JBCOMMON_TEXT_DOMAIN),
	__('Author URI:',JBCOMMON_TEXT_DOMAIN),
	__('License:',JBCOMMON_TEXT_DOMAIN),
	__('Obtained from:',JBCOMMON_TEXT_DOMAIN),
)));

define('JBCOMMON_INFO_RESOURCES',serialize(array(
	array(
		'application_x_desktop.png',
		'<a href="'.JBCOMMON_PLUGIN_URL.'/'.JBCOMMON_IMG_DIR.'/application_x_desktop.oxygen-team.gnu_gpl.32x32.png" title="'.__('View the resource',JBCOMMON_TEXT_DOMAIN).'" target="_blank">application_x_desktop.oxygen-team.gnu_gpl.32x32.png</a>',
		__('Icon for the Configuration admin section. From the Oxygen icons package.',JBCOMMON_TEXT_DOMAIN),
		'Oxygen-Team',
		'<a href="http://www.oxygen-icons.org/" title="Go to the author\'s website" target="_blank">http://www.oxygen-icons.org/</a>',
		__('GNU/GPL',JBCOMMON_TEXT_DOMAIN),
		'<a href="http://findicons.com/icon/238220/application_x_desktop?width=32" title="'.__('Go to the resource source',JBCOMMON_TEXT_DOMAIN).'" target="_blank">http://findicons.com/icon/238220/application_x_desktop?width=32</a>'
	),
	array(
		'document-properties.png',
		'<a href="'.JBCOMMON_PLUGIN_URL.'/'.JBCOMMON_IMG_DIR.'/document-properties.oxygen-team.gnu_gpl.32x32.png" title="'.__('View the resource',JBCOMMON_TEXT_DOMAIN).'" target="_blank">document-properties.oxygen-team.gnu_gpl.32x32.png</a>',
		__('Icon for the About admin section. From the Oxygen icons package.',JBCOMMON_TEXT_DOMAIN),
		'Oxygen-Team',
		'<a href="http://www.oxygen-icons.org/" title="Go to the author\'s website" target="_blank">http://www.oxygen-icons.org/</a>',
		__('GNU/GPL',JBCOMMON_TEXT_DOMAIN),
		'<a href="http://findicons.com/icon/238095/document_properties?width=32" title="'.__('Go to the resource source',JBCOMMON_TEXT_DOMAIN).'" target="_blank">http://findicons.com/icon/238095/document_properties?width=32</a>'
	),
	array(
		'edit.png',
		'<a href="'.JBCOMMON_PLUGIN_URL.'/'.JBCOMMON_IMG_DIR.'/edit.oxygen-team.gnu_gpl.32x32.png" title="'.__('View the resource',JBCOMMON_TEXT_DOMAIN).'" target="_blank">edit.oxygen-team.gnu_gpl.32x32.png</a>',
		__('Icon for the Show Log admin section. From the Oxygen icons package.',JBCOMMON_TEXT_DOMAIN),
		'Oxygen-Team',
		'<a href="http://www.oxygen-icons.org/" title="Go to the author\'s website" target="_blank">http://www.oxygen-icons.org/</a>',
		__('GNU/GPL',JBCOMMON_TEXT_DOMAIN),
		'<a href="http://findicons.com/icon/237878/edit?width=32" title="'.__('Go to the resource source',JBCOMMON_TEXT_DOMAIN).'" target="_blank">http://findicons.com/icon/237878/edit?width=32</a>'
	),
	array(
		'help_contents.png',
		'<a href="'.JBCOMMON_PLUGIN_URL.'/'.JBCOMMON_IMG_DIR.'/help_contents.oxygen-team.gnu_gpl.16x16.png" title="'.__('View the resource',JBCOMMON_TEXT_DOMAIN).'" target="_blank">help_contents.oxygen-team.gnu_gpl.16x16.png</a>',
		__('Icon for the Reference admin section. From the Oxygen icons package.',JBCOMMON_TEXT_DOMAIN),
		'Oxygen-Team',
		'<a href="http://www.oxygen-icons.org/" title="Go to the author\'s website" target="_blank">http://www.oxygen-icons.org/</a>',
		__('GNU/GPL',JBCOMMON_TEXT_DOMAIN),
		'<a href="http://findicons.com/icon/237703/help_contents?width=32" title="'.__('Go to the resource source',JBCOMMON_TEXT_DOMAIN).'" target="_blank">http://findicons.com/icon/237703/help_contents?width=32</a>'
	),
	array(
		'love.png',
		'<a href="'.JBCOMMON_PLUGIN_URL.'/'.JBCOMMON_IMG_DIR.'/love.oxygen-team.gnu_gpl.16x16.png" title="'.__('View the resource',JBCOMMON_TEXT_DOMAIN).'" target="_blank">love.oxygen-team.gnu_gpl.16x16.png</a>',
		__('Icon for the Thank You admin section. From the Oxygen icons package.',JBCOMMON_TEXT_DOMAIN),
		'Oxygen-Team',
		'<a href="http://www.oxygen-icons.org/" title="Go to the author\'s website" target="_blank">http://www.oxygen-icons.org/</a>',
		__('GNU/GPL',JBCOMMON_TEXT_DOMAIN),
		'<a href="http://findicons.com/icon/237774/love?width=32" title="'.__('Go to the resource source',JBCOMMON_TEXT_DOMAIN).'" target="_blank">http://findicons.com/icon/237774/love?width=32</a>'
	),
	array(
		'rss.png',
		'<a href="'.JBCOMMON_PLUGIN_URL.'/'.JBCOMMON_IMG_DIR.'/rss.oxygen-team.gnu_gpl.16x16.png" title="'.__('View the resource',JBCOMMON_TEXT_DOMAIN).'" target="_blank">rss.oxygen-team.gnu_gpl.16x16.png</a>',
		__('Icon for styling the web feeds lists. From the Oxygen icons package.',JBCOMMON_TEXT_DOMAIN),
		'Oxygen-Team',
		'<a href="http://www.oxygen-icons.org/" title="Go to the author\'s website" target="_blank">http://www.oxygen-icons.org/</a>',
		__('GNU/GPL',JBCOMMON_TEXT_DOMAIN),
		'<a href="http://findicons.com/icon/237967/rss?width=16" title="'.__('Go to the resource source',JBCOMMON_TEXT_DOMAIN).'" target="_blank">http://findicons.com/icon/237967/rss?width=16</a>'
	),
	array(
		'xemacs.png',
		'<a href="'.JBCOMMON_PLUGIN_URL.'/'.JBCOMMON_IMG_DIR.'/xemacs.oxygen-team.gnu_gpl.16x16.png" title="'.__('View the resource',JBCOMMON_TEXT_DOMAIN).'" target="_blank">xemacs.oxygen-team.gnu_gpl.16x16.png</a>',
		__('Icon for the License admin section. From the Oxygen icons package.',JBCOMMON_TEXT_DOMAIN),
		'Oxygen-Team',
		'<a href="http://www.oxygen-icons.org/" title="Go to the author\'s website" target="_blank">http://www.oxygen-icons.org/</a>',
		__('GNU/GPL',JBCOMMON_TEXT_DOMAIN),
		'<a href="http://findicons.com/icon/238271/xemacs?width=32" title="'.__('Go to the resource source',JBCOMMON_TEXT_DOMAIN).'" target="_blank">http://findicons.com/icon/238271/xemacs?width=32</a>'
	)
)));



// --- SHORTCODES -------------------------------------------------------------

define('JBCOMMON_INFO_SHORTCODES_LABELS',serialize(array(
	__('Name:',JBCOMMON_TEXT_DOMAIN),
	__('Description:',JBCOMMON_TEXT_DOMAIN),
	__('Arguments:',JBCOMMON_TEXT_DOMAIN),
	__('Content:',JBCOMMON_TEXT_DOMAIN),
	__('Examples:',JBCOMMON_TEXT_DOMAIN)
)));

define('JBCOMMON_INFO_SHORTCODES',serialize(array(
	array(
		'jbcommon_sc_bio',
		__('Shows an user avatar and description, just like the <a href="#JBCommon_Bio_Widget" title="Go to JBCommon_Bio_Widget reference">JBCommon_Bio_Widget</a> does.',JBCOMMON_TEXT_DOMAIN),
		array(
			'uid'=>__('User ID. Defaults to the current post author ID.',JBCOMMON_TEXT_DOMAIN),
			'class'=>__('Class for the div container. Defaults to "jbcommon_sc_bio".',JBCOMMON_TEXT_DOMAIN)
		),
		__('If any, overwrite the "uid" argument value.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>[jbcommon_sc_bio]</code>',
			'<code>[jbcommon_sc_bio uid="3" class="friend-bio"]</code>'
		)
	),
	array(
		'jbcommon_sc_call_function',
		__('Calls the PHP function <code><a href="http://php.net/manual/en/function.call-user-func-array.php" title="Go to PHP.net post about call_user_func_array" target="_blank">call_user_func_array</a>($func,explode($params_separator,$params))</code>, with the specified parameters.',JBCOMMON_TEXT_DOMAIN),
		array(
			'func'=>__('Function name.',JBCOMMON_TEXT_DOMAIN),
			'params'=>__('The parameters for the function, separated by "params_separator".',JBCOMMON_TEXT_DOMAIN),
			'params_separator'=>__('The character for separating parameters in the "params" string. Defaults to a comma (,).',JBCOMMON_TEXT_DOMAIN),
		),
		__('If any, overwrite the "params" argument value.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>[jbcommon_sc_call_function func="jbcommon_get_current_url"]</code>',
			'<code>[jbcommon_sc_call_function func="get_post_meta" params="23,thumb"]</code>'
		)
	),
	array(
		'jbcommon_sc_feeds',
		__('Shows the available web feeds for the current content, in Atom and RSS v2.0 formats, just like the <a href="#JBCommon_Feeds_Widget" title="Go to JBCommon_Feeds_Widget reference">JBCommon_Feeds_Widget</a> does.',JBCOMMON_TEXT_DOMAIN),
		array(
			'id'=>__('Id for the div container. Required for the dynamic behavior, if none is passed a plain list will be echoed.',JBCOMMON_TEXT_DOMAIN),
			'class'=>__('Class for the div container. Defaults to "jbcommon_sc_feeds".',JBCOMMON_TEXT_DOMAIN)
		),
		__('If any, overwrite the "id" argument value.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>[jbcommon_sc_feeds]</code>',
			'<code>[jbcommon_sc_feeds id="my-feeds" class="beautiful-box"]</code>'
		)
	),
	array(
		'jbcommon_sc_get_constant',
		__('Shows the value of the passed constant. If the constant is not defined shows the "c" argument value.',JBCOMMON_TEXT_DOMAIN),
		array(
			'c'=>__('Constant name.',JBCOMMON_TEXT_DOMAIN)
		),
		__('If any, overwrite the "c" argument value.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>[jbcommon_sc_get_constant c="JBCOMMON_PLUGIN_NAME"]</code>'
		)
	)
)));



// --- WIDGETS -------------------------------------------------------------

define('JBCOMMON_INFO_WIDGETS_LABELS',serialize(array(
	__('Name:',JBCOMMON_TEXT_DOMAIN),
	__('Description:',JBCOMMON_TEXT_DOMAIN),
	__('Widget arguments:',JBCOMMON_TEXT_DOMAIN),
	__('Static method arguments:',JBCOMMON_TEXT_DOMAIN),
)));

define('JBCOMMON_INFO_WIDGETS',serialize(array(
	array(
		'JBCommon_Bio_Widget',
		__('Shows an user avatar and description. Uses its static method <code>JBCommon_Bio_Widget::echo_bio($uid=false)</code> that can be called from elsewhere, including a theme.',JBCOMMON_TEXT_DOMAIN),
		array(
			'title'=>__('The widget title.',JBCOMMON_TEXT_DOMAIN),
			'uid'=>__('User ID.',JBCOMMON_TEXT_DOMAIN)
		),
		array(
			'uid'=>__('User ID. Defaults to the current post author.',JBCOMMON_TEXT_DOMAIN)
		)
	),
	array(
		'JBCommon_Feeds_Widget',
		__('Shows the available web feeds for the current content, in Atom and RSS v2.0 formats. Uses its static method <code>JBCommon_Feeds_Widget::echo_feeds($container_id=false)</code> that can be called from elsewhere, including a theme.',JBCOMMON_TEXT_DOMAIN),
		array(
			'title'=>__('The widget title.',JBCOMMON_TEXT_DOMAIN)
		),
		array(
			'container_id'=>__('Id for the div container. The widget assign its own id and can\'t be modified. Defaults to "jbcommon_sc_feeds".',JBCOMMON_TEXT_DOMAIN)
		)
	)
)));



// --- FUNCTIONS -------------------------------------------------------------

define('JBCOMMON_INFO_FUNCTIONS_LABELS',serialize(array(
	__('Name:',JBCOMMON_TEXT_DOMAIN),
	__('Description:',JBCOMMON_TEXT_DOMAIN),
	__('Arguments:',JBCOMMON_TEXT_DOMAIN),
	__('Returns:',JBCOMMON_TEXT_DOMAIN),
	__('Examples:',JBCOMMON_TEXT_DOMAIN)
)));

define('JBCOMMON_INFO_FUNCTIONS',serialize(array(
	array(
		'jbcommon_add_admin_menu_separator($position)',
		__('Adds a separation between two sections on the admin section left column, at the passed $position. Based on Mike Schinkel snippet from <a href="http://wordpress.stackexchange.com/questions/2666/add-a-separator-to-the-admin-menu" title="Go to the source URL" target="_blank">this URL</a>.',JBCOMMON_TEXT_DOMAIN),
		array(
			'$position'=>__('$GLOBALS[\'menu\'] index to place the separation into.',JBCOMMON_TEXT_DOMAIN)
		),
		__('Anything.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>&lt;?php jbcommon_add_admin_menu_separator(32);?&gt;</code>'
		)
	),
	array(
		'jbcommon_echo_attachments($header_level=4)',
		__('Echoes the attachments for the current post or page defined with the <a href="https://github.com/jchristopher/attachments" title="Go to the Attachments plugin website" target="_blank">Attachments plugin by Jonathan Christopher</a>. You can download the plugin from <a href="http://wordpress.org/extend/plugins/attachments/" title="Go to the WordPress.org Extend entry for the Attachments plugin" target="_blank">its WordPress Extend page</a>. Useful for <a href="https://codex.wordpress.org/Plugin_API/Filter_Reference/the_content" title"Go to the WordPress Codex entry about the the_content filter" target="_blank">filtering the_content</a>.',JBCOMMON_TEXT_DOMAIN),
		array(
			'$header_level'=>__('The level for the h header tag (h1,h2,h3,h4,h5 or h6). Defaults to 4, because the post entries are under an h3.',JBCOMMON_TEXT_DOMAIN)
		),
		__('Anything.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>&lt;?php jbcommon_echo_attachments();?&gt;</code>'
		)
	),
	array(
		'jbcommon_get_admin_page_url($page)',
		__('Returns the admin URL for the passed $page URL.',JBCOMMON_TEXT_DOMAIN),
		array(
			'$page'=>__('The page slug you want to get.',JBCOMMON_TEXT_DOMAIN)
		),
		__('A string containing the URL.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>&lt;?php echo jbcommon_get_admin_page_url(\'jbcommon-configuration#jbcommon_maintenance_mode\');?&gt;</code>'
		)
	),
	array(
		'jbcommon_get_admin_permalink()',
		__('Returns the permalink for the current page.',JBCOMMON_TEXT_DOMAIN),
		__('Anything.',JBCOMMON_TEXT_DOMAIN),
		__('A string containing the URL.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>&lt;?php echo jbcommon_get_admin_permalink();?&gt;</code>'
		)
	),
	array(
		'jbcommon_get_current_url()',
		__('Returns the current URL for any page, get parameters included, and do not need to be inside The Loop like the get_permalink() function.',JBCOMMON_TEXT_DOMAIN),
		__('Anything.',JBCOMMON_TEXT_DOMAIN),
		__('A string containing the URL.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>&lt;form action="&lt;?php echo jbcommon_get_current_url();?&gt;" method="post"&gt;</code>'
		)
	),
	array(
		'jbcommon_get_query_category($wp_query=false)',
		__('Returns the category object for the category in the $wp_query query object. Useful where the get_the_category is not set yet, for example, the pre_get_posts action.',JBCOMMON_TEXT_DOMAIN),
		array(
			'$wp_query'=>__('The query for searching the category. Defaults to the $GLOBALS[\'wp_query\'].',JBCOMMON_TEXT_DOMAIN)
		),
		__('The category object (term_id, name, slug, term_group, taxonomy, description, parent, count, cat_ID, category_count, category_description, cat_name, category_nicename, category_parent) if found, the boolean false if not.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>&lt;?php $cat=jbcommon_get_query_category(); if($cat->name==\'forbidden\'){wp_safe_redirect(home_url());exit;}?&gt;</code>'
		)
	),
	array(
		'jbcommon_get_validator_url($url=false)',
		__('Returns the passed $url encoded into an URL for the W3C Validation service.',JBCOMMON_TEXT_DOMAIN),
		array(
			'$url'=>__('The URL to encode, for validation. Defaults to the current URL.',JBCOMMON_TEXT_DOMAIN)
		),
		__('A string containing the URL.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>&lt;a href="&lt;?php echo jbcommon_get_validator_url();?&gt;" title="Validate this URL">Validate&lt;/a&gt;</code>',
			'<code>&lt;a href="&lt;?php echo jbcommon_get_validator_url(\'http://www.google.com\');?&gt;" title="Validate Google"&gt;I thought Google respects the standards!&lt;/a&gt;</code>'
		)
	),
	array(
		'jbcommon_is_array_of($a,$class)',
		__('Checks if $a is an array and all its elements are instances of the $class string.',JBCOMMON_TEXT_DOMAIN),
		array(
			'$a'=>__('Suppossed array for checking its elements.',JBCOMMON_TEXT_DOMAIN),
			'$class'=>__('Name of the class for the elements.',JBCOMMON_TEXT_DOMAIN)
		),
		__('Returns booleans true or false.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>&lt;?php if(jbcommon_is_array_of($loggers_bundle,\'JBCommon_Logger\')){echo \'They\'re loggers!\';}?&gt;</code>'
		)
	),
	array(
		'jbcommon_is_login_page()',
		__('Checks if current page is the WordPress login one. Based on Amereservant snippet from <a href="http://stackoverflow.com/questions/5266945/wordpress-how-detect-if-current-page-is-the-login-page" title="Go to the source URL" target="_blank">this URL</a>.',JBCOMMON_TEXT_DOMAIN),
		__('Anything.',JBCOMMON_TEXT_DOMAIN),
		__('Returns booleans true or false.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>&lt;?php if(jbcommon_is_login_page()){echo \'Welcome to the login page!\';?&gt;</code>'
		)
	),
	array(
		'jbcommon_is_register_page()',
		__('Checks if current page is the WordPress register one. Based on Amereservant snippet from <a href="http://stackoverflow.com/questions/5266945/wordpress-how-detect-if-current-page-is-the-login-page" title="Go to the source URL" target="_blank">this URL</a>.',JBCOMMON_TEXT_DOMAIN),
		__('Anything.',JBCOMMON_TEXT_DOMAIN),
		__('Returns booleans true or false.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>&lt;?php if(jbcommon_is_register_page()){echo \'Welcome to the register page!\';?&gt;</code>'
		)
	),
	array(
		'jbcommon_print_r($var)',
		__('Echoes the PHP print_r function for the passed $var, wrapped into &lt;pre&gt;&lt;/pre&gt; tags for enhace readability.',JBCOMMON_TEXT_DOMAIN),
		array(
			'$var'=>__('Variable to inspect.',JBCOMMON_TEXT_DOMAIN)
		),
		__('Anything.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>&lt;?php jbcommon_print_r($_SESSION);?&gt;</code>'
		)
	),
	array(
		'jbcommon_url_append_vars($vars,$url=false,$entity=true)',
		__('Returns the $url with the $vars appended as GET variables. If $entity is true, the HTML entity &amp;amp; will be used instead of a simple &amp;.',JBCOMMON_TEXT_DOMAIN),
		array(
			'$vars'=>__('An associative array with the vars names and values to be appended.',JBCOMMON_TEXT_DOMAIN),
			'$url'=>__('The URL for appending to the vars, defaults to the current URL.',JBCOMMON_TEXT_DOMAIN),
			'$entity'=>__('If true the vars are appended with the HTML entity &amp;amp;, else with a simple &amp;.',JBCOMMON_TEXT_DOMAIN)
		),
		__('A string containing the URL.',JBCOMMON_TEXT_DOMAIN),
		array(
			'<code>&lt;?php echo jbcommon_url_append_vars(array(\'s\'=>\'WordPress\'),\'http://www.joanbotella.com/\');?&gt;</code>'
		)
	)
)));



// --- LOGGER -------------------------------------------------------------

define('JBCOMMON_INFO_LOGGER_METHODS',serialize(array(
	'echo_box($entries)'=>__('Echoes a div with the passed $entries, that must be an array of JBCommon_Log_Entry instances, with a class attribute for the entries level. Why are you using this directly?.',JBCOMMON_TEXT_DOMAIN),
	'echo_boxes($empty_buffer=false)'=>__('Calls multiple times to echo_box($entries) for echoing the log buffer content. Flushes the log buffer only on $empty_buffer=true. Useful on admin pages header for showing messages to the user.',JBCOMMON_TEXT_DOMAIN),
	'get_log_file()'=>__('Retrieves the current log file path.',JBCOMMON_TEXT_DOMAIN),
	'log($t,$l=false)'=>__('Pushes the $t message, with $l level, to the log buffer. The level defaults to JBCOMMON_LOG_LEVEL_MESSAGE . It\'s surely the most important and useful method for you.',JBCOMMON_TEXT_DOMAIN),
	'write_file()'=>__('Writes the log buffer content into the log file, and empties the buffer. The JB Common plugin does this at shutdown automatically.',JBCOMMON_TEXT_DOMAIN)
)));

define('JBCOMMON_INFO_LOGGER_LEVELS',serialize(array(
	'JBCOMMON_LOG_LEVEL_DEBUG'=>__('Variable values and other debug data for the developer eyes only.',JBCOMMON_TEXT_DOMAIN),
	'JBCOMMON_LOG_LEVEL_VERBOSE'=>__('Detailed messages that are not needed usually.',JBCOMMON_TEXT_DOMAIN),
	'JBCOMMON_LOG_LEVEL_MESSAGE'=>__('Common texts to explain briefly what is going on.',JBCOMMON_TEXT_DOMAIN),
	'JBCOMMON_LOG_LEVEL_WARNING'=>__('Messages explaining a non fatal wrong behavior.',JBCOMMON_TEXT_DOMAIN),
	'JBCOMMON_LOG_LEVEL_ERROR'=>__('Something went really bad!',JBCOMMON_TEXT_DOMAIN),
	'JBCOMMON_LOG_LEVEL_DISABLED'=>__('Enjoy the silence.',JBCOMMON_TEXT_DOMAIN)
)));



// --- DB-WRAPPER -------------------------------------------------------------

// define('JBCOMMON_INFO_DB_WRAPPER_METHODS',serialize(array(
// 	'get_results($query,$output_type,$log_errors=true,$log_query=false)'=>__('',JBCOMMON_TEXT_DOMAIN),
// 	'get_var($query,$log_errors=true,$log_query=false)'=>__('',JBCOMMON_TEXT_DOMAIN),
// 	'query($queries,$log_errors=true,$log_query=false)'=>__('',JBCOMMON_TEXT_DOMAIN),
// )));

?>
