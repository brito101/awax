const cookieButton = document.querySelectorAll("#cookieConsent [data-action]");

function fadeOut(el) {
  let opacity = 1;
  const timer = setInterval(() => {
    if (opacity > 0) {
      el.style.opacity = opacity
      opacity -= 0.1;
    } else {
      clearInterval(timer);
      el.remove();
    }
  }, 25);
}

if (cookieButton) {
  cookieButton.forEach((el) => {
    el.addEventListener("click", (e) => {
      e.preventDefault();
      fetch(el.dataset.action, {
        method: "POST",
        body: new URLSearchParams({
          cookie: el.dataset.cookie,
        }),
      })
        .then((res) => res.json())
        .then((res) => {
          fadeOut(el.parentElement)
          if (res.gtmHead) {
            document
              .querySelector("head")
              .insertAdjacentHTML("beforeend", res.gtmHead);
          }
          if (res.gtmBody) {
            document
              .querySelector("body")
              .insertAdjacentHTML("afterbegin", res.gtmBody);
          }
        });
    });
  });
}