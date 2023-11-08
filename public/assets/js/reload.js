"use strict";

let doReload = true;
let progressInterval;
let currentProgressWidth = 1;

/**
 * Fills the progress bar.
 *
 * @return {void}
 */
const fillBar = function(){
  const bar = document.getElementById("bar");
  if (!bar) return;

  clearInterval(progressInterval);

  bar.style.width = currentProgressWidth + "%";
  progressInterval = setInterval(() => {
    if (currentProgressWidth >= 100){
      clearInterval(progressInterval);
      currentProgressWidth = 1;
      bar.style.width = currentProgressWidth + "%";
      if (doReload) loadPhrase();
      return;
    }
    
    currentProgressWidth++;
    bar.style.width = currentProgressWidth + "%";
  }, 50);
};

/**
 * Loads the phrase from the server.
 * Needs to be hoisted.
 */
function loadPhrase(){
  fetch("/phrase", { mode: "cors" })
      .then(res => res.json())
      .then(data => {
          const preamble = document.getElementById("preamble");
          if (preamble) preamble.textContent = data.preamble;

          const msg = document.getElementById("message");
          if (msg) msg.textContent = data.message;

          fillBar();
      });
};

window.onblur = function(){
  doReload = false;
  clearInterval(progressInterval);
};

window.onfocus = function(){
  doReload = true;
  fillBar();
};

document.addEventListener("DOMContentLoaded", () => {
  const reloadBtn = document.getElementById("reload");
  if (!reloadBtn) return;

  reloadBtn.addEventListener("click", () => {
    currentProgressWidth = 1;
    loadPhrase();
  });
});

(() => loadPhrase())();
