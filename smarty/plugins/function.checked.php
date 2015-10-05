<?php
/**
 * 用于表单类型的,radio,checkbox
 * 例子1		{checked val=$id array=数组}
 * 例子2		{checked val=$id str=字符串}
 */
function smarty_function_checked($params)
{
	if (is_array($params['array']))
	{
		if (in_array($params['val'],$params['array'])) return 'checked="checked"';
	}else{
		if (strpos($params['str'],$params['val']) !== false) return 'checked="checked"';
	}
}
?>