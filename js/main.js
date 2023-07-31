// Menu Icon
let menuIcon = document.querySelector(".menu-icon");
let closeIcon = document.querySelector(".menu .close");
let menu = document.querySelector(".menu");

menuIcon.onclick = function () {
  menu.classList.add("active");
};

closeIcon.onclick = function () {
  menu.classList.remove("active");
};
