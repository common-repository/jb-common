<?php

function jbcommon_sc_get_constant_func($atts,$content='') {
	
	$atts=shortcode_atts(
		array(
			'c'=>''
		),
		$atts
	);

	if(
		$atts['c']==''
		&& $content!=''
	){
		$atts['c']=$content;
	}

	foreach($atts as $key=>$value){
		${$key}=do_shortcode(esc_attr($value));
	}

	$r=@constant($c);

	if($r===null){
		$r=$c;
	}

	return $r;
}
add_shortcode('jbcommon_sc_get_constant','jbcommon_sc_get_constant_func');



function jbcommon_sc_call_function_func($atts,$content='') {

	$atts=shortcode_atts(
		array(
			'func'=>'',
			'params'=>'',
			'params_separator'=>','
		),
		$atts
	);

	if(
		$atts['params']==''
		&& $content!=''
	){
		$atts['params']=$content;
	}

	foreach($atts as $key=>$value){
		${$key}=do_shortcode(esc_attr($value));
	}

	if(is_callable($func)){
		$r=call_user_func_array($func,explode($params_separator,$params));
	}else{
		$r='';
	}

	return $r;
}
add_shortcode('jbcommon_sc_call_function','jbcommon_sc_call_function_func');

?>