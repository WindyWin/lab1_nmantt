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
        die("Kết nối CSDL thất bại".$conn->connect_error);
    }
    /* echo "Kết nối CSDL thành công"; */

    $sql = "SELECT TB_POSTS.POST_NAME, TB_POSTS.TIME, TB_POSTS.CONTENT, TB_USER.FIRSTNAME, TB_USER.LASTNAME, TB_POSTS.ID_POSTS FROM TB_POSTS, TB_USER WHERE TB_POSTS.ID_USER = TB_USER.ID_USER";
    $kq = $conn->query($sql);
    
?>
<?php
    function execute($sql) {
        $conn = mysqli_connect(host, host_user, host_password, database);
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
?>
<?php
    function executeResult($sql) {
        $conn = mysqli_connect(host, host_user, host_password, database);
        
        $resultset =  mysqli_query($conn, $sql);
        $list = [];
        while($row = mysqli_fetch_array($resultset, 1))
        mysqli_close($conn);
        return $list;
    }
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
        <a href="../logout.php"><input type="button" value="Đăng xuất" id="btn_logout" ></a>
        <img src="user1.svg" alt="user1" id="user1">
        <?php 
            echo "<strong id='username'>".$_SESSION["username"]."</strong>"; 
        ?> 
        <h1>UIBlog</h1>
    </header>
   
    <main>
    <form method="GET">
        <input type="text" name="content" class="form-control" placeholder="Tên bài viết">
        <button>Search</button>
    </form>
        <ul>
            <li> <strong><a href="./home-page.php">Trang chủ</a></strong></li>
            <li><a href="../myBlog/myBlog.php">Bài viết của tôi</a></li>
            <li><a href="../blogComment/blogComment.php">Đóng góp & ý kiến</a></li>
        </ul>
            <div id="content">
                <img class="content__avt" src="user2.svg" alt="user2">
            <?php
            if(isset($_GET["content"]) && $_GET["content"] =! '') {
                $sql = 'select * from tb_posts where POST_NAME like "%'.$_GET["content"].'%"';
            } else {
                $sql= 'select * from tb_posts';  
            }
            $inlist = executeResult($sql);

            foreach($inlist as $std) {
                echo '<p><strong>'Tên bài viết: .$std['POST_NAME'];
            </div>
    </main>
    <script src="../logout.js"></script>
</body>

</html>