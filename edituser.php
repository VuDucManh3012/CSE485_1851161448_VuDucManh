<!doctype html>
<html lang="en">
  <head>
    <title>Chỉnh sửa User</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
<?php
include ('connect.php');
$userid=$_GET['userid'];
$query=mysqli_query($conn,"select * from `users` where `userid`='$userid'");
$row=mysqli_fetch_array($query);
?>
    <div class="container">
    <div class="heading">
        <h3><p class="text-center">Sửa thông tin User</p></h3> 
        <hr>
    </div>

    <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 text-center">
    
        
    </div>
    </div>
    <div class="row">  
            <div class="col-xs-12 col-sm-6 col-md-6">
            <form action="" method="POST" autocomplete="off">
                    <h6>First Name</h6>      
                    <input type="text" name="first_name" class="form-control" value="<?= $row['first_name'] ;?>" >
                    <br>        
                    <h6>Last Name</h6>      
                    <input type="text" name="last_name"  class="form-control" value="<?= $row['last_name'] ;?>">
                    <br> 
                    <h6>Email</h6>                  
                    <input type="text" name="email" size="40" class="form-control" value="<?= $row['email'] ;?>">
                    <br>
                    <h6>Registration Date</h6>      
                    <input type="text" name="registration_date"  class="form-control" value="<?= $row['registration_date'] ;?>">
                    <br> 
                    <h6>Status</h6>  
                    <div class="form-check">
                       <?php if($row['status'] == 1){ ?>
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="" value="1" checked>Đã kích hoạt
                        <br>
                        <input type="radio" class="form-check-input" name="status" id="" value="0" >Chưa kích hoạt
                      </label><?php }else{?>
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="" value="1" >Đã kích hoạt
                        <br>
                        <input type="radio" class="form-check-input" name="status" id="" value="0" checked>Chưa kích hoạt
                        <?php } ?>
                    </div>   
                    <h6>Tên tài khoản</h6>      
                    <input type="text" name="tendaidien"  class="form-control" value="<?= $row['tendaidien'] ;?>" >
                    <br> 
                    <p class="text-center">
                    <input type="submit" value="Lưu lại" name="submit" class="btn btn-primary" >
                    <a class="btn btn-light" href="quanlyuser.php" role="button">Cancel</a>  
                    </p>
    </div>
      <?php
            if( isset($_POST['submit'])){
                  $first_name=$_POST['first_name'];
                  $last_name=$_POST['last_name'];
                  $email=$_POST['email'];
                  $registration_date=$_POST['registration_date'];
                  $status=$_POST['status'];
                  $tendaidien=$_POST['tendaidien'];
                  
            
                  $sql="UPDATE `users` SET `first_name`= '$first_name'  , `last_name`= '$last_name'  , `email`= '$email' , `registration_date`= '$registration_date'  
                  , `status` = '$status'  , `tendaidien` = '$tendaidien'  Where userid='$userid' ";
                  if ($conn->query($sql) === TRUE) {
                    $_SESSION['message']="Record has been update !";
                    $_SESSION['msg_type']="Success";
                    header("location:quanlyuser.php");
                  } else {
                    echo "Error deleting record: " . $conn->error;
                  }
                  }     
      ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
