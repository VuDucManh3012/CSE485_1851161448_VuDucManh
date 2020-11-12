<?php
require("connect.php");
$sql = "DELETE from `post1` WHERE  `id` = " . $_GET['id'];

if ($conn->query($sql) === TRUE) {
    header("location:duyetbaiviet.php");
} else {
    echo " <h2> Lỗi khi xóa bài : </h2> " . $conn->error;
}
$conn->close();
