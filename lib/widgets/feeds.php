<?php

class JBCommon_Feeds_Widget extends WP_Widget{

	// widget actual processes
	public function __construct(){
		parent::__construct(
	 		'jbcommon_feeds_widget', // Base ID
			'JB Common Feeds', // Name
			array(
				// Args
				'description'=>__('A simple widget for showing the available feeds for each page.',JBCOMMON_TEXT_DOMAIN)
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

?>
		<p><?php echo str_replace(
			'%url%',
			jbcommon_get_admin_page_url('jbcommon-info#JBCommon_Feeds_Widget'),
			__('Read more about this widget on the <a href="%url%" title="Go to the JB Common plugin Info section" target="_blank">JB Common plugin Info section</a>.',JBCOMMON_TEXT_DOMAIN)
		);?></p>
		<div>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',JBCOMMON_TEXT_DOMAIN);?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</div>
<?php

	}

	// processes widget options to be saved
	public function update($new_instance,$old_instance){

		$instance=array();
		$instance['title']=strip_tags($new_instance['title']);

		return $instance;
	}

	// outputs the content of the widget
	public function widget($args,$instance){

		extract($args);
		$title=apply_filters('widget_title',apply_filters('foo_widget_title',$instance['title']));

		echo $before_widget;

		if (!empty($title)){
			echo $before_title.$title.$after_title;
		}

		$this->echo_feeds($args['widget_id']);

		echo $after_widget;

	}

	public static function echo_feeds($container_id=false){
?>

	<ul>
		<li>
			<h4><?php _e('Atom',JBCOMMON_TEXT_DOMAIN);?></h4>
			<ul>
				<li><a href="<?php echo get_bloginfo('atom_url');?>" title="<?php _e('Website Atom feed',JBCOMMON_TEXT_DOMAIN);?>" target="_blank"><?php _e('Website',JBCOMMON_TEXT_DOMAIN);?></a></li>

<?php

		$categories=get_the_category();
		foreach($categories as $category){

			$id=$category->cat_ID;
			$name=htmlentities($category->cat_name,ENT_QUOTES,'UTF-8');
			
			echo "\t\t\t<li><a href=\"".get_category_feed_link($id,'atom').'" title="'.str_replace('%category_name%',$name,__('Category %category_name% Atom feed',JBCOMMON_TEXT_DOMAIN)).'" target="_blank">'.str_replace('%category_name%',$name,__('Category %category_name%',JBCOMMON_TEXT_DOMAIN))."</a></li>\n";

		}

		if(is_single()){

			echo "\t\t\t<li><a href=\"".get_bloginfo('comments_atom_url').'" title="'.__('Comments on this post Atom feed',JBCOMMON_TEXT_DOMAIN).'" target="_blank">'.__('Comments on this post',JBCOMMON_TEXT_DOMAIN)."</a></li>\n";

			$post=get_post(get_the_ID(),ARRAY_A);
			$author_name=get_the_author();
			echo "\t\t\t<li><a href=\"".get_author_feed_link($post['post_author'],'atom').'" title="'.str_replace('%author_name%',$author_name,__('Author %author_name% Atom feed',JBCOMMON_TEXT_DOMAIN)).'" target="_blank">'.str_replace('%author_name%',$author_name,__('Author %author_name%',JBCOMMON_TEXT_DOMAIN))."</a></li>\n";

		}else if(is_search()){

			echo "\t\t\t<li><a href=\"".get_search_feed_link(get_search_query(),'atom').'" title="'.__('This search RSS v2.0 feed',JBCOMMON_TEXT_DOMAIN).'" target="_blank">'.__('This search',JBCOMMON_TEXT_DOMAIN)."</a></li>\n";

		}

?>

			</ul>
		</li>
		<li>
			<h4><?php _e('RSS v2.0',JBCOMMON_TEXT_DOMAIN);?></h4>
			<ul>

				<li><a href="<?php echo get_bloginfo('rss2_url');?>" title="<?php _e('Website RSS v2.0 feed',JBCOMMON_TEXT_DOMAIN);?>" target="_blank"><?php _e('Website',JBCOMMON_TEXT_DOMAIN);?></a></li>

<?php

		$categories=get_the_category();
		foreach($categories as $category){

			$id=$category->cat_ID;
			$name=htmlentities($category->cat_name,ENT_QUOTES,'UTF-8');
			
			echo "\t\t\t<li><a href=\"".get_category_feed_link($id,'rss2').'" title="'.str_replace('%category_name%',$name,__('Category %category_name% RSS v2.0 feed',JBCOMMON_TEXT_DOMAIN)).'" target="_blank">'.str_replace('%category_name%',$name,__('Category %category_name%',JBCOMMON_TEXT_DOMAIN))."</a></li>\n";

		}

		if(is_single()){

			echo "\t\t\t<li><a href=\"".get_bloginfo('comments_rss2_url').'" title="'.__('Comments on this post RSS v2.0 feed',JBCOMMON_TEXT_DOMAIN).'" target="_blank">'.__('Comments on this post',JBCOMMON_TEXT_DOMAIN)."</a></li>\n";

			$post=get_post(get_the_ID(),ARRAY_A);
			$author_name=get_the_author();
			echo "\t\t\t<li><a href=\"".get_author_feed_link($post['post_author'],'rss2').'" title="'.str_replace('%author_name%',$author_name,__('Author %author_name% RSS v2.0 feed',JBCOMMON_TEXT_DOMAIN)).'" target="_blank">'.str_replace('%author_name%',$author_name,__('Author %author_name%',JBCOMMON_TEXT_DOMAIN))."</a></li>\n";

		}else if(is_search()){

			echo "\t\t\t<li><a href=\"".get_search_feed_link(get_search_query(),'rss2').'" title="'.__('This search RSS v2.0 feed',JBCOMMON_TEXT_DOMAIN).'" target="_blank">'.__('This search',JBCOMMON_TEXT_DOMAIN)."</a></li>\n";

		}

?>

			</ul>
		</li>
	</ul>

<?php
		if($container_id!=false){
?>

	<script>

		new function(){

			var container_id='<?php echo $container_id;?>';
			var container=document.getElementById(container_id);
			var reference_element=container.getElementsByTagName('ul')[0];

			var div=document.createElement('div');

			var label=document.createElement('label');
			label.setAttribute('id',container_id+'-select');
			label.appendChild(document.createTextNode('<?php _e('Feed type:',JBCOMMON_TEXT_DOMAIN);?>'));

			var select=document.createElement('select');
			select.onchange=function(){

				var container_id='<?php echo $container_id;?>';
				var container=document.getElementById(container_id);
				var nav=container.getElementsByTagName('ul')[0].firstChild;

				var lists=[];
				while(nav=nav.nextSibling){
					if(nav instanceof HTMLLIElement){
						lists.push(nav);
					}
				}

				if(this.value=='atom'){
					lists[0].style.display='';
					lists[1].style.display='none';
				}else{
					lists[0].style.display='none';
					lists[1].style.display='';
				}

			}

			var option=document.createElement('option');
			option.setAttribute('value','atom');
			option.setAttribute('selected','selected');
			option.appendChild(document.createTextNode('<?php _e('Atom',JBCOMMON_TEXT_DOMAIN);?>'));
			select.appendChild(option);

			var option=document.createElement('option');
			option.setAttribute('value','rss2');
			option.appendChild(document.createTextNode('<?php _e('RSS v2.0',JBCOMMON_TEXT_DOMAIN);?>'));
			select.appendChild(option);

			div.appendChild(label);
			div.appendChild(select);

			container.insertBefore(div,reference_element);

			var h4s=container.getElementsByTagName('h4');
			for(i=0;i<h4s.length;i++){
				h4s[i].style.display='none';
			}

			select.onchange();

		}();

	</script>

<?php
		}

	}


}
add_action('widgets_init',create_function('','register_widget("JBCommon_Feeds_Widget");'));



// SHORTCODE

function jbcommon_sc_feeds_func($atts,$content='') {

	$atts=shortcode_atts(
		array(
			'id'=>false,
			'class'=>''
		),
		$atts
	);

	if(
		$atts['id']===false
		&& $content!=''
	){
		$atts['id']=$content;
	}

	foreach($atts as $key=>$value){
		${$key}=do_shortcode(esc_attr($value));
	}

	if($id==''){
		$id=false;
	}

	if($class==''){
		$class='jbcommon_sc_feeds';
	}

	if(ob_start()){

		echo "\t<div ";

		if($id!=false){
			echo 'id="'.$id.'" ';
		}

		echo 'class="'.$class."\">\n";

		JBCommon_Feeds_Widget::echo_feeds($id);

		echo "\t</div>\n";

		$r=ob_get_contents();
		ob_end_clean();

	}else{
		$r='';
	}

	return $r;
}
add_shortcode('jbcommon_sc_feeds','jbcommon_sc_feeds_func');

?>