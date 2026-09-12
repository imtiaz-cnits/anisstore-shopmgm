if (document.fullscreenEnabled || document.webkitFullscreenEnabled) {
  const toggleBtn = document.querySelector(".js-toggle-fullscreen-btn");

  if (toggleBtn) {
    toggleBtn.addEventListener("click", function () {
      if (document.fullscreen) {
        document.exitFullscreen();
      } else if (document.webkitFullscreenElement) {
        document.webkitCancelFullScreen();
      } else if (document.documentElement.requestFullscreen) {
        document.documentElement.requestFullscreen();
      } else {
        document.documentElement.webkitRequestFullScreen();
      }
    });

    document.addEventListener("fullscreenchange", handleFullscreen);
    document.addEventListener("webkitfullscreenchange", handleFullscreen);

    function handleFullscreen() {
      if (!toggleBtn) return;
      if (document.fullscreen || document.webkitFullscreenElement) {
        toggleBtn.classList.add("on");
        toggleBtn.setAttribute("aria-label", "Exit fullscreen mode");
      } else {
        toggleBtn.classList.remove("on");
        toggleBtn.setAttribute("aria-label", "Enter fullscreen mode");
      }
    }
  }
}

// dark mode start
function toggle_light_mode() {
  var app = document.getElementsByTagName("BODY")[0];
  if (!app) return;
  if (localStorage.lightMode == "dark") {
    localStorage.lightMode = "light";
    app.setAttribute("light-mode", "light");
  } else {
    localStorage.lightMode = "dark";
    app.setAttribute("light-mode", "dark");
  }
}

window.addEventListener(
  "storage",
  function () {
    var app = document.getElementsByTagName("BODY")[0];
    if (!app) return;
    if (localStorage.lightMode == "dark") {
      app.setAttribute("light-mode", "dark");
    } else {
      app.setAttribute("light-mode", "light");
    }
  },
  false
);
