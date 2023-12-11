const topBoxes = document.querySelector("#shift-top");
const bottomBoxes = document.querySelector("#shift-bottom");
const popular = document.querySelector(".popular");
let stopScrollValue;

if (window.innerWidth >= 1600) {
  stopScrollValue = 2620;
} else if (window.innerWidth >= 1250) {
  stopScrollValue = 2580;
} else if (window.innerWidth >= 950) {
  stopScrollValue = 2480;
}
window.addEventListener("scroll", () => {
  const scrollY = window.scrollY;

  if (scrollY > 1600 && scrollY < stopScrollValue) {
    if (window.innerWidth < 800) {
      topBoxes.style.transform = `translateX(0px)`;
      bottomBoxes.style.transform = `translateX(0px)`;
    } else {
      const shiftValue = (scrollY - 1600) / 2;
      topBoxes.style.transform = `translateX(${shiftValue}px)`;
      bottomBoxes.style.transform = `translateX(-${shiftValue}px)`;
      if (shiftValue == 150) {
        topBoxes.style.transform = `translateX(150px)`;
        bottomBoxes.style.transform = `translateX(-150px)`;
      }
    }
  }
});
