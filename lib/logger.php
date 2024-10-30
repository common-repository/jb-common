<?php

// --- CONSTANTS --------------------------------------------------------------

define('JBCOMMON_LOG_LEVEL_DEBUG',0);
define('JBCOMMON_LOG_LEVEL_VERBOSE',1);
define('JBCOMMON_LOG_LEVEL_MESSAGE',2);
define('JBCOMMON_LOG_LEVEL_WARNING',3);
define('JBCOMMON_LOG_LEVEL_ERROR',4);
define('JBCOMMON_LOG_LEVEL_DISABLED',5);



// --- FUNCTIONS --------------------------------------------------------------

/*
function jbcommon_logger_init(){

	if(get_option('jbcommon_log','enabled')=='enabled'){

		if(!session_id()){
			session_start();
		}

		$jbcommon_log_session_key=get_option('jbcommon_log_session_key','');
		if(
			$jbcommon_log_session_key!=''
			&& (
				!isset($_SESSION[$jbcommon_log_session_key])
				|| !($_SESSION[$jbcommon_log_session_key] instanceof JBCommon_Logger)
			)
		){
			$_SESSION[$jbcommon_log_session_key]=new JBCommon_Logger();
		}

	}

}

function jbcommon_get_logger(){

	$jbcommon_log_session_key=get_option('jbcommon_log_session_key','');

	if(
		$jbcommon_log_session_key!=''
		&& get_option('jbcommon_log','enabled')=='enabled'
	){

		if(!session_id()){
			session_start();
		}

		if(!isset($_SESSION[$jbcommon_log_session_key])){
			$_SESSION[$jbcommon_log_session_key]=new JBCommon_Logger();
		}

		return $_SESSION[$jbcommon_log_session_key];

	}

	return new JBCommon_Fake_Logger();

}
*/

$jbcommon_logger;

function jbcommon_get_logger(){

	global $jbcommon_logger;

	if(get_option('jbcommon_log','enabled')=='enabled'){

		if(
			!($jbcommon_logger instanceof JBCommon_Logger)
			&& !($jbcommon_logger instanceof JBCommon_Fake_Logger)
		){
			$jbcommon_logger=new JBCommon_Logger();
		}

	}else{

		if(
			!($jbcommon_logger instanceof JBCommon_Logger)
			&& !($jbcommon_logger instanceof JBCommon_Fake_Logger)
		){
			$jbcommon_logger=new JBCommon_Fake_Logger();
		}

	}
	return $jbcommon_logger;
}



// --- CLASSES ----------------------------------------------------------------

class JBCommon_Log_Entry{

	protected $level;
	protected $session_id;
	protected $text;
	protected $time;
	protected $user;

	public function __construct($t,$l=false){

		if($l===false){
			$l=JBCOMMON_LOG_LEVEL_MESSAGE;
		}

		$this->reset();
		$this->set_text($t);
		$this->set_level($l);

	}

	public function __toString(){
		return '['.$this->get_time().'] ['.$this->get_session_id().'] ['.$this->get_user().' '.get_userdata($this->get_user())->user_login.'] '.$this->get_text();
	}

	public function get_level(){return $this->level;}
	public function get_session_id(){return $this->session_id;}
	public function get_text(){return $this->text;}
	public function get_time(){return $this->time;}
	public function get_user(){return $this->user;}

	protected function reset(){
		$this->set_level(JBCOMMON_LOG_LEVEL_MESSAGE);
		$this->set_session_id(session_id());
		$this->set_text('');
		$this->set_time(current_time('mysql'));
		$this->set_user(wp_get_current_user()->ID);
	}

	protected function set_level($v){$this->level=(int) $v;}
	protected function set_session_id($v){$this->session_id=(string) $v;}
	protected function set_text($v){$this->text=(string) $v;}
	protected function set_time($v){$this->time=(string) $v;}
	protected function set_user($v){$this->user=(int) $v;}

}



// ------------------------------------

interface JBCommon_Logger_Interface{

	public function __construct();
	public function echo_box($entries);
	public function echo_boxes();
	public function get_log_file();
	public function log($t,$l=false);
	public function write_file();

}


// ------------------------------------

class JBCommon_Logger implements JBCommon_Logger_Interface{

	protected $buffer;
	protected $log_file;

	public function __construct(){
		$this->reset();
	}

	public function echo_box($entries){

		if(!is_array($entries)){
			$entries=array($entries);
		}

		if(!jbcommon_is_array_of($entries,'JBCommon_Log_Entry')){
			return false;
		}

		// Check if user is administrator
		if(current_user_can('manage_options')){
			$min_level=get_option('jbcommon_log_level_display_admin',JBCOMMON_LOG_LEVEL_DISABLED);
			$base_class='jbcommon-log-box-admin jbcommon-log-level-';
		}else{
			$min_level=get_option('jbcommon_log_level_display',JBCOMMON_LOG_LEVEL_DISABLED);
			$base_class='jbcommon-log-box jbcommon-log-level-';
		}

		if($min_level<JBCOMMON_LOG_LEVEL_DISABLED){

			$first=true;
			foreach($entries as $entry){

				if($first){

					$level=$entry->get_level();

					if($level<$min_level){
						break;
					}

					switch($level){
						case JBCOMMON_LOG_LEVEL_DEBUG:
							$class=$base_class.'debug';
							break;
						case JBCOMMON_LOG_LEVEL_VERBOSE:
							$class=$base_class.'verbose';
							break;
						case JBCOMMON_LOG_LEVEL_MESSAGE:
							$class=$base_class.'message';
							break;
						case JBCOMMON_LOG_LEVEL_WARNING:
							$class=$base_class.'warning';
							break;
						case JBCOMMON_LOG_LEVEL_ERROR:
							$class=$base_class.'error';
							break;
						
					}

					echo "\t<div class=\"$class\">\n";
					echo "\t\t<ul>\n";

					$first=false;
				}

				echo "\t\t\t<li>".$entry->get_text()."</li>\n";

			}

			if(!$first){
				echo "\t\t</ul>\n";
				echo "\t</div>\n";
			}

		}

	}

	public function echo_boxes($empty_buffer=false){

		$buffer=$this->get_buffer();

		// Sort buffer entries by level, for showing on separated boxes

		$sorted_buffer=array();
		foreach($buffer as $entry){

			$level=$entry->get_level();
			if(!isset($sorted_buffer[$level])){
				$sorted_buffer[$level]=array();
			}

			$sorted_buffer[$entry->get_level()][]=$entry;
		}

		foreach($sorted_buffer as $entries){

			$this->echo_box($entries);

		}

		if($empty_buffer){
			$this->empty_buffer();
		}

	}

	protected function empty_buffer(){
		$this->set_buffer(array());
	}

	protected function get_buffer(){return $this->buffer;}
	public function get_log_file(){return $this->log_file;}

	public function log($t,$l=false){
		$buffer=$this->get_buffer();
		$buffer[]=new JBCommon_Log_Entry($t,$l);
		$this->set_buffer($buffer);
	}

	protected function reset(){
		$this->empty_buffer();
		$this->set_log_file(get_option('jbcommon_log_file',''));
	}

	protected function set_buffer($v){
		if(jbcommon_is_array_of($v,'JBCommon_Log_Entry')){
			$this->buffer=$v;
		}
	}
	protected function set_log_file($v){$this->log_file=(string) $v;}

	public function write_file(){

		$level=get_option('jbcommon_log_level_file',JBCOMMON_LOG_LEVEL_DISABLED);
		$log_file=$this->get_log_file();

		if($level<JBCOMMON_LOG_LEVEL_DISABLED){

			if(
				$log_file!=''
				&& file_exists($log_file)
			){

				foreach($this->get_buffer() as $entry){

					if($entry instanceof JBCommon_Log_Entry){

						if($entry->get_level()>=$level){

							if(file_put_contents($this->get_log_file(),$entry."\n",FILE_APPEND)===false){

								$this->echo_box(
									new JBCommon_Log_Entry(
										str_replace(
											array(
												'%log_file%',
												'%entry%',
											),
											array(
												$this->get_log_file(),
												$entry
											),
											__('The log file (%log_file%) is not writeable. Can\'t log this: %entry%',JBCOMMON_TEXT_DOMAIN)
										),
										JBCOMMON_LOG_LEVEL_ERROR
									)
								);
							}

						}

					}else{
						$this->echo_box(
							new JBCommon_Log_Entry(
								str_replace(
									'%entry%',
									print_r($entry),
									__('A non JBCommon_Log_Entry has been found in the log buffer. Can\'t log this: %entry%',JBCOMMON_TEXT_DOMAIN)
								),
								JBCOMMON_LOG_LEVEL_ERROR
							)
						);
					}

				}

			}else{

				foreach($this->get_buffer() as $entry){
					$this->echo_box(
						new JBCommon_Log_Entry(
							str_replace(
								array(
									'%log_file%',
									'%entry%',
								),
								array(
									$this->get_log_file(),
									$entry
								),
								__('The log file (%log_file%) does not exists. Can\'t log this: %entry%',JBCOMMON_TEXT_DOMAIN)
							),
							JBCOMMON_LOG_LEVEL_ERROR
						)
					);
				}

			}

		}

		$this->empty_buffer();

	}

}



// ------------------------------------

class JBCommon_Fake_Logger implements JBCommon_Logger_Interface{

	public function __construct(){}
	public function echo_box($entries){}
	public function echo_boxes(){}
	public function get_log_file(){return '';}
	public function log($t,$l=false){}
	public function write_file(){}

}



/*
$dsxxxp_log_buffer=array();

function dsxxxp_log($txt){
	global $dsxxxp_log_buffer;

	$time=current_time('mysql');
	$session=session_id();
	$user=wp_get_current_user();

	if($user->ID==0){
		$user='0';
	}else{
		$user=$user->ID.' '.$user->user_login;
	}

	$dsxxxp_log_buffer[]="[$time] [$session] [$user] $txt";
}

function dsxxxp_log_write(){

	global $dsxxxp_log_buffer;

	foreach($dsxxxp_log_buffer as $txt){

		if(file_put_contents(DSXXXP_LOG_FILE,"$txt\n",FILE_APPEND)===false){
			dsxxxp_show_text_box(
				str_replace(
					array(
						'%log_file%',
						'%txt%',
					),
					array(
						DSXXXP_LOG_FILE,
						$txt
					),
					__('The log file (%log_file%) is not writeable. Can\'t log this: %txt%',DSXXXP_TEXT_DOMAIN)
				),
				'dsxxxp-text-box-debug',
				false
			);
		}

	}
	$dsxxxp_log_buffer=array();

	if(file_exists(DSXXXP_LOG_FILE)){

		//Read the log file into an array
		$log=file(DSXXXP_LOG_FILE);
		if($log===false){

			dsxxxp_show_text_box(
				str_replace(
					'%log_file%',
					DSXXXP_LOG_FILE,
					__('The log file (%log_file%) is not readable and can\'t be shrinked.',DSXXXP_TEXT_DOMAIN)
				),
				'dsxxxp-text-box-debug',
				false
			);

		}else{

			//Size management
			$log_size=count($log);
			$log_max_lines=(int) get_option('dsxxxp_log_max_lines');
			if($log_size>$log_max_lines){
				array_splice($log,0,$log_size-$log_max_lines);
			}

			//Write the array into the file again
			if(file_put_contents(DSXXXP_LOG_FILE,implode('',$log))===false){
				dsxxxp_show_text_box(
					str_replace(
						'%log_file%',
						DSXXXP_LOG_FILE,
						__('The log file (%log_file%) is not writeable and can\'t be shrinked.',DSXXXP_TEXT_DOMAIN)
					),
					'dsxxxp-text-box-debug',
					false
				);
			}

		}

	}else{

		if(file_put_contents(DSXXXP_LOG_FILE,'')===false){
			dsxxxp_show_text_box(
				str_replace(
					'%log_file%',
					DSXXXP_LOG_FILE,
					__('The log file (%log_file%) don\'t exists and can\'t be created.',DSXXXP_TEXT_DOMAIN)
				),
				'dsxxxp-text-box-debug',
				false
			);
		}

	}

}
add_action('shutdown','dsxxxp_log_write');
*/

?>