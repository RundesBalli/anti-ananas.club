let doReload = true;

window.onblur = () => (doReload = false);
window.onfocus = () => (doReload = true);

window.onkeydown = e => {
  if (e.keyCode === 13) window.location.reload();
};

setInterval(() => {
  if (doReload) location.reload();
}, 5000);
