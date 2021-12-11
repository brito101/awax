const openButton = document.querySelector(".j_menu_mobile_open");
const closeButton = document.querySelector(".j_menu_mobile_close");
const menuMobile = document.querySelector(".j_menu_mobile_tab");

function animateOpen(el) {
  let position = 100;
  const timer = setInterval(() => {
    if (position > 70) {
      el.style.left = `${position}%`;
      position -= 5;
    } else {
      clearInterval(timer);
      el.style.left = "auto";
      el.style.right = "0";
    }
  }, 25);
}

function animateClose(el) {
  let position = 70;
  const timer = setInterval(() => {
    if (position <= 100) {
      el.style.left = `${position}%`
      position += 5;
    } else {
      clearInterval(timer);
      el.style.right = "auto";
      el.style.display = "none";
    }
  }, 25);
}

// mobile menu open
openButton.addEventListener("click", (e) => {
  e.preventDefault();
  animateOpen(menuMobile);
});

function closeMenu() {
  animateClose(menuMobile);
}

document.querySelector("body").addEventListener("touchstart", (e) => {
  e.preventDefault();
  const button = e.target.classList.contains("j_menu_mobile_open");
  const item = e.target.offsetParent.classList.contains("j_menu_mobile_tab");
  const drop = e.target.offsetParent.classList.contains("dropdown-menu");
  const link = e.target.classList.contains("link");
  if (!button && !item && !drop && !link) {
    if (menuMobile.style.left === "auto") {
      closeMenu();
    }
  }
});

// mobile menu close
closeButton.addEventListener("click", (e) => {
  e.preventDefault();
  closeMenu();
});