"use strict";

let doReload = true;

const loadPhrase = () => {
  fetch("/phrase", { mode: "cors" })
      .then(res => res.json())
      .then(data => {
          const preamble = document.getElementById("preamble");
          if (preamble) preamble.textContent = data.preamble;

          const msg = document.getElementById("message")
          if (msg) msg.textContent = data.message;
      });
};

window.onblur = () => (doReload = false);
window.onfocus = () => (doReload = true);

document.addEventListener("DOMContentLoaded", () => {
  const reloadBtn = document.getElementById("reload");
  if (!reloadBtn) return;
  reloadBtn.addEventListener("click", () => loadPhrase());
});

(() => {
  setInterval(() => {
    if (doReload) loadPhrase();
  }, 5000);

  loadPhrase();
})();
