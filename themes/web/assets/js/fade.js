class Fade {
  constructor(items, delay) {
    this.items = items;
    this.delay = delay || 25;
  }

  fadeIn(el) {
    let opacity = 0;
    const timer = setInterval(() => {
      if (opacity < 1) {
        el.style.opacity = opacity;
        opacity += 0.1;
      } else {
        clearInterval(timer);
      }
    }, this.delay);
  }

  checkFades() {
    this.items.forEach((el) => {
      const wHeight = parseInt(0.75 * window.innerHeight, 10);
      if (wHeight >= el.getBoundingClientRect().top) {
        if (el.style.opacity === "0") {
          this.fadeIn(el);
        }
      }
    })
  }

  init() {
    if (this.items.length) {
      this.items.forEach((el) => {
        el.style.opacity = 0;
      })
      this.checkFades();
    }
    return this;
  }
}

const fadeInScroll = document.querySelectorAll(".fadeInScroll");
const fade = new Fade(fadeInScroll);
fade.init();

window.addEventListener("scroll", () => {
  let timer;
  if (timer) clearTimeout(timer);
  timer = setTimeout(() => {
    fade.checkFades();
    timer = null;
  }, 200);
})
