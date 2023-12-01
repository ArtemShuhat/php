function verify(f) {
  if (f.login.value == "") {
    //alert("Введите логин!");
    document.getElementById("massage").innerHTML = "Введите логин!";
    return false;
  }
  var pass = f.pass.value;
  if (pass == "") {
    //alert("Введите логин!");
    document.getElementById("massage").innerHTML = "Введите пароль!";
    return false;
  }
  var reg = /^\w{3,8}$/;
  if (!reg.test(pass)) {
    document.getElementById("massage").innerHTML = "Введите правильный пароль!";
    return false;
  }
  return true;
}
