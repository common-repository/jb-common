<?php

//Thanks to Mike Schinkel:
//	http://wordpress.stackexchange.com/questions/2666/add-a-separator-to-the-admin-menu
function jbcommon_add_admin_menu_separator($position){

	global $menu;
	$index=0;

	foreach($menu as $offset=>$section){

		if(substr($section[2],0,9)=='separator'){
			$index++;
		}

		if($offset>=$position){
			$menu[$position]=array('','read',"separator{$index}",'','wp-menu-separator');
			break;
		}

	}
	ksort($menu);

}

// Based on the proposed snippet by the Attachments v3.4 plugin author Jonathan Christopher.
// That plugin is required in order to use this function.
// 	https://github.com/jchristopher/attachments

function jbcommon_echo_attachments($header_level=4){

	/*
	<?php _e('ID',JBCOMMON_TEXT_DOMAIN);?>: <?php echo $attachments->id(); ?><br />
	<?php _e('Type',JBCOMMON_TEXT_DOMAIN);?>: <?php echo $attachments->type(); ?><br />
	<?php _e('Subtype',JBCOMMON_TEXT_DOMAIN);?>: <?php echo $attachments->subtype(); ?><br />
	<?php _e('URL',JBCOMMON_TEXT_DOMAIN);?>: <?php echo $attachments->url(); ?><br />
	<?php _e('Image',JBCOMMON_TEXT_DOMAIN);?>: <?php echo $attachments->image( 'thumbnail' ); ?><br />
	<?php _e('Source',JBCOMMON_TEXT_DOMAIN);?>: <?php echo $attachments->src( 'full' ); ?><br />
	<?php _e('Size',JBCOMMON_TEXT_DOMAIN);?>: <?php echo $attachments->filesize(); ?><br />
	<?php _e('Title Field',JBCOMMON_TEXT_DOMAIN);?>: <?php echo $attachments->field( 'title' ); ?><br />
	<?php _e('Caption Field',JBCOMMON_TEXT_DOMAIN);?>: <?php echo $attachments->field( 'caption' ); ?>
	*/

	$header_level=(int) $header_level;
	if(
		$header_level>6
		|| $header_level<1
	){
		$header_level=4;
	}

	include_once(ABSPATH.'wp-admin/includes/plugin.php');

	if(is_plugin_active('attachments/index.php')){

		$attachments=new Attachments('attachments');
		if($attachments->exist()){
?>
		<div class="jbcommon-attachments">
			<h<?php echo $header_level;?>><?php _e('Attachments',JBCOMMON_TEXT_DOMAIN);?></h<?php echo $header_level;?>>
			<ul>
<?php
				while($attachments->get()){ 
?>
				<li>
					<a href="<?php echo $attachments->url();?>" title="<?php _e('View or download the attachment',JBCOMMON_TEXT_DOMAIN);?>" target="_blank"><?php echo $attachments->image('thumbnail'); echo $attachments->field('title');?></a><span class="jbcommon-attachments-size"> (<?php echo $attachments->filesize();?>)</span>
<?php
					if($attachments->field('caption')!=''){
?>
					<div class="jbcommon-attachments-caption">
						<?php echo $attachments->field('caption');?>
					</div>
<?php
					}
?>
				</li>
<?php
				}
?>
			</ul>
		</div>
<?php
		}

	}

}

function jbcommon_get_admin_page_url($page){
	return get_admin_url(null,'admin.php?page='.$page);
}

function jbcommon_get_admin_permalink(){
	return esc_url($_SERVER['SERVER_NAME'].preg_replace('/&.*$/','',$_SERVER['REQUEST_URI']));
}

function jbcommon_get_current_url(){

	if(isset($_SERVER['HTTPS'])){
		$protocol='https';
	}else{
		$protocol='http';
	}

	return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

function jbcommon_get_query_category($wp_query=false){

// 	jbcommon_print_r($wp_query);

	if($wp_query===false){
		global $wp_query;
	}

	$category_slug=$wp_query->get('category_name');
	$category_id=$wp_query->get('cat');

	if($category_slug!=''){
		$category=get_category_by_slug($category_slug);
	}else if($category_id!=''){
		$category=get_category($category_id);
	}else{
		$category=false;
	}

	if(is_wp_error($category)){
		$category=false;
	}

// 	jbcommon_print_r($category);

	return $category;

}

function jbcommon_get_validator_url($url=false){
	if($url===false){
		$url=jbcommon_get_current_url();
	}
	return 'http://validator.w3.org/check?uri='.urlencode($url).'&charset=%28detect+automatically%29&doctype=Inline&group=0';
}

function jbcommon_is_array_of($a,$class){
	if(is_array($a)){
		foreach($a as $element){
			if(!($element instanceof $class)){
				return false;
			}
		}
		return true;
	}else{
		return false;
	}
}

// Thanks to Amereservant:
// 	http://stackoverflow.com/questions/5266945/wordpress-how-detect-if-current-page-is-the-login-page
function jbcommon_is_login_page(){
	return in_array($GLOBALS['pagenow'],array('wp-login.php'));
}

function jbcommon_is_register_page(){
	if(
		in_array($GLOBALS['pagenow'],array('wp-register.php'))
		|| (
			jbcommon_is_login_page()
			&& isset($_GET['action'])
			&& $_GET['action']=='register'
		)
	){
		return true;
	}else{
		return false;
	}
}

function jbcommon_print_r($var){
	echo '<pre>'.print_r($var,true).'</pre>';
}

function jbcommon_url_append_vars($vars,$url=false,$entity=true){

	if(!is_array($vars)){
		trigger_error(__('Function jbcommon_url_append_vars expects parameter 2 to be an associative array. An empty string is returned.',JBCOMMON_TEXT_DOMAIN),E_USER_WARNING);
		return '';
	}

	if($url===false){
		$url=jbcommon_get_current_url();
	}

	if($entity){
		$second_appender='&amp;';
	}else{
		$second_appender='&';
	}

	if(preg_match('/\?/',$url)){
		$first_appender=$second_appender;
	}else{
		$first_appender='?';
	}

	$first=true;
	foreach($vars as $key=>$value){

		if($first){
			$url.=$first_appender;
			$first=false;
		}else{
			$url.=$second_appender;
		}

		$url.=$key.'='.$value;

	}

	return $url;

}

?>