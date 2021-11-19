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
    $id_u = $_SESSION['ID'];
    $sql = "SELECT TB_POSTS.POST_NAME, TB_POSTS.TIME, TB_POSTS.CONTENT FROM TB_POSTS WHERE TB_POSTS.ID_USER = $id_u";
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
            <?php 
                echo "<strong id='username'>".$_SESSION["username"]."</strong>"; 
            ?> 
            <a href="../logout.php"><input type="button" value="Đăng xuất" id="btn_logout" ></a>
        </div>
    </header>
    <section>
        <ul>
            <li><a href="../home-page/home-page.php">Trang chủ</a></li>
            <li><strong><a href="./myBlog.php">Bài viết của tôi</a></strong></li>
            <li><a href="../blogComment/blogComment.php">Đóng góp & ý kiến</a></li>
        </ul>
        <?php while ($row = $kq->fetch_assoc()) { ?>
        <div id="contentBox">
            <div class="section_box">
                    <p id="content">
                        <strong>Tên bài biết: <?php echo $row["POST_NAME"]; ?> <br>
                            Ngày đăng bài: <?php echo $row["TIME"]; ?></strong> <br>
                        <?php echo $row["CONTENT"]; ?>
                    </p>
                
            </div>
            <div class="section__buttonInside">
                <input type="button" onclick="editContent()" value="Chỉnh sửa" id="editButton">
                <input type="button" onclick="removeContent()" value="Xóa" id="deleteButton">
            </div>
        </div>
        <?php } ?>
        <input type="button" value="Thêm bài viết" id="buttonOutside">
    </section>

    <script>
        function removeContent() {
            var elem = document.getElementById('contentBox');
            elem.parentNode.removeChild(elem);
        }
        function editContent() {
            document.getElementById('content').contentEditable='true';
        }
    </script>

    <script src="../logout.js"></script>
</body>

</html>