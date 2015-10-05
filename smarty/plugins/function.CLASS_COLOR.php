<?php
/**
 * @name CLASS_COLOR
 * 例子1		{CLASS_COLOR *=* CLASS=''}
 * 例子2		{CLASS_COLOR *=* COLOR=''}
 */
function smarty_function_CLASS_COLOR($params)
{
	//print_r($params);exit;
	$color = ($params['COLOR'] == null) ? 'red' : $params['COLOR'];
	$class = ($params['CLASS'] == null) ? null : $params['CLASS'] ;
	
	unset($params['COLOR'] , $params['CLASS']);
	
	foreach ($params as $key => $val)
	{
		if ($val != $key) return;
	}
	
	if ($class) return 'class='.$class;
	return "style='color:{$color}'";
}
?>