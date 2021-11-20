<?php
    session_start();
    $host = 'localhost';
    $host_user = 'root';
    $host_password = '';
    $database = 'demo';

    $conn = new mysqli($host, $host_user, $host_password, $database);
    if (!$conn) {
        die("Kết nối CSDL thất bại" . $conn->connect_error);
    }
    /* echo "Kết nối CSDL thành công"; */
    $id_u = $_SESSION['ID'];
    $id_p = $_GET['id'];
    $sql = "SELECT TB_POSTS.POST_NAME, TB_POSTS.CONTENT FROM TB_POSTS WHERE TB_POSTS.ID_USER = $id_u AND TB_POSTS.ID_POSTS = $id_p";
    $kq = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myBlog.css">
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
            <input type="button" value="Đăng xuất" id="btn_logout" onclick="logout()">
        </div>
    </header>
    <section>
        <ul>
            <li><a href="../home-page/home-page.php">Trang chủ</a></li>
            <li><strong><a href="./myBlog.php">Bài viết của tôi</a></strong></li>
            <li><a href="../blogComment/blogComment.html">Đóng góp & ý kiến</a></li>
        </ul>
        <?php while($row = $kq->fetch_assoc()) { ?>
            <div class="section__edit">
            <h1>CHỈNH SỬA BÀI VIẾT</h1>
            <form method="POST" id="edit__form--post">
                <input type="text" id="edit__title" name = "edit__title" value="<?php echo $row["POST_NAME"]; ?>"> <br>
                <textarea name="edit__content" id="edit__content" cols="30" rows="10"><?php echo $row["CONTENT"]; ?></textarea>
                <div class="btn__edit">
                    <input type="submit" name="btn__edit" value="Chỉnh sửa">
                    <input type="submit" name="btn_cancle" value="Hủy">
                </div>
            </form>
        </div>
        <?php } ?>
        <?php
            if(isset($_POST["btn__edit"])) {
                $content__edited = $_POST["edit__content"];
                $title__edited = $_POST["edit__title"];
                $sql_updated = "UPDATE TB_POSTS SET CONTENT ='$content__edited', TIME = now(), POST_NAME ='$title__edited' WHERE ID_POSTS = $id_p";
                $conn->query($sql_updated);
                header("Location:myBlog.php");
            }
            if(isset($_POST["btn_cancle"])) {
                header("Location:myBlog.php");
            }
        ?>
    </section>
    <script src="../logout.js"></script>
</body>

</html>