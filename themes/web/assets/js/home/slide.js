const buttons = document.querySelectorAll(".banner-buttons button");
const banners = document.querySelectorAll(".banner-content");

function fadeInSlide(el) {
  let opactiy = 0;
  const timer = setInterval(() => {
    if (opactiy < 1) {
      el.style.opacity = opactiy;
      opactiy += 0.1;
      el.style.display = "inline-block";
    } else {
      clearInterval(timer);
    }
  }, 50)
}

buttons.forEach((el, key) => {
  el.addEventListener("click", () => {
    buttons.forEach((element) => {
      element.classList.remove("active");
    });
    el.classList.add("active");
    banners.forEach((element) => {
      element.style.display = "none";
      element.style.opacity = "0";
    });
    fadeInSlide(banners[key]);
  });
})

let flag = 1;
setInterval(() => {
  buttons[flag].click();
  flag++;
  if (flag === 3) {
    flag = 0;
  }
}, 5000);
