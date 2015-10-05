<?php
/**
 * 关键字加亮
 * 例子	{brite_spot query ='1' str='2103撒旦' color='red'}
 */
function smarty_function_brite_spot($params)
{
	$params['color'] = ($params['color']) ? $params['color'] : 'red';

	$params['str'] = rawurlencode($params['str']);
	$params['query'] = rawurlencode($params['query']);
	$params['str'] = str_replace($params['query'],"<font style='color:{$params['color']};font-weight:900'>".$params['query'].'</font>',$params['str']);
	return rawurldecode($params['str']);
}
?>