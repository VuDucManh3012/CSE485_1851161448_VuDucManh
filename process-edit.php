<?php
$errors = array();
$email = $_POST['email'];
$password = $_POST['txtPassword'];

if (empty($errors)) {
    require("config.php");
    // B2: Khai bao truy van
    $sql = "SELECT * FROM users WHERE email = '$email' AND status = 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {

            $password1 = $_POST['txtPassword1'];
            $hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);
            require("config.php");
            $conn = new mysqli('localhost', 'root', '', 'btl');
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "UPDATE `users` SET `password` = '$hashed_passcode' WHERE  email = '$email' AND status = 1";

            if ($conn->query($sql) === TRUE) {
                header("location:editpass-successfully.php");
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                        $conn->close();
                        exit();
                    } else { ?><script>
                alert("Mật khẩu không chính xác.");
            </script><?php
                    }
                } else { ?><script>
            alert("Tài khoản không tồn tại hoặc chưa kích hoạt.");
        </script><?php
                }
            } else { ?><script>
        alert("Lỗi hệ thống.");
    </script><?php
            }
                ?>
<?php
function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>