function validateForm() {
  var x = document.forms["myForm"]["txtEmail"].value;
  if (x == "" || x == null) {
    alert("Bạn cần nhập email");
    return false;
  }
  var y = document.forms["myForm"]["txtPassword"].value;
  if (y == "" || y == null) {
    alert("Bạn cần nhập Password");
    return false;
  }
}
function validateFormRegister() {
  var x = document.forms["myForm"]["txtFirstName"].value;
  if (x == "" || x == null) {
    alert("Bạn cần nhập First Name");
    return false;
  }
  var y = document.forms["myForm"]["txtLastName"].value;
  if (y == "" || y == null) {
    alert("Bạn cần nhập Last Name");
    return false;
  }
  var z = document.forms["myForm"]["txtEmail"].value;
  if (z == "" || z == null) {
    alert("Bạn cần nhập email");
    return false;
  }
  var g = document.forms["myForm"]["txtPassword1"].value;
  if (g == "" || g == null) {
    alert("Bạn cần nhập Password");
    return false;
  }
  var h = document.forms["myForm"]["txtPassword2"].value;
  if (h == "" || h == null) {
    alert("Bạn cần nhập Password Confirm");
    return false;
  }
  if (h !== g){
    alert("Xác nhận mật khẩu không đúng");
    return false;
  }
}

