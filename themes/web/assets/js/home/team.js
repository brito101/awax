const team = document.querySelectorAll(".team-worker");
const pointerTeam = document.querySelectorAll(".pointer-team");

function showTeam(ix) {
  team.forEach((el, i) => {
    el.classList.remove("active");
    el.style.opacity = "0";
    el.style.transition = ".3s";
    if (i >= ix * 3 && i < ix + 3) {
      el.classList.add("active");
      el.style.opacity = "1";
    }
  });
}

pointerTeam.forEach((el, i) => {
  el.addEventListener("click", () => {
    pointerTeam.forEach((item) => {
      item.classList.remove("active");
    });
    el.classList.add("active");
    showTeam(i);
  });
});
