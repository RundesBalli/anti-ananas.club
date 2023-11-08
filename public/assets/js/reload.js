"use strict";

// With <3 from NullDev

/**
 * Loads a new phrase from the server and displays it on the page.
 * Handle the progress bar, interval and reload button.
 *
 * @class PhraseLoader
 */
class PhraseLoader {
  /**
   * Creates an instance of PhraseLoader.
   *
   * @memberof PhraseLoader
   */
  constructor(options = {}){
    const { duration } = options;
    const steps = Math.floor((duration ?? 5000) / 100);

    this.progressInterval = null;
    this.currentProgressWidth = 1;
    this.steps = steps;

    window.onblur = () => this.#clearProgressInterval();
    window.onfocus = () => this.fillBar();
  }

  /**
   * Clears the progress interval.
   *
   * @memberof PhraseLoader
   */
  #clearProgressInterval(){
    clearInterval(this.progressInterval ?? undefined);
  }

  /**
   * Fills the progress bar.
   *
   * @param {boolean} [reset=false] - Whether to reset the progress bar.
   * @return {void}
   * @memberof PhraseLoader
   */
  fillBar(reset = false){
    const bar = document.getElementById("bar");
    if (!bar) return;

    this.#clearProgressInterval();
    if (reset) this.currentProgressWidth = 1;

    bar.style.width = `${this.currentProgressWidth}%`;
    this.progressInterval = setInterval(() => {
      if (this.currentProgressWidth >= 100){
        this.#clearProgressInterval();
        this.currentProgressWidth = 1;
        bar.style.width = `${this.currentProgressWidth}%`;
        this.loadPhrase();
        return;
      }

      this.currentProgressWidth++;
      bar.style.width = `${this.currentProgressWidth}%`;
    }, this.steps);
  }

  /**
   * Loads a new phrase from the server and displays it on the page.
   *
   * @param {boolean} [reset=false] - Whether to reset the progress bar.
   * @param {boolean} [init=false] - Whether its the initial load without fetch.
   * @memberof PhraseLoader
   */
  loadPhrase(reset = false, init = false){
    if (init){
        this.fillBar(true);
        return;
    }

    fetch("/phrase", { mode: "cors" })
      .then(res => res.json())
      .then(data => {
        const preamble = document.getElementById("preamble");
        if (preamble) preamble.textContent = data.preamble;

        const msg = document.getElementById("message");
        if (msg) msg.textContent = data.message;

        this.fillBar(reset);
      });
  }

  /**
   * Initializes the phrase loader.
   *
   * @public
   * @memberof PhraseLoader
   */
  initialize(){
    const reloadBtn = document.getElementById("reload");
    if (reloadBtn) reloadBtn.addEventListener("click", () => this.loadPhrase(true));

    this.loadPhrase(false, true);
  }
}

(() => {
  // Duration is in milliseconds
  const phaseLoader = new PhraseLoader({ duration: 5000 });
  document.addEventListener("DOMContentLoaded", () => phaseLoader.initialize());
})();
