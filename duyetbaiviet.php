<!doctype html>
<html lang="en">

<head>
    <title>Duyệt bài viết</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="col-md-3" style="float: left;position:fixed" >
        <a class="btn btn-success" href="quanlyuser.php">Quản lý user</a>
        <a class="btn btn-success" href="diendan.php">Diễn đàn</a>
    </div>
    <div class="container col-md-6">
        <h2 style="text-align: center;">Duyệt Bài</h2>
        <?php
        require("connect.php");
        $result = mysqli_query($conn, "SELECT * FROM `post1` ORDER BY `id` DESC ");
        while ($row = mysqli_fetch_array($result)) {
            if ($row['img'] == NULL) {
                echo " <div style='border:1px #f0f2f5 solid;border-radius:10px;background-color:#ededed;'> ";
                echo " <div class=' d-flex'> ";
                $email = $row['userpost'];
                require("posts_connect.php");
                $result2 = mysqli_query($conn, "SELECT * FROM users where `email`= '$email' ");
                while ($row2 = mysqli_fetch_array($result2)) {
                    echo "<a href='thongtinuser.php'><img src='img/" . $row2['anhdaidien'] . "' class='rounded-circle' style='border:1px #f0f2f5 solid;width:50px;height:50px;margin:10px;'></a> ";
                    echo "<a href='thongtinuser.php' style='height:24px;text-decoration-color: #000;' ><h5 style='color:#000;margin-top:10px;'>" . $row2['tendaidien'] . "</h5></a>";
                }
                echo " </div> ";
                echo "<div style='margin-left:15px'>";
                echo  $row['content'];
                echo "<br>";
                echo "</div>";
                echo "<br>";
                echo "<div> 
                            <a class='btn btn-primary' href='duyetbaiviet2.php?id=" .$row['id']. "' role='button'>Duyệt bài</a>
                            <a class='btn btn-primary' href='deletepost.php?id=" .$row['id']. "' role='button'>Xóa bài</a>
                     </div> ";
                echo "<div style='margin:15px;text-align:right;'>Tạo vào : " . $row['created-at'] . "</div>";
                echo "</div>";
                echo "<br>";

            } else {
                echo " <div style='border:1px #f0f2f5 solid;border-radius:10px;background-color:#ededed;'> ";
                echo " <div class=' d-flex'> ";
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
                echo "<img src='upload/" . $row['img'] . "' style='margin:auto ;margin-top:20px;margin-bottom:20px;width: 100%;height: 420px;'>";
                echo "<br>";
                echo "<div >
                        <a class='btn btn-primary' href='duyetbaiviet2.php?id=" .$row['id']. "' role='button'>Duyệt bài</a>
                        <a class='btn btn-primary' href='deletepost.php?id=" . $row['id'] . "' role='button'>Xóa bài</a>
                </div> ";
                echo "<div style='margin:15px;text-align:right;'>Tạo vào : " . $row['created-at'] . "</div>";
                echo "</div>";
                echo "<br>";

            }
        }
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>