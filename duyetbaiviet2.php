<?php
require("connect.php");
$result = mysqli_query($conn, "SELECT * FROM `post1` where `id`= " . $_GET['id']);
$row = mysqli_fetch_array($result);
$title = $row['title'];
$content = $row['content'];
$img = $row['img'];
$created_at = $row['created-at'];
$userpost = $row['userpost'];
$sql = "INSERT INTO `post2` ( `title` , `content` , `img` , `created-at` , `userpost` )  
        VALUES ('$title' , '$content' , '$img' , '$created_at' , '$userpost' )";
        if ($conn->query($sql) === TRUE) {
            $sql="DELETE from `post1` WHERE  `id` = " . $_GET['id'] ;

            if ($conn->query($sql) === TRUE) {
                header("location:duyetbaiviet.php");
            } else {
            echo " <h2> Lỗi khi xóa bài : </h2> " . $conn->error;
            }
            $conn->close();
        } else {
            echo "Lỗi : " . $conn->error;
        }
    
        $conn->close();
    
