<!doctype html>
<html lang="en">

<head>
    <title>Diễn Đàn CSE TLU</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <style>
        .new ::-webkit-scrollbar {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylediendan.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="header_logo">
                <h1>
                    <a href="diendan.php">
                        <img src="img/logo.jpg" alt="">
                    </a>
                </h1>
            </div>
        </header>
    </div>
    <div class="container-fruid col-sm-12">
        <hr>
        <div class="row">
            <?php
            session_start();
            if (!isset($_SESSION['username'])) { ?>
                <div class="navbar col-sm-2">
                    <div class="list-group" id="myP" style="position:fixed">
                        <a href="login.php" class="list-group-item list-group-item-action">Login</a>
                        <a href="register.php" class="list-group-item list-group-item-action">Register</a>
                        <a href="forgotpass.php" class="list-group-item list-group-item-action">Forgot Password?</a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="navbar col-sm-2">
                    <div class="list-group" id="myP" style="position:fixed">
                        <div class="welcome list-group-item" style="text-align:center;background-color: #fff; color: #003478; ;">
                            <h3>Welcome</h3>
                            <?php
                            $email = $_SESSION['username'];
                            require("posts_connect.php");
                            $result = mysqli_query($conn, "SELECT * FROM users where `email`= '$email' ");
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<b><h4>" . $row['tendaidien'] . "</h4></b>";
                            }
                            ?>
                        </div>
                        <a href="thongtinuser.php" class="list-group-item list-group-item-action">Tài khoản</a>
                        <a href="logout.php" class="list-group-item list-group-item-action">Đăng xuất</a>
                    </div>
                </div>
            <?php } ?>
            <div class="main col-sm-6">
                <h3>BẢNG TIN</h3>
                <?php include "posts_add.php" ?>
                <h4 style="text-align: center;">Chủ đề</h4>
                <form class="chude col-md-12 d-flex justify-content-around" action="diendan.php" method="GET">
                   <button type="button" class="btn btn-primary col-md-5" style="background-color: #003478;"><a href="diendanhoctap.php" style="color:#fff;font-size:18px;font-weight:500;">Học Tập</a></button>
                   <button type="button" class="btn btn-primary col-md-5" style="background-color: #003478;"><a href="diendanhocduong.php" style="color:#fff;font-size:18px;font-weight:500;">Học Đường</a></button>
                </form>
                <br>
                <?php include "bangtin.php" ?>
            </div>

            <div class="new col-sm-4" style="position:fixed;right:0px;overflow:auto;">
                <h3>TIN TỨC</h3>
                <?php include "news.php" ?>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>