<?php

// --- FUNCTIONS --------------------------------------------------------------

function jbcommon_get_db_wrapper(){return new JBCommon_DB_Wrapper();}



// --- CLASSES ----------------------------------------------------------------

class JBCommon_DB_Wrapper{

	protected $wpdb_show_errors_saver;

	public function __construct(){
		$this->reset();
	}

	//Returns the rows formatted as $output_type ( OBJECT, OBJECT_K, ARRAY_A, ARRAY_N ), NULL on no result, FALSE on error
	public function get_results($query,$output_type,$log_errors=true,$log_query=false){

		global $wpdb;
		$logger=jbcommon_get_logger();

		if($log_errors){
			$this->save_show_errors();
		}

		if($log_query!==false){
			$logger->log(
				str_replace(
					'%query%',
					$query,
					__('Querying database: %query%',JBCOMMON_TEXT_DOMAIN)
				),
				$log_query
			);
		}

		$r=$wpdb->get_results(
			str_replace(
				'%wpdb->prefix%',
				$wpdb->prefix,
				$query
			),
			$output_type
		);
		if($r === false){

			if($log_errors){

				$logger->log(
					str_replace(
						array(
							'%query%',
							'%error%'
						),
						array(
							$wpdb->last_query,
							$wpdb->last_error
						),
						__('Error in database query ( %query% ): %error%',JBCOMMON_TEXT_DOMAIN)
					),
					JBCOMMON_LOG_LEVEL_ERROR
				);

			}
		
		}

		if($log_errors){
			$this->restore_show_errors();
		}

		return $r;
	}

	//Returns a single value, NULL on no result, FALSE on error
	public function get_var($query,$log_errors=true,$log_query=false){

		global $wpdb;
		$logger=jbcommon_get_logger();

		if($log_errors){
			$this->save_show_errors();
		}

		if($log_query!==false){
			$logger->log(
				str_replace(
					'%query%',
					$query,
					__('Querying database: %query%',JBCOMMON_TEXT_DOMAIN)
				),
				$log_query
			);
		}

		$r=$wpdb->get_var(
			str_replace(
				'%wpdb->prefix%',
				$wpdb->prefix,
				$query
			)
		);
		if($r === false){

			if($log_errors){

				$logger->log(
					str_replace(
						array(
							'%query%',
							'%error%'
						),
						array(
							$wpdb->last_query,
							$wpdb->last_error
						),
						__('Error in database query ( %query% ): %error%',JBCOMMON_TEXT_DOMAIN)
					),
					JBCOMMON_LOG_LEVEL_ERROR
				);

			}
		
		}

		if($log_errors){
			$this->restore_show_errors();
		}

		return $r;
	}

	protected function get_wpdb_show_errors_saver(){return $this->wpdb_show_errors_saver;}

	protected function reset(){
		$this->set_wpdb_show_errors_saver(false);
	}

	//Returns rows affected/selected or FALSE on error
	public function query($queries,$log_errors=true,$log_query=false){

		global $wpdb;
		$logger=jbcommon_get_logger();

		if($log_errors){
			$this->save_show_errors();
		}

		if(!is_array($queries)){
			$queries=array($queries);
		}

		$r='';
		foreach($queries as $query){

	// 		echo $query.'<br />';

			if($log_query!==false){
				$logger->log(
					str_replace(
						'%query%',
						$query,
						__('Querying database: %query%',JBCOMMON_TEXT_DOMAIN)
					),
					$log_query
				);
			}

			$r=$wpdb->query(str_replace(
				'%wpdb->prefix%',
				$wpdb->prefix,
				$query
			));
			if($r === false){

				if($log_errors){

					$logger->log(
						str_replace(
							array(
								'%query%',
								'%error%'
							),
							array(
								str_replace(
									$wpdb->prefix,
									'%wpdb->prefix%',
									$wpdb->last_query
								),
								str_replace(
									$wpdb->prefix,
									'%wpdb->prefix%',
									$wpdb->last_error
								)
							),
							__('Error in database query ( %query% ): %error%',JBCOMMON_TEXT_DOMAIN)
						),
						JBCOMMON_LOG_LEVEL_ERROR
					);

				}
				break;
			}

		}

		if($log_errors){
			$this->restore_show_errors();
		}

		return $r;
	}

	protected function restore_show_errors(){

		global $wpdb;

		if($this->get_wpdb_show_errors_saver()){
			$wpdb->show_errors();
		}else{
			$wpdb->hide_errors();
		}

		$this->set_wpdb_show_errors_saver(false);

	}

	protected function save_show_errors(){

		global $wpdb;

		$this->set_wpdb_show_errors_saver($wpdb->show_errors);

		if(get_option('jbcommon_maintenance_mode')=='enabled'){
			$wpdb->show_errors();
		}else{
			$wpdb->hide_errors();
		}

	}

	protected function set_wpdb_show_errors_saver($v){$this->wpdb_show_errors_saver=(bool) $v;}

}

?>