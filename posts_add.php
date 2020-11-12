<!doctype html>
<html lang="en">

<head>
    <title>Thêm bài viết</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <style>
        .form-group button:hover {
            background-color: #d8d9dc;

        }
    </style>
    <link rel="stylesheet" href="css/stylediendan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-12">
            <div class="addposts">
                <div class="form-group">
                    <?php
                    if (isset($_SESSION['username'])) { ?>
                        <button type="textarea" class="form-control" name="txpost" id="txpost" onclick="openForm()" style="text-align: left;">Bạn đang nghĩ gì thế?</button>
                    <?php } else { ?>
                        <button type="textarea" class="form-control" name="txpost" id="txpost" onclick="openFormnologin()" style="text-align: left;">Bạn đang nghĩ gì thế?</button>
                    <?php } ?>
                </div>
                <hr>
                <div class="form-popup" id="myForm" style="z-index: 1;">
                    <div class="d-flex col-xs-12 col-sm-6 col-md-12" style="padding-right: 0px;">

                        <div class="col-xs-6 col-sm-3 col-md-8">
                            <h2 style="text-align:right;">Tạo bài viết</h2>
                        </div>

                        <div class="d-flex flex-row-reverse col-xs-6 col-sm-3 col-md-4 rounded-circle" style="padding-right: 0px;">
                            <button type="button" class="btn rounded-circle" onclick="closeForm()"><i class="fas fa-times-circle"></i></button>
                        </div>
                    </div>
                    <div class="container">
                        <hr>
                        <form name="addposts" action="posts_xuly.php" id="form-upload" method="POST" enctype="multipart/form-data">
                            <div>
                                <input type="text" name="userpost" class="form-control" style="display: none;" value="<?= $_SESSION['username']; ?>">

                                <label for="title">
                                    <h6>Loại nội dung :</h6>
                                </label>
                                <select name="title" id="title">
                                    <option value="1">Học Tập</option>
                                    <option value="2">Học Đường</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="content" id="content" rows="8" placeholder="Bạn đang nghĩ gì thế?"></textarea>
                            </div>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload">
                                <label class="custom-file-label" for="customFile"><img src="img/icon-anhface.png" width="24px" height="24px">Ảnh/Video</label>
                            </div>
                            <div class="form-groupsubmit">
                                <input name="submit" id="submit" class="btn btn-primary btn-block" type="submit" value="Đăng">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

        function openFormnologin() {
            alert("Phải đăng nhập mới được đăng bài viết !!!");
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>