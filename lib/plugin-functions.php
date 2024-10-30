<?php

function jbcommon_add_admin_menu(){

	$position=(int) get_option('jbcommon_menu_position');

	jbcommon_add_admin_menu_separator($position);

	//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	add_menu_page(__('Configuration',JBCOMMON_TEXT_DOMAIN),__('JB Common',JBCOMMON_TEXT_DOMAIN),'manage_options','jbcommon-configuration','jbcommon_configuration',JBCOMMON_PLUGIN_URL.'/'.JBCOMMON_PLUGIN_ICON,$position+1);

	$title_postfix=' &lsaquo; '.__('JB Common',JBCOMMON_TEXT_DOMAIN);

// 	add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
// 	add_submenu_page('jbcommon-',__('',JBCOMMON_TEXT_DOMAIN).$title_postfix,__('',JBCOMMON_TEXT_DOMAIN),'manage_options','jbcommon-','jbcommon_');

	$parent_slug='jbcommon-configuration';
	$capability='manage_options';

	add_submenu_page($parent_slug,__('Configuration',JBCOMMON_TEXT_DOMAIN).$title_postfix,__('Configuration',JBCOMMON_TEXT_DOMAIN),$capability,'jbcommon-configuration','jbcommon_configuration');
	add_submenu_page($parent_slug,__('Show Log',JBCOMMON_TEXT_DOMAIN).$title_postfix,__('Show Log',JBCOMMON_TEXT_DOMAIN),$capability,'jbcommon-show-log','jbcommon_show_log');
	add_submenu_page($parent_slug,__('Info',JBCOMMON_TEXT_DOMAIN).$title_postfix,__('Info',JBCOMMON_TEXT_DOMAIN),$capability,'jbcommon-info','jbcommon_info');

	jbcommon_add_admin_menu_separator($position+3);

}

function jbcommon_admin_header($section_title){
?>
	<header>
		<img src="<?php echo JBCOMMON_PLUGIN_URL.'/'.JBCOMMON_PLUGIN_LOGO;?>" alt="<?php _e('JB Common logo',JBCOMMON_TEXT_DOMAIN);?>" />
		<h1><?php echo __('JB Common',JBCOMMON_TEXT_DOMAIN).' &rsaquo; '.$section_title;?></h1>
	</header>
<?php

	$logger=jbcommon_get_logger();
	$logger->echo_boxes();

}

function jbcommon_debug_check(){

	$option=get_option('jbcommon_debug_mode','');
	if($option!=''){

		if(!defined('WP_DEBUG')){
			define('WP_DEBUG',true);
		}

		if(!defined('WP_DEBUG_LOG')){
			// Debug logging to the /wp-content/debug.log file
			define('WP_DEBUG_LOG',true);
		}

		if(!defined('WP_DEBUG_DISPLAY')){
			// Display of errors and warnings 
			define('WP_DEBUG_DISPLAY',true);
		}
		@ini_set('display_errors',1);

		if(!defined('SCRIPT_DEBUG')){
			// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
			define('SCRIPT_DEBUG',false);
		}

	}

}

function jbcommon_disable_auto_format(){

	$places=array(
		'the_excerpt',
		'the_content'/*,
		'comment_text'*/
	);

	$filters=array(
		'wpautop',
		'wptexturize',
		'convert_chars',
		'convert_smilies'
	);

	foreach ($places as $place){
		foreach ($filters as $filter){
			remove_filter($place,$filter);
		}
	}

}

function jbcommon_generator_meta_tag(){
	$option=get_option('jbcommon_meta_tag_generator','');
	if($option!=''){
		$option='<meta name="generator" content="'.$option.'" />';
	}
	return $option;
}

function jbcommon_generator_meta_tag_check(){

	// Thanks to Gravitationalfx
	// 	http://www.gravitationalfx.com/how-to-remove-the-wordpress-generator-meta-tag/
	foreach(
		array(
			'html',
			'xhtml',
			'atom',
			'rss2',
			/*'rdf',*/
			'comment',
			'export'
		)
		as $type
	){
		add_filter('get_the_generator_'.$type,'jbcommon_generator_meta_tag');
	}

}

?>
