var acc = document.getElementsByClassName("accordion");
var accb = document.getElementsByClassName("accordion-box");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    var isActive = this.classList.contains("active");
    var icon = this.querySelector(".fa-plus");

    // Close all accordions and remove active class
    for (var j = 0; j < acc.length; j++) {
      acc[j].classList.remove("active");
      var panel = acc[j].nextElementSibling;
      panel.style.maxHeight = null;
      acc[j].parentElement.classList.remove("activeb");
      icon.classList.toggle("rotate-icon");
    }
    hNumber = panel.scrollHeight;
    hplus = hNumber + 750;
    if (!isActive) {
      this.classList.add("active");
      var panel = this.nextElementSibling;
      panel.style.maxHeight = hplus + "px";
      this.parentElement.classList.add("activeb");
    }
  });
}
