<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .bangtin {
            max-height: 100%;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        require("posts_connect.php");
        $result = mysqli_query($conn, "SELECT * FROM post2 where `title`=2  ORDER BY `id` DESC");
        
        while ($row = mysqli_fetch_array($result)) {
        


                echo " <div style='border:1px #f0f2f5 solid;border-radius:10px;background-color:#ededed;' id='img'> ";
                echo " <div class=' d-flex'> ";
                echo $row['id'];
                $email = $row['userpost'];
                require("posts_connect.php");
                $result2 = mysqli_query($conn, "SELECT * FROM users where `email`= '$email' ");
                while ($row2 = mysqli_fetch_array($result2)) {
                    echo " <a href='thongtinuser.php'><img src='img/" . $row2['anhdaidien'] . "' class='rounded-circle' style='border:1px #f0f2f5 solid;width:50px;height:50px;margin:10px;'></a> ";
                    echo "<a href='thongtinuser.php' style='height:24px;text-decoration-color: #000;' ><h5 style='color:#000;margin-top:10px;'>" . $row2['tendaidien'] . "</h5></a>";
                }
                echo " </div> ";
                echo "<div style='margin-left:15px'>";
                echo  $row['content'];
                echo "<br>";
                echo "</div>";
                if ($row['img'] == null) {
                }else{
                    echo "<img src='upload/" . $row['img'] . "' style='margin:auto ;margin-top:20px;margin-bottom:20px;width: 100%;height: 420px;'>";
                }
                echo "<div style='margin:15px;text-align:right;'>Tạo vào : " . $row['created-at'] . "</div>";
                echo "<div class='container'><hr></div>";
                if (!isset($_SESSION['username'])) {
                    echo "<form class='col-md-12 d-flex'>";
                    echo "<a href='login.php'><img src='img/user.jpg' class='rounded-circle' style='border:1px #f0f2f5 solid;width:40px;height:40px;'></a> ";
                    echo "<input class='form-control' onclick='opencommentnologin()' style='margin-left:7px;' placeholder='Viết bình luận...' >";
                    echo "</form>";
                    echo "<br>";
                }else{
                    echo "<form class='col-md-12 d-flex' method='GET'>";
                    $email=$_SESSION['username'];
                    $result2 = mysqli_query($conn, "SELECT * FROM users where `email`= '$email' ");
                    while ($row2 = mysqli_fetch_array($result2)) {
                        echo " <a href='thongtinuser.php'><img src='img/" . $row2['anhdaidien'] . "' class='rounded-circle' style='border:1px #f0f2f5 solid;width:40px;height:40px;'></a> ";
                    }
                    echo"<input class='form-control' name='noidung' style='margin-left:7px;' placeholder='Viết bình luận...' >
                </form>";
                    echo "<br>";
                } 
                echo "<div>";
                $result3 = mysqli_query($conn, "SELECT * FROM `comment` ");
                while ($row3 = mysqli_fetch_array($result3)) {
                    $usercomment=$row3['user'];
                    $result4 = mysqli_query($conn, "SELECT * FROM users where `email`= '$usercomment' ");
                    while ($row4 = mysqli_fetch_array($result4)) {
                        echo " <div class='container d-flex'>
                                <a href='diendan.php'><img src='img/" . $row4['anhdaidien'] . "' class='rounded-circle' style='border:1px #f0f2f5 solid;width:40px;height:40px;'></a> 
                                    <div class='' style='margin-left:10px;border-radius:10px;background-color:#fff;width:100%'>
                                        <a href='thongtinuser.php' style='font-size:14px;text-decoration-color: #000;' ><p style='margin-left:10px;color:#000;margin-bottom: 0px;'>" . $row4['tendaidien'] . "</p></a>
                                        <p style='margin-left:10px'>".$row3['noidung']."</p>
                                    </div>
                                </div>
                                <br> ";
                            }
                }
                echo "</div> ";
                echo "</div>";
               
                echo "<br>";
            }
        
        if(isset($_GET['noidung'])){
            require("posts_connect.php");
            $user = $_SESSION['username'];
            $noidung = $_GET['noidung']; 
            $idpost = $_GET['idpost'];
            $sql="INSERT INTO `comment`(`user`, `idpost`, `noidung`) VALUES ( '$user' , '$idpost' , '$noidung' )";
            if (mysqli_query($conn, $sql)) {
                exit;
            } else {
                echo "<h2>Lỗi:</h2> " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }     
        
        ?>
    </div>
    <script>
     function opencommentnologin() {
            alert("Phải đăng nhập mới được bình luận bài viết !!!");
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>