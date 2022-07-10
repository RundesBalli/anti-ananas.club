let doReload = true;

window.onblur = () => (doReload = false);
window.onfocus = () => (doReload = true);

setInterval(() => {
  if (doReload) location.reload();
}, 5000);
