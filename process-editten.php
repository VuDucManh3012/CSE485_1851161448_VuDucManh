<?php
$errors = array();
$email = $_POST['email'];
$newname = $_POST['newname'];

require("config.php");
// B2: Khai bao truy van
$sql = "SELECT * FROM users WHERE email = '$email' AND status = 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $conn = new mysqli('localhost', 'root', '', 'btl');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE `users` SET `tendaidien` = '$newname' WHERE  email = '$email' AND status = 1";

    if ($conn->query($sql) === TRUE) {
        header("location:editten-successfully.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
    exit();
} else { ?><script>
        alert("Lỗi hệ thống.");
    </script>
<?php
}
?>