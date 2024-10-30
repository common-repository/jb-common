<?php



// --- ADDS -------------------------------------------------------------------

add_action('admin_bar_menu','jbcommon_admin_bar_menu',999);
add_action('admin_enqueue_scripts','jbcommon_admin_enqueue_scripts');
add_action('admin_menu','jbcommon_admin_menu');
add_filter('attachments_meta_key','jbcommon_attachments_meta_key');
add_action('init','jbcommon_init');
add_filter('plugin_action_links_jb-common/jb-common.php','jbcommon_plugin_action_links');
add_action('shutdown','jbcommon_shutdown');
add_action('wp_enqueue_scripts','jbcommon_wp_enqueue_scripts');
add_action('wp_footer','jbcommon_wp_footer');
add_action('wp_head','jbcommon_wp_head');
add_filter('wp_mail_from','jbcommon_wp_mail_from');
add_filter('wp_mail_from_name','jbcommon_wp_mail_from_name');



// --- FUNCTIONS --------------------------------------------------------------

function jbcommon_admin_bar_menu($wp_admin_bar){

	// Just for admins!
	if(current_user_can('manage_options')){

		$parent_id='jb-common';

		$wp_admin_bar->add_node(
			array(
				'parent'=>false,
				'id'=>$parent_id,
				'title'=>__('JB Common',JBCOMMON_TEXT_DOMAIN),
				'href'=>admin_url('admin.php?page=jbcommon-configuration'),
				'meta'=>false
			)
		);

		$wp_admin_bar->add_node(
			array(
				'parent'=>$parent_id,
				'id'=>'jbcommon-configuration',
				'title'=>__('Configuration',JBCOMMON_TEXT_DOMAIN),
				'href'=>admin_url('admin.php?page=jbcommon-configuration'),
				'meta'=>false
			)
		);

		$wp_admin_bar->add_node(
			array(
				'parent'=>$parent_id,
				'id'=>'jbcommon-show-log',
				'title'=>__('Show Log',JBCOMMON_TEXT_DOMAIN),
				'href'=>admin_url('admin.php?page=jbcommon-show-log'),
				'meta'=>false
			)
		);

		$wp_admin_bar->add_node(
			array(
				'parent'=>$parent_id,
				'id'=>'jbcommon-info',
				'title'=>__('Info',JBCOMMON_TEXT_DOMAIN),
				'href'=>admin_url('admin.php?page=jbcommon-info'),
				'meta'=>false
			)
		);

		// CSS SEPARATOR

		$wp_admin_bar->add_node(
			array(
				'parent'=>$parent_id,
				'id'=>'jbcommon-plugins',
				'title'=>__('Plugins',JBCOMMON_TEXT_DOMAIN),
				'href'=>get_admin_url(null,'plugins.php'),
				'meta'=>false
			)
		);

		$wp_admin_bar->add_node(
			array(
				'parent'=>$parent_id,
				'id'=>'jbcommon-users',
				'title'=>__('Users',JBCOMMON_TEXT_DOMAIN),
				'href'=>get_admin_url(null,'users.php'),
				'meta'=>false
			)
		);

		$option=get_option('jbcommon_show_validator_link','disabled');
		if(
			$option=='enabled'
			&& current_user_can('edit_posts')
		){

			$wp_admin_bar->add_node(
				array(
					'parent'=>$parent_id,
					'id'=>'jbcommon-validate',
					'title'=>__('Validate',JBCOMMON_TEXT_DOMAIN),
					'href'=>jbcommon_get_validator_url(),
					'meta'=>array(
						'target'=>'_blank'
					)
				)
			);

		}

	}

}

function jbcommon_admin_enqueue_scripts(){

	// CSS
	wp_register_style('jb-common-admin',JBCOMMON_PLUGIN_URL.'/'.JBCOMMON_CSS_ADMIN_FILE);
	wp_enqueue_style('jb-common-admin');

}

function jbcommon_admin_menu(){

	// Requires

	$admin_path=JBCOMMON_PLUGIN_PATH.'/'.JBCOMMON_ADMIN_DIR.'/';

	require_once($admin_path.'configuration.php');
	require_once($admin_path.'show-log.php');
	require_once($admin_path.'info.php');

	// Menu

	jbcommon_add_admin_menu();

	// Auto format

	if(get_option('jbcommon_auto_format','enabled')=='disabled'){
		jbcommon_disable_auto_format();
	}

}

function jbcommon_attachments_meta_key($key){
	$option=get_option('jbcommon_attachments_meta_key','');
	if($option!=''){
		$r=$option;
	}else{
		$r=$key;
	}
	return $r;
}

function jbcommon_init(){

	jbcommon_maintenance_check();
	jbcommon_debug_check();
	jbcommon_generator_meta_tag_check();

// 	jbcommon_logger_init();

}

// Based on the work by c.bavota posted at
// 	http://bavotasan.com/2009/a-settings-link-for-your-wordpress-plugins/
function jbcommon_plugin_action_links($links){
	return array_merge(
		array(
			'<a href="admin.php?page=jbcommon-configuration">'.__('Configuration',JBCOMMON_TEXT_DOMAIN).'</a>',
			'<a href="admin.php?page=jbcommon-info">'.__('Info',JBCOMMON_TEXT_DOMAIN).'</a>'
		),
		$links
	);
}

function jbcommon_shutdown(){

	jbcommon_get_logger()->write_file();

}

function jbcommon_wp_enqueue_scripts(){

	// CSS
	wp_register_style('jb-common',JBCOMMON_PLUGIN_URL.'/'.JBCOMMON_CSS_FILE);
	wp_enqueue_style('jb-common');

}


function jbcommon_wp_footer(){

	$option=get_option('jbcommon_footer','');
	if($option!=''){
		echo $option;
	}

}

function jbcommon_wp_head(){

	// --- FAVICON ---

	$option=get_option('jbcommon_favicon_url','');
	if($option!=''){

		$mime=get_option('jbcommon_favicon_mime','');

?>
	<link rel="icon" href="<?php echo $option;?>" <?php if($mime!=''){echo 'type="'.$mime.'" ';}?>/>
<?php
	}



	// --- META TAGS ---

	$option=get_option('jbcommon_meta_tag_author','');
	if($option!=''){
?>
	<meta name="author" content="<?php echo $option;?>" />
<?php
	}

	$option=get_option('jbcommon_meta_tag_description','');
	if($option!=''){
?>
	<meta name="description" content="<?php echo $option;?>" />
<?php
	}

	$option=get_option('jbcommon_meta_tag_keywords','');
	if($option!=''){
?>
	<meta name="keywords" content="<?php echo $option;?>" />
<?php
	}



	// --- EXTRA ---

	$option=get_option('jbcommon_head','');
	if($option!=''){
		echo $option;
	}

}

// Thanks to wprecipes.com :
// 	http://www.wprecipes.com/how-to-change-wordpress-default-from-email-address

function jbcommon_wp_mail_from($old){
	$option=get_option('jbcommon_email_from_address','');
	if($option!=''){
		return $option;
	}else{
		return $old;
	}
}

function jbcommon_wp_mail_from_name($old){
	$option=get_option('jbcommon_email_from_name','');
	if($option!=''){
		return $option;
	}else{
		return $old;
	}
}


?>