const el = document.querySelectorAll("[data-go]")
if (el) {
  el.forEach((i) => {
    i.addEventListener("click", (e) => {
      e.preventDefault()
      window.scroll({
        top: document.querySelector(i.dataset.go).offsetTop,
        behavior: "smooth",
      })
    })
  })
}
