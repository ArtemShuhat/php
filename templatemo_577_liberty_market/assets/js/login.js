const formOpenBtn = document.querySelector("#form-open"),
  home = document.querySelector(".login"),
  formContainer = document.querySelector(".form_container"),
  formCloseBtn = document.querySelector(".form_close"),
  loginBtn = document.querySelector("#login"),
  pwShowHide = document.querySelectorAll(".pw_hide"),
  loginNow = document.querySelector(".login-now"),
  loginForm = document.querySelector('.login_form'),
  loginButton = loginForm.querySelector('.login-now'),
  usernameInput = loginForm.querySelector('#username'),
  passwordInput = loginForm.querySelector('#password');

formOpenBtn.addEventListener("click", (event) => {
  event.preventDefault();
  document.body.classList.add("modal-open");
  home.classList.add("show");
  document.body.style.overflow = "hidden";
});

formCloseBtn.addEventListener("click", () => {
  document.body.classList.remove("modal-open");
  home.classList.remove("show");
  document.body.style.overflow = "visible";
});

pwShowHide.forEach((icon) => {
  icon.addEventListener("click", () => {
    let getPwInput = icon.parentElement.querySelector("input");
    if (getPwInput.type === "password") {
      getPwInput.type = "text";
      icon.classList.replace("uil-eye-slash", "uil-eye");
    } else {
      getPwInput.type = "password";
      icon.classList.replace("uil-eye", "uil-eye-slash");
    }
  });
});


loginBtn.addEventListener("click", (e) => {
  e.preventDefault();
  formContainer.classList.remove("active");
});

loginNow.addEventListener("click", () => {
  let name = document.querySelector(".login_form input[type='Name']").value;
  let password = document.querySelector(".login_form input[type='password']").value;
  let rememberMe = document.querySelector(".login_form input[type='checkbox']").checked;
  if (rememberMe) {
    setCookie("name", name, 7);
    setCookie("password", password, 7);
  }
  alert("You are logged in as " + name);
});

document.addEventListener("click", (e) => {
  if (!formContainer.contains(e.target) && !formOpenBtn.contains(e.target)) {
    document.body.classList.remove("modal-open");
    home.classList.remove("show");
    document.body.style.overflow = "visible";
  }
});