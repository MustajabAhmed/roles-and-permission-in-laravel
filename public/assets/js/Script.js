function openTrigger() {
  const sideRight = document.querySelector(".side-right");
  const sideLeft = document.querySelector(".side-left");
  const sideMenu = document.querySelector(".m-navbar");
  const sideList = document.querySelector(".side-fix");
  const body = document.querySelector("body");
  body.style.position = "relative";
  sideRight.style.left = "50%";
  sideLeft.style.left = "0%";
  sideMenu.style.display = "flex";
  sideMenu.classList.toggle("m-navbar-sidebar");
  sideList.classList.remove("align-items-center");
  sideList.classList.add("align-items-start");
}
function closeTrigger() {
  const sideRight = document.querySelector(".side-right");
  const sideLeft = document.querySelector(".side-left");
  const sideMenu = document.querySelector(".m-navbar");
  const sideList = document.querySelector(".side-fix");
  const body = document.querySelector("body");
  body.style.position = "";
  sideRight.style.left = "150%";
  sideLeft.style.left = "-500%";
  sideMenu.style.display = "none";
  sideMenu.classList.remove("m-navbar-sidebar");
  sideList.classList.toggle("align-items-center");
  sideList.classList.remove("align-items-start");
}
document.addEventListener("click", function (event) {
  const sideRight = document.querySelector(".side-right");
  const sideLeft = document.querySelector(".side-left");
  const sideMenu = document.querySelector(".m-navbar");
  if (event.target === sideRight) {
    closeTrigger();
  }
});
document.addEventListener("DOMContentLoaded", function () {
  const customSelect = document.querySelector(".custom-select");
  const selectTrigger = customSelect.querySelector(".select-trigger");
  const optionsContainer = customSelect.querySelector(".options");
  const options = customSelect.querySelectorAll(".option");
  const iconLan = document.querySelector(".icon-lan");

  selectTrigger.addEventListener("click", function () {
    optionsContainer.style.display =
      optionsContainer.style.display === "block" ? "none" : "block";
  });

  options.forEach((option) => {
    option.addEventListener("click", function () {
      // iconLan'in src'sini alarak bir <img> öğesi oluştur
      const imgElement = document.createElement("img");
      imgElement.src = iconLan.src;
      imgElement.className = "selected-icon"; // İsteğe bağlı bir sınıf ekleyebilirsiniz

      // <img> öğesini seçenek metni ile birlikte yerine koy
      const selectedOptionText = option.textContent;
      selectTrigger.innerHTML = ""; // Önceki içeriği temizle
      selectTrigger.appendChild(imgElement);
      selectTrigger.insertAdjacentText("beforeend", selectedOptionText);

      optionsContainer.style.display = "none";
    });
  });

  // Close the options container when clicking outside
  document.addEventListener("click", function (event) {
    if (!customSelect.contains(event.target)) {
      optionsContainer.style.display = "none";
    }
  });
});
