<?php
header('Content-Type: text/html; charset=utf-8');


//host info
$host = 'localhost';
$db_user = 'root';
$db_password = '';
//connect db
$connect = mysqli_connect($host, $db_user, $db_password) 
//conect fail
    or die ('Lỗi kết nối'. mysqli_error()); 
mysqli_set_charset($connect, "utf8");







