<?php

Header( "HTTP/1.1 301 Moved Permanently" ); //HTtp 301文件永久更改一般用于seo.

 $url= "http://www.shehua.hk/wholesale/"; //默认不带参数转向地址
$location="Location: $url"; //
header($location); // 
exit(); 

?>
