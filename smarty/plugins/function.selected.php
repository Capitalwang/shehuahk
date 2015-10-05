<?php
/**
 * 用于表单类型的select
 * 例子1		{selected val=$id array=数组}
 * 例子2		{selected val=$id str=字符串}
 */
function smarty_function_selected($params)
{
	if (is_array($params['array']))
	{
		if (in_array($params['val'],$params['array'])) return 'selected="selected"';
	}else{
		if ($params['val'] == $params['str']) return 'selected="selected"';
	}
}
?>