<?php 
    session_start(); 
    header('Content-Type: text/html; charset=utf-8');
    //host info
    $host = 'localhost';
    $host_user = 'root';
    $host_password = '';
    $db_name= 'demo';
    //connect db
    $connect = mysqli_connect($host, $host_user, $host_password, $db_name) 
    //conect fail
        or die ('Lỗi kết nối'); 

    mysqli_set_charset($connect, "utf8");

    if(isset($_POST['signInSubmit'])){
        $username = addslashes($_POST['accountName']);
        $password = addslashes($_POST['psw']);

        //check username and password in db
        //Kiểm tra tên đăng nhập có tồn tại không
        $query = "SELECT USERNAME, PASSWORD FROM tb_user WHERE USERNAME='$username';";

        $result = mysqli_query($connect, $query) or die( mysqli_error($connect));

        if (!$result) {
            echo "Tên đăng nhập hoặc mật khẩu không đúng!";
        } 
        
        //Lấy mật khẩu trong database ra
        $row = mysqli_fetch_array($result);
        
        //So sánh 2 mật khẩu có trùng khớp hay không
        if ($password != $row['PASSWORD']) {
            echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
        //Hao bo sung session de lam comment
        $query_all = "SELECT * FROM tb_user WHERE USERNAME='$username';";
        $result_all = mysqli_query($connect, $query_all) or die( mysqli_error($connect));
        $row_all = mysqli_fetch_array($result_all);
        $_SESSION['FirstName'] = $row_all['FIRSTNAME'];
        $_SESSION['LastName'] = $row_all['LASTNAME'];
        $_SESSION['ID'] = $row_all['ID_USER'];
        //Lưu tên đăng nhập
        $_SESSION['username'] = $username;
        
        echo "Xin chào <b>" .$_SESSION['FirstName']. "</b>. Bạn đã đăng nhập thành công. <a href='..\home-page\home-page.html'>Thoát</a>";
        die();
        $connect->close();
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
            <p>Bạn chưa có tài khoản? <a href="../sign-up/sign-up.php">Đăng ký ngay</a></p>
        </div>

</div>
    
</body>

</html>