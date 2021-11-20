<?php
    session_start();

    //Nếu chưa đăng nhập chuyển hướng san trang đăng nhập 
    if(empty($_SESSION['username'])){
        session_destroy();
    header('location: http://localhost/lab1_nmantt/main-page/main-page.php');
    };

    $host = 'localhost';
    $host_user = 'root';
    $host_password = '';
    $database = 'demo';

    $conn = new mysqli($host, $host_user, $host_password, $database);
    if (!$conn) {
        die("Kết nối CSDL thất bại" . $conn->connect_error);
    }
    /* echo "Kết nối CSDL thành công"; */
    if(isset($_POST['feedback'])){
        $content = $_POST['content'];
        $user_id = $_SESSION['ID'];

        $sql = "INSERT INTO tb_feedback 
                    (ID_USER,CONTENT,TIME) 
                VALUES 
                    ('$user_id','$content',now())";
        $kq = $conn->query($sql);
        if($kq){
            echo "<script>
                show_thank();
            </script>";
        };
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="blogComment.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="header__banner">
            <img src="banner_mini.png" alt="banner_mini" id="header--banner-img">
            <h1>UIBlog</h1>
        </div>
        <div class="header__logOut">
            <img src="user1.svg" alt="user1" id="header--user1--img">
            <?php 
                echo "<strong id='username'>".$_SESSION["username"]."</strong>"; 
            ?> 
            <a href="../logout.php"><input id="btn_logout" type="button" value="Đăng xuất"></a>
        </div>
    </header>
    <section>

        <form action="blogComment.php" method="post">
            <ul>
                <li><a href="../home-page/home-page.php">Trang chủ</a></li>
                <li><a href="../myBlog/myBlog.php">Bài viết của tôi</a></li>
                <li><strong><a href="../blogComment/blogComment.php">Đóng góp & ý kiến</a></strong></li>
            </ul>
            <textarea autofocus required name="content" id="commentBox" placeholder="Bạn đang nghĩ gì ?"
                style="height:250px; width:900px; border-color: rgb(36, 100, 219);"></textarea>
            <input type="submit" value="Gửi" name="feedback" id="sendButton" >
        </form>
    </section>

    <div class="responseBox">
        <img src="checked_tick.svg" alt="checked_tick">
        <p>Cảm ơn vì ý kiến đóng góp của bạn</p>
    </div>

    <script src="../logout.js"></script>
    <script>
        let show_response = document.querySelector(".responseBox");
        let content_box = document.querySelector("#commentBox");
        function show_thank() {
            show_response.style.display = "block";
            content_box.value = "";
            setTimeout(hidden_thank, 1500);
            return false;
        }
        function hidden_thank() {
            show_response.style.display = "none";
        }
    </script>
</body>

</html>