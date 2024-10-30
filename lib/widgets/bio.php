<?php

class JBCommon_Bio_Widget extends WP_Widget{

	// widget actual processes
	public function __construct(){
		parent::__construct(
	 		'jbcommon_bio_widget', // Base ID
			'JB Common Bio', // Name
			array(
				// Args
				'description'=>__('A simple widget for showing an author bio.',JBCOMMON_TEXT_DOMAIN)
			)
		);
	}

	// outputs the options form on admin
 	public function form($instance){

		if(isset($instance['title'])){
			$title=$instance['title'];
		}else{
			$title='';
		}
		if(isset($instance['uid'])){
			$uid=(int) $instance['uid'];
		}else{
			$current_user=wp_get_current_user();
			$uid=$current_user->ID;
		}


?>
		<p><?php echo str_replace(
			'%url%',
			jbcommon_get_admin_page_url('jbcommon-info#JBCommon_Bio_Widget'),
			__('Read more about this widget on the <a href="%url%" title="Go to the JB Common plugin Info section" target="_blank">JB Common plugin Info section</a>.',JBCOMMON_TEXT_DOMAIN)
		);?></p>
		<div>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',JBCOMMON_TEXT_DOMAIN);?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</div>
		<div>
			<label for="<?php echo $this->get_field_id('uid'); ?>"><?php _e('User:',JBCOMMON_TEXT_DOMAIN);?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id('uid'); ?>" name="<?php echo $this->get_field_name('uid'); ?>">
				<option value="0"><?php _e('Current post author',JBCOMMON_TEXT_DOMAIN);?></option>
<?php
		$users=get_users();
		
		foreach($users as $user){
			echo "\t\t\t\t".'<option value="'.$user->ID.'"';
			if($uid==$user->ID){
				echo ' selected="selected"';
			}
			echo '>('.$user->ID.') '.$user->display_name."</option>\n";
		}
?>
			</select>
		</div>
<?php

	}

	// processes widget options to be saved
	public function update($new_instance,$old_instance){

		$instance=array();
		$instance['title']=strip_tags($new_instance['title']);
		$instance['uid']=(int) $new_instance['uid'];

		return $instance;
	}

	// outputs the content of the widget
	public function widget($args,$instance){

		extract($args);
		$title=apply_filters('widget_title',apply_filters('foo_widget_title',$instance['title']));
		$uid=(int) $instance['uid'];

		if($uid>-1){

			echo $before_widget;

			if (!empty($title)){
				echo $before_title.$title.$after_title;
			}

			$this->echo_bio($uid);

			echo $after_widget;

		}

	}

	public static function echo_bio($uid=false){

		$user=get_userdata($uid);

		// Current post author
		if(!($user instanceof WP_User)){
			$user=get_userdata(get_the_author_meta('ID'));
		}

		if($user instanceof WP_User){
			echo "\t".get_avatar($user->ID);
			echo "\t".do_shortcode($user->user_description);
		}

	}

}
add_action('widgets_init',create_function('','register_widget("JBCommon_Bio_Widget");'));



// SHORTCODE

function jbcommon_sc_bio_func($atts,$content='') {

	$atts=shortcode_atts(
		array(
			'uid'=>false,
			'class'=>''
		),
		$atts
	);

	if(
		$atts['uid']===false
		&& $content!=''
	){
		$atts['uid']=$content;
	}

	foreach($atts as $key=>$value){
		${$key}=do_shortcode(esc_attr($value));
	}

	if($class==''){
		$class='jbcommon_sc_bio';
	}

	if(ob_start()){

		echo "\t".'<div class="'.$class."\">\n";

		JBCommon_Bio_Widget::echo_bio($uid);

		echo "\t</div>\n";

		$r=ob_get_contents();
		ob_end_clean();

	}else{
		$r='';
	}

	return $r;
}
add_shortcode('jbcommon_sc_bio','jbcommon_sc_bio_func');

?>