let loadPhrase = () => {
  fetch(`/phrase`, { mode: "cors" })
      .then(res => res.json())
      .then(data => {
          document.getElementById("preamble").textContent = data.preamble;
          document.getElementById("message").textContent = data.message;
      });
}

let doReload = true;

window.onblur = () => (doReload = false);
window.onfocus = () => (doReload = true);

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("reload").addEventListener("click", (e) => {
    loadPhrase();
  });
});

setInterval(() => {
  if (doReload) loadPhrase();
}, 5000);
