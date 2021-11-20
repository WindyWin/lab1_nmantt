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
    $sql = "SELECT TB_POSTS.POST_NAME, TB_POSTS.TIME, TB_POSTS.CONTENT, TB_POSTS.ID_POSTS FROM TB_POSTS WHERE TB_POSTS.ID_USER = $id_u";
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
    <div class="background" id="background" onclick="createForm()"></div>
    <div class="container" id="container">

        <form action="myBlog.php" id="AddBlog" method="POST">
            <button id="exit">X</button>
            <h1>WRITE YOUR BLOG</h1>
            <label for="BlogName">Your blog name:</label><br>
            <input type="text" id="blogName" name="blogName"><br>
            <label for="yourContent">Your content:</label><br>
            <textarea name="yourContent" id="yourContent" cols="30" rows="10"></textarea><br>
            <input type="submit" value="Post" name="submit">
            <?php
                if (isset($_POST["submit"])) {
                    $id = $_SESSION['ID'];
                    $title = $_POST['blogName'];
                    $content = $_POST['yourContent'];
                    $sql_insert_post = "INSERT INTO tb_posts(ID_POSTS, ID_USER, CONTENT, TIME, POST_NAME) VALUES ('autoid','$id','$content',now(),'$title')";
                    $kq_insert_post = $conn->query($sql_insert_post);
                    header("Location:myBlog.php");
                }
            ?>
        </form>
    </div>
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
                <a href="update.php?id=<?php echo $row["ID_POSTS"]; ?>" id="editButton">Chỉnh sửa</a>
                <a href="delete.php?id=<?php echo $row["ID_POSTS"]; ?>" id="deleteButton">Xóa</a>
            </div>
        </div>
        <?php } ?>
        <input type="button" value="Thêm bài viết" id="buttonOutside">
    </section>

    <!-- <script>
        function removeContent() {
            var elem = document.getElementById('contentBox');
            elem.parentNode.removeChild(elem);
        }

        function editContent() {
            document.getElementById('content').contentEditable = 'true';
        }
    </script> -->
    <script>
        const newBlog = document.getElementById("container");
        const exit = document.getElementById("exit");
        const blog = document.getElementById("buttonOutside");
        const background = document.getElementById("background");

        function removeContent() {
            var elem = document.getElementById('contentBox');
            elem.parentNode.removeChild(elem);
        }
        blog.onclick = createForm;
        exit.onclick = createForm;

        function createForm() {
            background.classList.toggle("background-opacity");
            newBlog.classList.toggle("overlay-form");
        }
    </script>
    <script src="../logout.js"></script>
</body>

</html>