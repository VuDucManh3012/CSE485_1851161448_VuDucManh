<?php
            require("posts_connect.php");
            $user = $_SESSION['username'];
            $noidung = $_POST['noidung']; 
            $idpost= $_POST['idpost'];
            $sql="INSERT INTO `comment`(`user`, `idpost`, `noidung`) VALUES ( '$user' , '$idpost' , '$noidung' )";
            if (mysqli_query($conn, $sql)) {
                header("location:diendan.php");
            } else {
                echo "<h2>Lỗi:</h2> " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
