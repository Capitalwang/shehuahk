<?php
/**
 * @name write_url	重写url
 * 
 * @param $url		当前的url地址
 * @param $name		添加的参数
 * @param $value	添加的值
 * @param $DEL		删除的参数(可为空 , 删除多参数时候用,隔开)
 */
function smarty_function_write_url($params)
{
	$url = parse_url($params['url']);
	$url['query'] = explode('&' , $url['query']);
	$temp = array();
	
	foreach ($url['query'] as $key => $val)
	{
		$val = explode('=' , $val);
		$temp[$val[0]] = $val[1];
	}
	
	$url['query'] = $temp;
	
	//删除参数
	if ($params['DEL'])
	{
		if ($params['DEL'] == 'ALL')
			$url['query'] = array('open'=>$url['query']['open']);
		else
		{
			$del = explode(',' , $params['DEL']);
			foreach ($del as $val) unset($url['query'][$val]);
		}
	}
	
	unset($params['url'] , $params['DEL']);
	
	foreach ($params as $key => $val) $url['query'][$key] = $val;
	
	//return http_build_url('' , $url , HTTP_URL_STRIP_AUTH | HTTP_URL_JOIN_PATH | HTTP_URL_JOIN_QUERY | HTTP_URL_STRIP_FRAGMENT);
	$str = '';
	$str .= ($url['scheme']) ? $url['scheme'] . '://' : '';
	$str .= ($url['user'] && $url['pass']) ? $url['user'] . ':' . $url['pass'] . '@' : '';
	$str .= ($url['host']) ? $url['host'] : '';
	$str .= ($url['path']) ? $url['path'] : '';
	$str .= ($url['query']) ? '?' . http_build_query($url['query']) : '';
	$str .= ($url['fragment']) ? '#' . $url['fragment'] : '';
	
	return $str;
}
?>