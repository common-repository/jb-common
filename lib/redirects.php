<?php

function jbcommon_maintenance_check(){

	if(get_option('jbcommon_maintenance_mode','disabled')=='enabled'){

		$key=get_option('jbcommon_maintenance_key','');
		$value=get_option('jbcommon_maintenance_value','');

		if(
			$key!=''
			&& $value!=''
		){

			if(!session_id()){
				@session_start();
			}

			if(
				isset($_GET[$key])
				&& $_GET[$key]==$value
			){
				$_SESSION[$key]=$value;
			}

			if(
				!current_user_can('manage_options')
				&& !jbcommon_is_login_page()
				&&
				(
					!isset($_SESSION[$key])
					|| $_SESSION[$key]!=$value
				)
			){

				$url=get_option('jbcommon_maintenance_url','');
				if(
					$url!=''
					&& $url!=jbcommon_get_current_url()
				){
					wp_safe_redirect($url);
					exit();
				}

			}

		}

	}

}

?>