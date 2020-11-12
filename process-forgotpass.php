<!doctype html>
<html lang="en">

<head>
    <title>Quên mật khẩu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    $email = $_POST['txtEmail'];
    require("config.php");
    // B2: Khai bao truy van
    $sql = "SELECT activation_code FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        if($row = $result->fetch_assoc()) {
            $activation_code = $row["activation_code"];
            require_once "contact.php";
            $m = new sendMail();

            $to = $email;
            $tieudethu = "[CSE TLU] Đặt lại mật khẩu";
            $noidungthu = "Để đặt lại mật khẩu, vui lòng nhấp vào liên kết 
            sau đây: <a href='http://localhost/k60ht/BTL/resetpass.php?code=" . $activation_code . "'>Click Here</a>";

            //dùng mail test, đừng dùng mail chính thức
            $from = "manhdeptraivodich@gmail.com";

            //pass email gmail
            $p = "12302000"; //thay_mat_khau_cua_ban_vao_day
            $m->sendMailFromLocalhost($to, $from, $tennguoigui = "CSE TLU", $tieudethu, $noidungthu, $from, $p, $error);
            header("Location: forgotpass-successfully.php");
            exit();
        } else { 
            echo "Lỗi 1";
            exit();
            }
    }else {
        echo "Lỗi 2";
        exit();
    }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>