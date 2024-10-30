<?php 

//Activate
function jbcommon_activation(){

	$logger=jbcommon_get_logger();
// 	$dbw=jbcommon_get_db_wrapper();

	$logger->log(__('Activating JB Common plugin.',JBCOMMON_TEXT_DOMAIN));

	// --- Installing options and its default values if not defined ---

	$logger->log(__('Adding the options to the WordPress database.',JBCOMMON_TEXT_DOMAIN));

	require_once(JBCOMMON_PLUGIN_PATH.'/'.JBCOMMON_CFG_DIR.'/options.php');
	$options=unserialize(JBCOMMON_OPTIONS);

	foreach($options as $options_group){
		foreach($options_group['group_options'] as $key=>$value){
			if(get_option($key)===false){
				if(!isset($value['default'])){
					$default='';
				}else{
					if(is_array($value['default'])){
						$default=$value['default']['option_value'];
					}else{
						$default=$value['default'];
					}
				}
				add_option($key,$default);
				$logger->log(str_replace(
					'%option_name%',
					$key,
					__('Creating option with name \'%option_name%\'.',JBCOMMON_TEXT_DOMAIN)
				));
			}else{
				$logger->log(str_replace(
					'%option_name%',
					$key,
					__('Option with name \'%option_name%\' already exists, skipping its creation.',JBCOMMON_TEXT_DOMAIN)
				));
			}
		}
	}

// 	// --- Create tables for database ---
// 
// 	$logger->log(__('Creating JB Common database tables into WordPress database.',JBCOMMON_TEXT_DOMAIN));
// 
// 	$queries=unserialize(JBCOMMON_DB);
// 	$queries=$queries['install'];
// 	$dbw->query($queries);

	$logger->log(__('Activation completed.',JBCOMMON_TEXT_DOMAIN));

}
register_activation_hook(JBCOMMON_PLUGIN_FILE,'jbcommon_activation');



//Deactivate
function jbcommon_deactivation(){

	$logger=jbcommon_get_logger();
// 	$dbw=jbcommon_get_db_wrapper();

	$logger->log(__('Deactivating JB Common plugin.',JBCOMMON_TEXT_DOMAIN));

	$logger->log(__('Deactivation completed.',JBCOMMON_TEXT_DOMAIN));

}
register_deactivation_hook(JBCOMMON_PLUGIN_FILE,'jbcommon_deactivation');



//Uninstall: If uninstall.php is present, this won't run!
function jbcommon_uninstall(){

	$logger=jbcommon_get_logger();
// 	$dbw=jbcommon_get_db_wrapper();

	$logger->log(__('Uninstalling JB Common plugin.',JBCOMMON_TEXT_DOMAIN));

	$complete_uninstall=get_option('jbcommon_complete_uninstall');
	if($complete_uninstall==='enabled'){

		$logger->log(__('Complete uninstall option is activated. Deleting options.',JBCOMMON_TEXT_DOMAIN));

		// --- Delete options ---

		require_once(JBCOMMON_PLUGIN_PATH.'/'.JBCOMMON_CFG_DIR.'/options.php');
		$options=unserialize(JBCOMMON_OPTIONS);

		foreach($options as $options_group){
			foreach($options_group['group_options'] as $key=>$value){
				if(get_option($key,false)!==false){
					delete_option($key);
					$logger->log(str_replace(
						'%option_name%',
						$key,
						__('Deleting option with name \'%option_name%\'.',JBCOMMON_TEXT_DOMAIN)
					));
				}else{
					$logger->log(str_replace(
						'%option_name%',
						$key,
						__('Option with name \'%option_name%\' not exists, skipping its deletion.',JBCOMMON_TEXT_DOMAIN)
					));
				}
			}
		}

// 		// --- Drop tables from database ---
// 
// 		$logger->log(__('Dropping JB Common database tables from WordPress database.',JBCOMMON_TEXT_DOMAIN));
// 
// 		$queries=unserialize(JBCOMMON_DB);
// 		$queries=$queries['uninstall'];
// 		$dbw->query($queries);

	}

	$logger->log(__('Uninstalling completed.',JBCOMMON_TEXT_DOMAIN));

}
register_uninstall_hook(JBCOMMON_PLUGIN_FILE,'jbcommon_uninstall');

?>