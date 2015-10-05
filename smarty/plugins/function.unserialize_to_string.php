<?php
function smarty_function_unserialize_to_string($params)
{
	return @implode(',' , unserialize($params['str']));
}
?>