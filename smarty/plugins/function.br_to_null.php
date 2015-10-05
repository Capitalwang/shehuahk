<?php
/**
 * {br_to_null str=''}
 */
function smarty_function_br_to_null($params)
{
	return str_replace('<br />','',$params['str']);
}
?>