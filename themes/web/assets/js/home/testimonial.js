const itemsTestimonials = document.querySelectorAll(".testimonials-items div")
const buttonsTestimonials = document.querySelectorAll(
  ".testimonials-buttons button"
)

buttonsTestimonials.forEach((el, key) => {
  el.addEventListener("click", () => {
    buttonsTestimonials.forEach((element) => {
      element.classList.remove("active")
    })
    el.classList.add("active")
    itemsTestimonials.forEach((element) => {
      element.classList.remove("active")
    })
    itemsTestimonials[key].classList.add("active")
  })
})
