const verifyButton = document.getElementById("verify");
const confirmButton = document.getElementById("confirm");

confirmButton.addEventListener("click", () => {
  const paymentMain = document.querySelector(".payment-main");
  const verifyPage = document.querySelector(".verify-page");
  paymentMain.classList.add("d-none");
  verifyPage.classList.add("d-flex");
  verifyPage.classList.remove("d-none");
});
verifyButton.addEventListener("click", () => {
  const paymentMain = document.querySelector(".payment-main");
  const verifyPage = document.querySelector(".verify-page");
  paymentMain.classList.remove("d-none");
  paymentMain.classList.add("d-flex");
  verifyPage.classList.remove("d-flex");
  verifyPage.classList.add("d-none");
});
