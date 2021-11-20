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

  
        //check exist username in db
        $query = "SELECT * FROM tb_user WHERE USERNAME='$username';";

        $result = mysqli_query($connect, $query) or die( mysqli_error($connect));

        if (!$result) {
            echo "<script>
                alert('Tên đăng nhập hoặc mật khẩu không đúng!');
                window.location= 'sign-in.php'
            </script>";
        } 
        
        //get password in db
        $row = mysqli_fetch_array($result);
        
        //compare password
        if ($password != $row['PASSWORD']) {
            echo "<script>
                alert('Tên đăng nhập hoặc mật khẩu không đúng!');
                window.location= 'sign-in.php'
            </script>";
            exit;
        }
        //Hao bo sung session de lam comment
        //$query_all = "SELECT * FROM tb_user WHERE USERNAME='$username';";
    

        //Lưu thông tin người đăng nhập
        $_SESSION['FirstName'] = $row['FIRSTNAME'];
        $_SESSION['LastName'] = $row['LASTNAME'];
        $_SESSION['ID'] = $row['ID_USER'];
        $_SESSION['username'] = $username;
        
        echo "<script>                    
                window.location.replace('http://localhost/lab1_nmantt/home-page/home-page.php') ;
                window.parent.location.replace('http://localhost/lab1_nmantt/home-page/home-page.php');
            </script>";
        $connect->close();
        die();
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