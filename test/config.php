<?php
	define('Host' , 'localhost');
	define('Port' , '3306');
	define('Database' , 'sh_pifa');
	define('UserName' , '52shehua_com');
	define('Password' , 'shehuashehua168');
	//define('DOMAIN' , 'http://amz/');
	
	//腾讯APP
	define('TX_appkey' , '801074376');
	define('TX_appsecret' , '151e5f3b8711378ff1180aefce0a43e6');
	define('TX_callback' , 'http://www.shehua.hk/test/exec.php?O=QQ_oauth&A=callback');
	
	//新浪APP
	define( "WB_AKEY" , '376098111' );
	define( "WB_SKEY" , 'aee9685392315c793eb48f85a5658aed' );
	define( "WB_CALLBACK_URL" , 'http://www.shehua.hk/test/exec.php?O=Sina_oauth&A=callback');
	
	/**
	 * 请不要直接用windows记事本直接打开修改
	 * TX_callback 和  WB_CALLBACK_URL 都是回调页, 如果位置有调整,请改 
	 * "http://www.shehua.hk/test/" 这段,后面的请勿修改
	 * 
	 * WB_CALLBACK_URL 新浪部分的回调网址改变后,请在新浪应用中将对于的值做修改
	 */
?>