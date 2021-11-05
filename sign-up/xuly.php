<?php
header('Content-Type: text/html; charset=utf-8');
//host info
$host = 'localhost';
$host_user = 'root';
$host_password = '';
$database = '';
//connect db
$connect = mysqli_connect($host, $db_user, $db_password,$database) 
//conect fail
    or die ('Lỗi kết nối'); 
mysqli_set_charset($connect, "utf8");
//get data from form

if(isset($_POST['dangky'])){
    $last_name = trim($_POST['last-name']);
    $first_name = trim($_POST['first_name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    


    //import data into db
    $sql = "SELECT * FROM USER WHERE USER = '$username' OR EMAIL='$email";

    $result =mysqli_query($connect,$sql);
    //check username already existed in db
    if(mysqli_num_rows($result) > 0){
        echo    '<script language="javascript">
                    alert("Username hoặc Email đã bị trùng!"); 
                    window.location="register.php";
                </script>';
        die();
    }
    else {
        $sql = "INSERT INTO USER (USERNAME, PASSWORD, EMAIL, FIRSTNAME, LASTNAME) VALUES ('$username','$password','$email','$first_name','$last_name')";
        echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="register.php";</script>';
    }
}
mysqli_close($connect);
?>