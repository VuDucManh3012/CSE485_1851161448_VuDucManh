<?php

    $first_name = $_POST['txtFirstName'];
    $last_name = $_POST['txtLastName'];
    $email = $_POST['txtEmail'];
    $password1 = $_POST['txtPassword1'];
    $password2 = $_POST['txtPassword2'];
        require("config.php");
        // B2: Khai bao truy van
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
        // B3: Kiem tra ban ghi co ton tai
        if(mysqli_num_rows($result)>0){?><script>alert("Người dùng email đã tồn tại");</script><?php
        }else{
            $hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);
            $activation_code = substr(md5(uniqid(rand(), true)), 16, 16);
            $sql = "INSERT INTO users (first_name, last_name, email, password, registration_date, activation_code) 
                    VALUES ('$first_name', '$last_name', '$email', '$hashed_passcode', NOW(), '$activation_code')";
            if(mysqli_query($conn, $sql)){
                require_once "contact.php";
                $m = new sendMail();

                $to = $email;
                $tieudethu = "[CSE TLU] Please verify your email address";           
                $noidungthu = "Bạn đã đăng kí tài khoản tại FORUM CSE TLU, để sử dụng tài khoản, vui lòng nhấp vào liên kết
                sau đây: <a href='http://localhost/k60ht/BTL/active.php?code=".$activation_code."'>Click Here</a>";
                
                //dùng mail test, đừng dùng mail chính thức
                $from = "manhdeptraivodich@gmail.com";
            
                //pass email gmail
                $p = "12302000"; //thay_mat_khau_cua_ban_vao_day
                $m -> sendMailFromLocalhost($to, $from, $tennguoigui="CSE TLU", $tieudethu, $noidungthu, $from, $p, $error);
                header("Location: register-page-successfully.php");
                exit();
            }else{?><script>alert("Kiểm tra lại câu truy vấn");</script><?php
            }
        }
    
?>