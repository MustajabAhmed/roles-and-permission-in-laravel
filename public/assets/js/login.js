const triggerLogin = document.getElementById("trigger-login");
const logIn = document.querySelector(".login-form-active");
const loginLost1 = document.querySelector(".login-normal-form");
const loginLost2 = document.querySelector(".login-bottom");

function trigger() {
  logIn.classList.add("d-flex");
  loginLost1.classList.remove("d-flex");
  loginLost2.classList.remove("d-flex");
}