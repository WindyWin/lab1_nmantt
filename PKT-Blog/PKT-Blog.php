<?php
    $host = 'localhost';
    $host_user = 'root';
    $host_password = '';
    $database = 'btth_antt';

    $conn = new mysqli($host, $host_user, $host_password, $database);
    if (!$conn) {
        die("Kết nối CSDL thất bại".$conn->connect_error);
    }
    /* echo "Kết nối CSDL thành công"; */

    $sql = "SELECT TB_POSTS.POST_NAME, TB_POSTS.TIME, TB_POSTS.CONTENT, TB_USER.FIRSTNAME, TB_USER.LASTNAME FROM TB_POSTS, TB_USER WHERE TB_POSTS.ID_USER = TB_USER.ID_USER";
    $kq = $conn->query($sql);

    $sql1 = "SELECT TB_COMMENT.CONTENT, TB_USER.FIRSTNAME, TB_USER.LASTNAME FROM TB_COMMENT, TB_USER WHERE TB_COMMENT.ID_USER = TB_USER.ID_USER";
    $kq1 = $conn->query($sql1);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PKT-Blog.css">
    <title>PKT Page</title>
</head>
<body>
    <header>
        <img src="banner_mini.png" alt="banner" id="banner">
        <a href="../sign-in-page/sign-in-page.html"><input type="button" value="Đăng xuất"></a>
        <img src="user1.svg" alt="user1" id="user1">
        <h1>UIBlog</h1>
    </header>
    <main>
        <ul>
            <li> <strong><a href="../home-page/home-page.html">Trang chủ</a></strong></li>
            <li><a href="#">Bài viết của tôi</a></li>
            <li><a href="../blogComment/blogComment.html">Đóng góp & ý kiến</a></li>
        </ul>
        <?php 
            while ($row = $kq->fetch_assoc()) {?>
            <div class="post_fr">
            
                <img id="user2" src="user2.svg" alt="user2">
                <div id="content">
                <p>
                    <strong>Tên bài viết: <?php echo $row["POST_NAME"]; ?>
                        <br>Tác giả: <?php echo $row["FIRSTNAME"]." ".$row["LASTNAME"]; ?>
                        <br>Ngày đăng bài: <?php echo $row["TIME"]; ?>
                    </strong>
                </p>
                <br>
                <p><?php echo $row["CONTENT"]; ?></p>
                </div>
            </div>
        <?php } ?>
            <form class="comment" method="POST">
                        <p>Bình luận của bạn về bài viết</p>
                        <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Bình luận của bạn"></textarea>
                        <input name="btn_comment" class="comment__input--kai" type="submit" value="Gửi" style="width: 70px; height: 30px; position: relative; top: 14em; left: 70em;">
            </form>
        <?php
            if (isset($_POST['btn_comment'])) {
               /* $cmt = $_POST['comment'];
               $sql_insert_comment = "INSERT INTO tb_comment(ID_CMT, ID_USER, ID_POSTS, CONTENT, TIME) VALUES ('autoid','2','1','$cmt', now())"; */
               echo '<script>alert("hello")</script>';
            }
        ?>

        <?php while ($row1 = $kq1->fetch_assoc()) { ?>
            <div class="insert__comment">
                <div class="CP-comment">
                    <img id="user3" src="user.svg" alt="user3">
                    <p><?php echo $row1["FIRSTNAME"]." ".$row1["LASTNAME"]; ?></p>
                </div>
                <p class="old-comment"><?php echo $row1["CONTENT"]; ?></p>
            </div>
        <?php }?>
    </main>
</body>
</html>