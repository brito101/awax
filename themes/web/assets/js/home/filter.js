const filter = document.querySelectorAll(".filter li");
const galery = document.querySelectorAll(".galery div");

filter.forEach((item) => {
  item.addEventListener("click", () => {
    galery.forEach((el) => {
      el.style.opacity = "0.1";
      el.style.transition = ".3s";
      if (el.dataset.category === item.dataset.category) {
        el.style.opacity = "1";
      }
      if (item.dataset.category === "general") {
        el.style.opacity = "1";
      }
    })
  })
})
