function validasi() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  if (username != "" && password != "") {
    return true;
  } else {
    alert("Username dan Password Wajib Diisi :V");
    return false;
  }
}
