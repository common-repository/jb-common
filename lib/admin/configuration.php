<?php

function jbcommon_configuration(){

// 	jbcommon_print_r($_POST);

	require_once(JBCOMMON_PLUGIN_PATH.'/'.JBCOMMON_CFG_DIR.'/options.php');
	$options_defaults=unserialize(JBCOMMON_OPTIONS);

	$updated=array();
	foreach($options_defaults as $options_group){
		foreach($options_group['group_options'] as $option_name=>$option_array){
			if(isset($_POST[$option_name])){

				$posted=stripslashes(urldecode($_POST[$option_name]));

				$unserialized=@unserialize($posted);
				if(is_array($unserialized)){
					$new_value=$unserialized;
				}else{
					$new_value=$posted;
				}

				$current_value=get_option($option_name);
				if($current_value!=$new_value){
					update_option($option_name,$new_value);
					$updated[]=$option_name;
				}
			}
		}
	}

	if(count($updated)>0){
		$logger=jbcommon_get_logger();
		$logger->log(
			str_replace(
				'%options_names%',
				implode(' , ',$updated),
				__('Options updated ( %options_names% ).',JBCOMMON_TEXT_DOMAIN)
			)
		);
	}



// --- ECHO START -------------------------------------------------------------

	jbcommon_admin_header(__('Configuration',JBCOMMON_TEXT_DOMAIN));

?>

<section id="jbcommon-configuration">
	<h2><?php _e('Options',JBCOMMON_TEXT_DOMAIN);?></h2>

	<script>

		function updateCustomRadioValue(option_name){
			document.getElementById(option_name+'-custom-radio').value=encodeURIComponent(document.getElementById(option_name+'-custom-input').value);
		}

	</script>

	<form action="<?php echo jbcommon_get_admin_permalink();?>" method="post">
<?php

	foreach($options_defaults as $options_group){

?>
		<table class="wp-list-table widefat fixed">
			<caption><?php echo $options_group['group_label'];?></caption>
			<thead>
				<th><?php _e('Name',JBCOMMON_TEXT_DOMAIN);?></th>
				<th><?php _e('Description',JBCOMMON_TEXT_DOMAIN);?></th>
				<th><?php _e('Custom value',JBCOMMON_TEXT_DOMAIN);?></th>
				<th><?php _e('Default value',JBCOMMON_TEXT_DOMAIN);?></th>
			</thead>
			<tbody>
<?php

		$options_group_size=count($options_group);

		$odd_row=true;
		foreach($options_group['group_options'] as $option_name=>$option_array){

			$option_current_value=get_option($option_name,false);

			if(isset($option_array['default'])){
				if(is_array($option_array['default'])){
					$option_default_value=$option_array['default']['option_value'];
				}else{
					$option_default_value=$option_array['default'];
				}
			}else{
				$option_default_value='';
			}
			if(isset($option_array['option_options'])){
				$option_values_size=count($option_array['option_options']);
			}else{
				$option_values_size=0;
			}

			if(is_array($option_current_value)){
				$option_current_value=serialize($option_current_value);
			}
			if(is_array($option_default_value)){
				$option_default_value=serialize($option_default_value);
			}

			if(
				$option_current_value===false
				|| $option_current_value==$option_default_value
			){
				$default=true;
			}else{
				$default=false;
			}

			if($odd_row){
				$row_class='jbcommon-admin-tr-odd';
				$odd_row=false;
			}else{
				$row_class='jbcommon-admin-tr-even';
				$odd_row=true;
			}

			if($option_values_size==0){
				$title=htmlentities($option_current_value);
			}else{
				$title='';
				foreach($option_array['option_options'] as $value_array){
					if($value_array['option_value']==$option_current_value){
						$title=$value_array['option_label'];
					}
				}
			}

?>
				<tr id="<?php echo $option_name;?>" class="<?php echo $row_class;?>">
					<td><span class="jbcommon-configuration-option-name"><?php echo $option_name;?></span></td>
					<td><?php echo $option_array['description'];?></td>
					<td<?php if(!$default){echo ' class="jbcommon-configuration-td-selected" title="'.str_replace('%current_value%',$title,__('Current value: %current_value%',JBCOMMON_TEXT_DOMAIN)).'"';}?>>
						<input id="<?php echo $option_name.'-custom-radio';?>" name="<?php echo $option_name;?>" type="radio" value="<?php echo urlencode($option_current_value);?>" <?php if(!$default){echo 'checked="checked"';}?>/>
<?php
			if($option_values_size==0){
?>
						<textarea id="<?php echo $option_name.'-custom-input';?>" onchange="updateCustomRadioValue('<?php echo $option_name;?>');"><?php echo $option_current_value;?></textarea>
<?php
			}else{
				echo "\t\t\t\t\t\t<select id=\"$option_name-custom-input\" onchange=\"updateCustomRadioValue('$option_name');\">\n";
				foreach($option_array['option_options'] as $value_array){
					echo "\t\t\t\t\t\t\t<option value=\"".$value_array['option_value'].'"';
					if($value_array['option_value'] == $option_current_value){
						echo ' selected="selected"';
					}
					echo '>'.$value_array['option_label']."</option>\n";
				}
				echo "\t\t\t\t\t\t</select>\n";
			}
?>
					</td>
					<td<?php if($default){echo ' class="jbcommon-configuration-td-selected" title="'.str_replace('%current_value%',$title,__('Current value: %current_value%',JBCOMMON_TEXT_DOMAIN)).'"';}?>>
						<input id="<?php echo $option_name.'-default-radio';?>" name="<?php echo $option_name;?>" type="radio" value="<?php echo urlencode($option_default_value);?>" <?php if($default){echo 'checked="checked"';}?>/>
<?php
			if($option_values_size==0){
?>
						<textarea id="<?php echo $option_name.'-default-input';?>" readonly="readonly"><?php echo $option_default_value;?></textarea>
<?php
			}else{
				echo "\t\t\t\t\t\t<select id=\"$option_name-default-input\" disabled=\"disabled\">\n";
				echo "\t\t\t\t\t\t\t<option value=\"".$option_array['default']['option_value'].'" selected="selected">'.$option_array['default']['option_label']."</option>\n";
				echo "\t\t\t\t\t\t</select>\n";
			}
?>
					</td>
				</tr>
<?php
		}
?>
			</tbody>
		</table>
<?php
	}
?>

		<input type="submit" value="<?php _e('Submit',JBCOMMON_TEXT_DOMAIN);?>" />
	</form>
</section>

<?php
}

?>