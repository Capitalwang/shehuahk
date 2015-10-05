<?php
/**
 * 字符串转换
 * 例子	{Reverts str=''}
 */
function smarty_function_Reverts($params)
{
	$Revert=str_replace("&#34;",chr(34),trim($params['str']));
	$Revert=str_replace("&#39;",chr(39),$Revert);
	$Revert=str_replace("&#40;",chr(40),$Revert);
	$Revert=str_replace("&#41;",chr(41),$Revert);
	$Revert=str_replace("&#42;",chr(42),$Revert);
	$Revert=str_replace("&#91;",chr(91),$Revert);
	$Revert=str_replace("&#93;",chr(93),$Revert);
	return $Revert;
	unset($Revert);
}
?>