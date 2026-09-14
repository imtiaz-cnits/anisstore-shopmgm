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
  var body = document.body;
  var html = document.documentElement;
  if (!body) return;
  var current = body.getAttribute("light-mode") || localStorage.getItem("lightMode") || "light";
  var newMode = (current === "dark") ? "light" : "dark";
  localStorage.setItem("lightMode", newMode);
  localStorage.setItem("layout-mode", newMode);
  body.setAttribute("light-mode", newMode);
  body.setAttribute("data-layout-mode", newMode);
  if (html) {
    html.setAttribute("light-mode", newMode);
    html.setAttribute("data-layout-mode", newMode);
    if (newMode === "dark") {
      html.classList.add("dark");
    } else {
      html.classList.remove("dark");
    }
  }
}

window.addEventListener(
  "storage",
  function () {
    var body = document.body;
    var html = document.documentElement;
    if (!body) return;
    var savedMode = localStorage.getItem("lightMode") || "light";
    body.setAttribute("light-mode", savedMode);
    body.setAttribute("data-layout-mode", savedMode);
    if (html) {
      html.setAttribute("light-mode", savedMode);
      html.setAttribute("data-layout-mode", savedMode);
      if (savedMode === "dark") {
        html.classList.add("dark");
      } else {
        html.classList.remove("dark");
      }
    }
  },
  false
);
