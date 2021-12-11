function typeWrite(e) {
  const textoArray = e.innerHTML.split("");
  e.innerHTML = " ";
  textoArray.forEach((l, i) => {
    setTimeout(() => {
      e.innerHTML += l;
    }, 80 * i);
  })
}

const phrase = document.querySelector(".headline");

if (phrase) {
  typeWrite(phrase);
}
