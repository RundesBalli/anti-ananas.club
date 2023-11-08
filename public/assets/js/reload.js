"use strict";

let doReload = true;
let progressInterval;
let reloadInterval;

const fillBar = function(){
  const bar = document.getElementById("bar");
  if (!bar) return;

  clearInterval(progressInterval);

  let width = 1;
  progressInterval = setInterval(() => {
    if (width >= 100) {
      clearInterval(progressInterval);
    } else {
      width++;
      bar.style.width = width + "%";
    }
  }, 50);
};

const loadPhrase = function(){
  fetch("/phrase", { mode: "cors" })
      .then(res => res.json())
      .then(data => {
          const preamble = document.getElementById("preamble");
          if (preamble) preamble.textContent = data.preamble;

          const msg = document.getElementById("message")
          if (msg) msg.textContent = data.message;

          fillBar();
      });
};

window.onblur = () => (doReload = false);
window.onfocus = () => (doReload = true);

document.addEventListener("DOMContentLoaded", () => {
  const reloadBtn = document.getElementById("reload");
  if (!reloadBtn) return;

  reloadBtn.addEventListener("click", () => {
    loadPhrase();
  });
});

(() => {
  reloadInterval = setInterval(() => {
    if (doReload) loadPhrase();
  }, 5000);

  loadPhrase();
})();
