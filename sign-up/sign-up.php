
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign-up.css">
    <title>Sign up</title>
</head>

<body>
    <main>
        <h1>Đăng ký</h1>
        <form action="" method="post">
            <div class="information">
                <input required type="text" id="last-name" name="last-name" placeholder="Họ">
                <input required type="text" id="first-name" name="first-name" placeholder="Tên">
                <input required type="text" id="username" name="username" placeholder="Tài khoản">
                <input required type="email" name="email" id="email" placeholder="E-mail">
                <input required type="password" id="password" name="password" placeholder="Mật khẩu">
                <input required type="password" id="retype-password" name="retype-password" placeholder="Nhập lại mật khẩu">
                <!-- <input type="text" id="confirmed-code" name="confirmed-code" placeholder="Code xác nhận">
                <p class="confirmed-code">12345</p> -->
            </div>
            <div class="term">
                <input required type="checkbox" id="check" name="check">
                <p>Tôi đồng ý với các <a href="#">điều khoản</a></p>
            </div>
            <input type="submit" value="Đăng ký" class="sign-up">
        </form>
        <p class="sign-in">Bạn đã có tài khoản?<a href="#">Đăng nhập</a></p>
    </main>
</body>


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
                        window.location="sign-up.php";
                    </script>';
            die();
        }
        else {
            $sql = "INSERT INTO USER (USERNAME, PASSWORD, EMAIL, FIRSTNAME, LASTNAME) VALUES ('$username','$password','$email','$first_name','$last_name')";
            echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="sign-up.php";</script>';
        }
    }
    mysqli_close($connect);
?>


<script>
    const passwordElement = document.querySelector('#password')
    const retypePasswordElement = document.querySelector('#retype-password')

    retypePasswordElement.addEventListener("focusout", () => {
        if (passwordElement.value != retypePasswordElement.value) {
            retypePasswordElement.setCustomValidity("Mật khẩu nhập lại khác với mật khẩu ở trên")
        }
        else {
            retypePasswordElement.setCustomValidity("")
        }
    })
</script>

</html>