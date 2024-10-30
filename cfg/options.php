<?php

define('JBCOMMON_OPTIONS',serialize(array(

	//Option groups
	array(
		'group_label'=>__('Main',JBCOMMON_TEXT_DOMAIN),
		'group_options'=>array(

			'jbcommon_complete_uninstall'=>array(
				'default'=>array(
					'option_label'=>__('Disabled',JBCOMMON_TEXT_DOMAIN),
					'option_value'=>'disabled'
				),
				'description'=>__('Delete option custom values on plugin remove.',JBCOMMON_TEXT_DOMAIN),
				'option_options'=>array(
					array(
						'option_label'=>__('Enabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>'enabled'
					),
					array(
						'option_label'=>__('Disabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>'disabled'
					)
				)
			),

			'jbcommon_menu_position'=>array(
				'default'=>'30',
				'description'=>__('Position for the JB Common admin menu. Refreshing the page will be needed to show the changes.',JBCOMMON_TEXT_DOMAIN),
			)

		)
	),

	array(
		'group_label'=>__('Editing',JBCOMMON_TEXT_DOMAIN),
		'group_options'=>array(

			'jbcommon_attachments_meta_key'=>array(
				'default'=>'_attachments',
				'description'=>__('Posts custom meta key for the attachments managed by the <a href="https://github.com/jchristopher/attachments" title="Go to the Attachments plugin website" target="_blank">Attachments plugin by Jonathan Christopher</a>. You can download the plugin from <a href="http://wordpress.org/extend/plugins/attachments/" title="Go to the WordPress.org Extend entry for the Attachments plugin" target="_blank">its WordPress Extend page</a>.',JBCOMMON_TEXT_DOMAIN),
			),
			'jbcommon_auto_format'=>array(
				'default'=>array(
					'option_label'=>__('Disabled',JBCOMMON_TEXT_DOMAIN),
					'option_value'=>'disabled'
				),
				'description'=>__('Controls the WordPress auto format feature on post editing. Useful when exact HTML code is needed.',JBCOMMON_TEXT_DOMAIN),
				'option_options'=>array(
					array(
						'option_label'=>__('Enabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>'enabled'
					),
					array(
						'option_label'=>__('Disabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>'disabled'
					)
				)
			),
			'jbcommon_show_validator_link'=>array(
				'default'=>array(
					'option_label'=>__('Enabled',JBCOMMON_TEXT_DOMAIN),
					'option_value'=>'enabled'
				),
				'description'=>__('Shows a link, on the JB Common admin bar group, to the W3C Validator with the current URL, just for logged users with the "edit_posts" capability.',JBCOMMON_TEXT_DOMAIN),
				'option_options'=>array(
					array(
						'option_label'=>__('Enabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>'enabled'
					),
					array(
						'option_label'=>__('Disabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>'disabled'
					)
				)
			)

		)
	),

	array(
		'group_label'=>__('Maintenance & Debug Modes',JBCOMMON_TEXT_DOMAIN),
		'group_options'=>array(

			'jbcommon_maintenance_mode'=>array(
				'default'=>array(
					'option_label'=>__('Disabled',JBCOMMON_TEXT_DOMAIN),
					'option_value'=>'disabled'
				),
				'description'=>str_replace(
					'%url%',
					jbcommon_get_admin_page_url('jbcommon-info#maintenance-mode'),
					__('Sets the maintenance mode, for no-admin visitors redirecting. <a href="%url%" title="Go to Maintenance Mode entry on the JB Common Info section">Read the Maintenance Mode reference entry for more info</a>.',JBCOMMON_TEXT_DOMAIN)
				),
				'option_options'=>array(
					array(
						'option_label'=>__('Enabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>'enabled'
					),
					array(
						'option_label'=>__('Disabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>'disabled'
					)
				)
			),

			'jbcommon_maintenance_url'=>array(
				'description'=>__('URL for visitors redirecting on maintenance mode.',JBCOMMON_TEXT_DOMAIN)
			),

			'jbcommon_maintenance_key'=>array(
				'default'=>__('maintenance',JBCOMMON_TEXT_DOMAIN),
				'description'=>__('Get variable name to avoid the maintenance mode redirection.',JBCOMMON_TEXT_DOMAIN)
			),

			'jbcommon_maintenance_value'=>array(
				'default'=>'0',
				'description'=>__('Get variable value to avoid the maintenance mode redirection.',JBCOMMON_TEXT_DOMAIN)
			),

			'jbcommon_debug_mode'=>array(
				'default'=>array(
					'option_label'=>__('Disabled',JBCOMMON_TEXT_DOMAIN),
					'option_value'=>'disabled'
				),
				'description'=>__('Sets the debug mode, for showing errors.',JBCOMMON_TEXT_DOMAIN),
				'option_options'=>array(
					array(
						'option_label'=>__('Enabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>'enabled'
					),
					array(
						'option_label'=>__('Disabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>'disabled'
					)
				)
			)
		)
	),

	array(
		'group_label'=>__('Footer',JBCOMMON_TEXT_DOMAIN),
		'group_options'=>array(

			'jbcommon_footer'=>array(
				'description'=>__('HTML text to print inside the footer tag. Useful for adding scripts.',JBCOMMON_TEXT_DOMAIN),
			)
		)
	),

	array(
		'group_label'=>__('E-mail',JBCOMMON_TEXT_DOMAIN),
		'group_options'=>array(

			'jbcommon_email_from_address'=>array(
				'description'=>__('The address for the blog e-mails from header. If empty, the WordPress default (wordpress@your.domain) will be used.',JBCOMMON_TEXT_DOMAIN),
			),
			'jbcommon_email_from_name'=>array(
				'description'=>__('The name for the blog e-mails from header. If empty, the WordPress default (WordPress) will be used.',JBCOMMON_TEXT_DOMAIN),
			)
		)
	),

	array(
		'group_label'=>__('Head',JBCOMMON_TEXT_DOMAIN),
		'group_options'=>array(

			'jbcommon_favicon_mime'=>array(
				'default'=>'image/png',
				'description'=>__('MIME type of the blog favicon. Only relevant if the <a href="#jbcommon_favicon_url" title="Go to the jbcommon_favicon_url option on the admin Configuration section">jbcommon_favicon_url option</a> is defined. Usual MIME types for the favicon are image/png, image/jpeg, image/gif, and image/x-icon .',JBCOMMON_TEXT_DOMAIN)
			),
			'jbcommon_favicon_url'=>array(
				'description'=>__('URL to the blog favicon. If empty, anything will be printed.',JBCOMMON_TEXT_DOMAIN)
			),
			'jbcommon_head'=>array(
				'description'=>__('HTML text to print inside the head tag. Useful for adding styles, scripts or uncommon meta tags.',JBCOMMON_TEXT_DOMAIN)
			),
			'jbcommon_meta_tag_author'=>array(
				'description'=>__('Value for the author meta tag. If empty, the meta tag will not be printed.',JBCOMMON_TEXT_DOMAIN)
			),
			'jbcommon_meta_tag_description'=>array(
				'description'=>__('Value for the description meta tag. If empty, the meta tag will not be printed.',JBCOMMON_TEXT_DOMAIN)
			),
			'jbcommon_meta_tag_generator'=>array(
				'default'=>'WordPress',
				'description'=>__('Value for the generator meta tag. If empty, the meta tag will not be printed. This content overwrites the default WordPress generator meta tag, wich shows the WordPress version by default.',JBCOMMON_TEXT_DOMAIN)
			),
			'jbcommon_meta_tag_keywords'=>array(
				'description'=>__('Value for the keywords meta tag. If empty, the meta tag will not be printed.',JBCOMMON_TEXT_DOMAIN)
			)

		)
	),

	array(
		'group_label'=>__('Log',JBCOMMON_TEXT_DOMAIN),
		'group_options'=>array(

			'jbcommon_log'=>array(
				'default'=>array(
					'option_label'=>__('Enabled',JBCOMMON_TEXT_DOMAIN),
					'option_value'=>'enabled'
				),
				'description'=>str_replace(
					'%url%',
					jbcommon_get_admin_page_url('jbcommon-info#jbcommon-logger'),
					__('Manages the log feature. With the log disabled, the JB Common plugin ignores the other log options. <a href="%url%" title="Go to JBCommon_Logger entry on the JB Common Info section">Read the JBCommon_Logger reference entry for more info</a>.',JBCOMMON_TEXT_DOMAIN)
				),
				'option_options'=>array(
					array(
						'option_label'=>__('Enabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>'enabled'
					),
					array(
						'option_label'=>__('Disabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>'disabled'
					)
				)
			),
/*
			'jbcommon_log_session_key'=>array(
				'default'=>'jbcommon_log_session_key',
				'description'=>__('Key for the $_SESSION array for storing the log object.',JBCOMMON_TEXT_DOMAIN),
			),
*/
			'jbcommon_log_file'=>array(
				'default'=>JBCOMMON_PLUGIN_PATH.'/'.JBCOMMON_LOG_DIR.'/jb-common.log',
				'description'=>__('Path to the log file.',JBCOMMON_TEXT_DOMAIN),
			),

			'jbcommon_log_file_max_lines'=>array(
				'default'=>'1000',
				'description'=>__('Max number of lines in the log file.',JBCOMMON_TEXT_DOMAIN),
			),

			'jbcommon_log_level_file'=>array(
				'default'=>array(
					'option_label'=>__('Verbose',JBCOMMON_TEXT_DOMAIN),
					'option_value'=>JBCOMMON_LOG_LEVEL_VERBOSE
				),
				'description'=>__('Log level for the log file.',JBCOMMON_TEXT_DOMAIN),
				'option_options'=>array(
					array(
						'option_label'=>__('Debug',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_DEBUG
					),
					array(
						'option_label'=>__('Verbose',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_VERBOSE
					),
					array(
						'option_label'=>__('Message',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_MESSAGE
					),
					array(
						'option_label'=>__('Warning',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_WARNING
					),
					array(
						'option_label'=>__('Error',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_ERROR
					),
					array(
						'option_label'=>__('Disabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_DISABLED
					)
				)
			),

			'jbcommon_log_level_display_admin'=>array(
				'default'=>array(
					'option_label'=>__('Verbose',JBCOMMON_TEXT_DOMAIN),
					'option_value'=>JBCOMMON_LOG_LEVEL_VERBOSE
				),
				'description'=>__('Log level for displaying to admin users.',JBCOMMON_TEXT_DOMAIN),
				'option_options'=>array(
					array(
						'option_label'=>__('Debug',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_DEBUG
					),
					array(
						'option_label'=>__('Verbose',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_VERBOSE
					),
					array(
						'option_label'=>__('Message',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_MESSAGE
					),
					array(
						'option_label'=>__('Warning',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_WARNING
					),
					array(
						'option_label'=>__('Error',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_ERROR
					),
					array(
						'option_label'=>__('Disabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_DISABLED
					)
				)
			),

			'jbcommon_log_level_display'=>array(
				'default'=>array(
					'option_label'=>__('Error',JBCOMMON_TEXT_DOMAIN),
					'option_value'=>JBCOMMON_LOG_LEVEL_ERROR
				),
				'description'=>__('Log level for displaying to non admin users.',JBCOMMON_TEXT_DOMAIN),
				'option_options'=>array(
					array(
						'option_label'=>__('Debug',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_DEBUG
					),
					array(
						'option_label'=>__('Verbose',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_VERBOSE
					),
					array(
						'option_label'=>__('Message',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_MESSAGE
					),
					array(
						'option_label'=>__('Warning',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_WARNING
					),
					array(
						'option_label'=>__('Error',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_ERROR
					),
					array(
						'option_label'=>__('Disabled',JBCOMMON_TEXT_DOMAIN),
						'option_value'=>JBCOMMON_LOG_LEVEL_DISABLED
					)
				)
			)

		)
	)

// 	array(
// 		'group_label'=>'',
// 		'group_options'=>array(
// 
// 			'option_name'=>array(
// 				//If not defined is setted as ''
// 				'default'=>array(
// 					'option_label'=>'',
// 					'option_option_value'=>'option_default_value'
// 				),
// 				'description'=>'',
// 				'option_options'=>array(
// 					array(
// 						'option_label'=>'',
// 						'option_option_value'=>''
// 					)
// 				)
// 			),
// 			'option_name'=>array(
// 				//If not defined is setted as ''
// 				'default'=>'',
// 				'description'=>''
// 			)
// 
// 		)
// 	)

)));

?>