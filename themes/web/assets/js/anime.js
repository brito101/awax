class SimpleAnime {
  constructor() {
    this.items = document.querySelectorAll("[data-anime]");
  }

  animateItems() {
    this.items.forEach((item) => {
      const time = Number(item.getAttribute("data-anime"));
      if (!Number.isNaN(time)) {
        setTimeout(() => {
          item.classList.add("anime");
        }, time);
      }
    });
  }

  handleVisibility() {
    if (typeof document.visibilityState !== "undefined") {
      if (document.visibilityState === "visible") {
        this.animateItems();
      }
    } else {
      this.animateItems();
    }
  }

  init() {
    this.handleVisibility = this.handleVisibility.bind(this);
    this.handleVisibility();
    document.addEventListener("visibilitychange", this.handleVisibility);
  }
}

const anime = new SimpleAnime();
anime.init();
