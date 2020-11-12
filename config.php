<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db   = 'btl';
    // B1: Ket noi DS
    $conn = mysqli_connect($host, $user, $pass, $db);
    if(!$conn){?><script>alert("Lỗi kết nối");</script><?php
    }

?>