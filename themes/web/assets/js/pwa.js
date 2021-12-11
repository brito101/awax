if ("serviceWorker" in navigator) {
  navigator.serviceWorker
    .register("/sw.js", { scope: "./" })
    .then((registration) => {
      console.log("Service worker registrado com sucesso:", registration);
    })
    .catch((error) => {
      console.log("Service worker falhou ao registrar:", error);
    });
} else {
  console.log("Service workers não é suportado pelo navegador!");
}
