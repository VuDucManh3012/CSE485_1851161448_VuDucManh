<?php

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    if ($_POST["fileToUpload"] == NULL) {
        $uploadOk = 1;
    } else {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
?>
            <script>
                alert(" File Không phải 1 bức ảnh.");
            </script>
    <?php
            $uploadOk = 0;
        }
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 104857600 ) {
    ?>
    <script>
        alert("File cần có dung lượng < 100MB.");
    </script>
    <?php
    $uploadOk = 0;
}

// Allow certain file formats
if ($_POST["fileToUpload"] == NULL) {
    $uploadOk = 1;
} else {
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    ?>
        <script>
            alert("Chỉ sử dụng file JPG, JPEG, PNG & GIF.");
        </script>
    <?php
        $uploadOk = 0;
    }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $img = $_FILES["fileToUpload"]["name"];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $userpost = $_POST['userpost'];
    require("posts_connect.php");
    $sql = "INSERT INTO `post1` ( `title` , `content` , `img` , `userpost` )  VALUES ('$title' , '$content' , '$img' , '$userpost' )";
    if ($conn->query($sql) === TRUE) {
        header("location:diendan.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }

    $conn->close();
}
?>