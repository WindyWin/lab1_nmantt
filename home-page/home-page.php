<?php
    session_start();
    $host = 'localhost';
    $host_user = 'root';
    $host_password = '';
    $database = 'demo';

    $conn = new mysqli($host, $host_user, $host_password, $database);
    if (!$conn) {
        die("Kết nối CSDL thất bại".$conn->connect_error);
    }
    /* echo "Kết nối CSDL thành công"; */

    $sql = "SELECT TB_POSTS.POST_NAME, TB_POSTS.TIME, TB_POSTS.CONTENT, TB_USER.FIRSTNAME, TB_USER.LASTNAME, TB_POSTS.ID_POSTS FROM TB_POSTS, TB_USER WHERE TB_POSTS.ID_USER = TB_USER.ID_USER";
    $kq = $conn->query($sql);
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home-page.css">
    <title>Main Page</title>
</head>

<body>
    <header>
        <img src="banner_mini.png" alt="banner" id="banner">
        <a href="#"><input type="button" value="Đăng xuất" id="btn_logout" onclick="logout()"></a>
        <img src="user1.svg" alt="user1" id="user1">
        <h1>UIBlog</h1>
    </header>
    <main>
        <ul>
            <li> <strong><a href="./home-page.html">Trang chủ</a></strong></li>
            <li><a href="../myBlog/myBlog.php">Bài viết của tôi</a></li>
            <li><a href="../blogComment/blogComment.html">Đóng góp & ý kiến</a></li>
        </ul>
        <?php while ($row = $kq->fetch_assoc()) {?>
            <div id="content">
                    <img class="content__avt" src="user2.svg" alt="user2">
                    <p><strong>Tên bài viết: <?php echo $row["POST_NAME"]; ?><br>Tác giả: <?php echo $row["FIRSTNAME"]." ".$row["LASTNAME"]; ?> <br>Ngày đăng bài: <?php echo $row["TIME"]; ?></strong></p><br>
                    <?php
                        /* echo "<script>alert(".str_word_count($cnt).")</script>" */
                        if(str_word_count($row["CONTENT"]) > 100) {
                            $cnt = substr($row["CONTENT"], 0, 900);
                            echo "<p>".$cnt."..."."</p>";
                        }
                        else {
                            echo "<p>".$row["CONTENT"]."</p>";
                        }
                    ?>
                    <a href="../PKT-Blog/PKT-Blog.php?id=<?php echo $row["ID_POSTS"]; ?>"> Xem bài viết</a>
                </div>
        <?php } ?>
    </main>
    <script src="../logout.js"></script>
</body>

</html>