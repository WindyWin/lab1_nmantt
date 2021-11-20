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
?>

<?php 
    if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
        $id_delete = $_GET['id'];
        $sql_delete = "DELETE FROM TB_POSTS WHERE ID_POSTS = $id_delete";
        $kq_sql_delete = $conn->query($sql_delete);
    }
    else {
        echo "<script>alert('error')</script>";
    }
    header("Location:myBlog.php");
    $conn->close();
?>