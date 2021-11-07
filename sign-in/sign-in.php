<?php 
    session_start(); 
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

    if(isset($_POST['sign-in'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);


        //check username and password in db
        $sql = "SELECT * FROM USER WHERE USERNAME = '$username' AND PASSWORD = '$password'";
        $result =mysqli_query($connect,$sql);


        if(mysqli_num_rows($result) == 1 ){
            header("Location: home-page\home-page.php");
        }
        else{
            echo '<script>
                alert("Tên tài khoản hoặc mật khẩu không chính xác");
                window.location = "sign-in.php"
            </script>;';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signIn.css">
    <title>Document</title>
</head>
<body>
<div class="signIn">
    <h1>Đăng nhập</h1>
        <!-- <div class="signIn__quickSignIn">
            <div class="signIn__quickSignIn__facebook">
                <img class="signIn__quickSignIn__facebook--img" src="facebook.svg" alt="facebook icon">
                <input type="button" class="signIn__quickSignIn--button" id="buttonFacebook" value="Đăng nhập bằng Facebook">
            </div>
            <div class="signIn__quickSignIn__google">
                <img class="signIn__quickSignIn__google--img" src="google.svg" alt="google icon">
                <input type="button" class="signIn__quickSignIn--button" id="buttonGoogle" value="Đăng nhập bằng Google">
            </div>
        </div> -->

        <form action="sign-in.php" method='post'>
            <div class="signIn__fillOut">
                <div class="signIn__fillOut__account">
                    <input required type="text" id="accountName" name="accountName"  placeholder="Tài khoản">
                    <input required type="password" id="psw" name="psw" placeholder="Mật khẩu">
                </div>
            </div>
            <div class="singIn__further">
                <input type="checkbox" name="Reme" id="Reme" value="password">
                <label for="Reme">Nhớ thông tin</label>
                <div class="singIn__further--a"><a href="#">Quên mật khẩu</a></div>
            </div>
            <input type="submit" name="signInSubmit" id="signInSubmit" value="Đăng nhập">
        </form>

        <div class="singIn__signUp">
            <p>Bạn chưa có tài khoản? <a href="#">Đăng ký ngay</a></p>
        </div>

</div>
    
</body>



</html>