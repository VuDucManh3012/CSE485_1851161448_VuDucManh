<?php
    if(isset($_GET['code'])){
        $code = $_GET['code'];
        require("config.php");
        // B2: Khai bao truy van:
        $sql = "SELECT * FROM users WHERE activation_code = '$code'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $sql = "UPDATE users SET status = 1 WHERE activation_code = '$code'";
            if(mysqli_query($conn,$sql)){
                ?><script>alert("Liên kết không tồn tại");</script><?php
                header("Location:register-page-successfully2.php");
                exit();
            }else{?><script>alert("Liên kết không tồn tại");</script><?php
            }
        }
    }

?>