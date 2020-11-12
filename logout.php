<?php
session_start();

if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){
    unset($_SESSION['username']);
    ?><script>alert("Bạn đã đăng xuất thành công.") ;</script> <?php
    header("location:diendan.php");
}

?>