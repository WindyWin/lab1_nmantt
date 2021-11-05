<?php
header('Content-Type: text/html; charset=utf-8');


//host info
$host = 'localhost';
$db_user = 'root';
$db_password = '';
//connect db
$connect = mysqli_connect($host, $db_user, $db_password) 
//conect fail
    or die ('Lỗi kết nối'); 
mysqli_set_charset($connect, "utf8");

if(if(isset($_POST['sign-in'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);)


    //check username and password in db
    $sql = "SELECT * FROM USER WHERE USERNAME = '$username' AND 'password'"
    $result =mysqli_query($connect,$sql);


    if(mysqli_num_rows($result) == 0 ){
        
    }









?>




