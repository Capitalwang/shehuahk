<?php

Header( "HTTP/1.1 301 Moved Permanently" ); //HTtp 301�ļ����ø���һ������seo.

 $url= "http://www.shehua.hk/wholesale/"; //Ĭ�ϲ�������ת���ַ
$location="Location: $url"; //
header($location); // 
exit(); 

?>
