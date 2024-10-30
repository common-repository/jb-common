<?php

function jbcommon_show_log(){


// --- ECHO START -------------------------------------------------------------

	jbcommon_admin_header(__('Show Log',JBCOMMON_TEXT_DOMAIN));
	$logger=jbcommon_get_logger();

?>

<section id="jbcommon-show-log">
	<h2><?php _e('Show Log',JBCOMMON_TEXT_DOMAIN);?></h2>
	<?php

	$log_file=get_option('jbcommon_log_file','');
	if($log_file!=''){
		if(file_exists($log_file)){
			echo '<pre>'.htmlentities(file_get_contents($log_file)).'</pre>';
		}else{

			$logger->log(
				str_replace(
					'%log_file%',
					$log_file,
					__('The log file (%log_file%) does not exists.',JBCOMMON_TEXT_DOMAIN)
				),
				JBCOMMON_LOG_LEVEL_ERROR
			);

			$logger->echo_boxes(true);

		}
	}else{
		$logger->log(
			str_replace(
				'%url%',
				jbcommon_get_admin_page('jbcommon-configuration#jbcommon_log_file'),
				__('No log file has been defined. Please edit the <a href="%url%" title="Go to option field on the JB Common configuration section">the option value on the JB Common Configuration section</a> in order to use this feature.',JBCOMMON_TEXT_DOMAIN)
			),
			JBCOMMON_LOG_LEVEL_ERROR
		);

		$logger->echo_boxes(true);
	}

	?>

</section>

<?php
}

?>