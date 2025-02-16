//javascript utk tab navigation horizontal scroll buttons

const btnKiri = document.querySelector(".icon-panah-kiri");
const btnKanan = document.querySelector(".icon-panah-kanan");
const tabMenu = document.querySelector(".tab-menu");

const IconVisibility = () => {
  let scrollLeftValue = Math.ceil(tabMenu.scrollLeft);
  // console.log("1.", scrollLeftValue);
  let scrollableWidth = tabMenu.scrollWidth - tabMenu.clientWidth;
  // console.log("2.", scrollableWidth);
  btnKiri.style.display = scrollLeftValue > 0 ? "block" : "none";
  btnKanan.style.display = scrollableWidth > scrollLeftValue ? "block" : "none";
};

btnKanan.addEventListener("click", () => {
  tabMenu.scrollLeft += 227;
  // IconVisibility();
  setTimeout(() => IconVisibility(), 50);
});
btnKiri.addEventListener("click", () => {
  tabMenu.scrollLeft -= 227;
  // IconVisibility();
  setTimeout(() => IconVisibility(), 50);
});

window.onload = function () {
  btnKanan.style.display =
    tabMenu.scrollWidth > tabMenu.clientWidth ||
    tabMenu.scrollWidth >= window.innerWidth
      ? "block"
      : "none";
  btnLeft.style.display =
    tabMenu.scrollWidth >= window.innerWidth ? "" : "none";
};
window.onresize = function () {
  btnKanan.style.display =
    tabMenu.scrollWidth > tabMenu.clientWidth ||
    tabMenu.scrollWidth >= window.innerWidth
      ? "block"
      : "none";
  btnLeft.style.display =
    tabMenu.scrollWidth >= window.innerWidth ? "" : "none";

  let scrollLeftValue = Math.round(tabMenu.scrollLeft);

  btnKiri.style.display = scrollLeftValue > 0 ? "block" : "none";
};

// javascript utk tab navigation bisa di drag

let activeDrag = false;

tabMenu.addEventListener("mousemove", (drag) => {
  if (!activeDrag) return;
  tabMenu.scrollLeft -= drag.movementX;
  IconVisibility();
  tabMenu.classList.add("dragging");
});

document.addEventListener("mouseup", () => {
  activeDrag = false;
  tabMenu.classList.remove("dragging");
});

tabMenu.addEventListener("mousedown", () => {
  activeDrag = true;
});
