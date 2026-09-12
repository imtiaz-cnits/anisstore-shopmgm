function showLoader() {
    let loader = document.getElementById('loader');
    if (loader) loader.classList.remove('d-none');
}
function hideLoader() {
    let loader = document.getElementById('loader');
    if (loader) loader.classList.add('d-none');
}

function successToast(msg) {
    Toastify({
        gravity: "bottom", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
            background: "green",
        }
    }).showToast();
}

function errorToast(msg) {
    Toastify({
        gravity: "bottom", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
            background: "red",
        }
    }).showToast();
}

let logoutTimer; // Variable to store the logout timer

function startLogoutTimer() {
    // Clear existing timer, if any
    if (logoutTimer) {
        clearTimeout(logoutTimer);
    }
    // Start a new timer for 24 hours (86,400,000 milliseconds)
    logoutTimer = setTimeout(logout, 43200000); // 6 hours in milliseconds
}

function resetLogoutTimer() {
    // Restart the logout timer
    startLogoutTimer();
}


function logout() {
    localStorage.clear();
    sessionStorage.clear();
    window.location.href = "/nexus-login-page";
}

function unauthorized(code){
    if(code===401){
        localStorage.clear();
        sessionStorage.clear();

        window.location.href="/nexus-login-page"
    }
}

function setToken(token){
    localStorage.setItem("token",`Bearer ${token}`)
}

function getToken(){
    return  localStorage.getItem("token")
}

function HeaderToken() {
    let token = getToken();
    // Start or reset the logout timer whenever the token is used
    startLogoutTimer();
    return {
        headers: {
            Authorization: token
        }
    }
}
function HeaderTokenWithBlob() {
    let token = getToken();
    // Start or reset the logout timer whenever the token is used
    startLogoutTimer();
    return {
        responseType: 'blob',
        headers: {
            Authorization: token
        }
    }
}

document.addEventListener("mousemove", resetLogoutTimer);
document.addEventListener("keypress", resetLogoutTimer);

if (typeof axios !== 'undefined') {
    axios.interceptors.response.use(
        response => response,
        error => {
            if (error.response && error.response.status === 401) {
                unauthorized(401);
            }
            return Promise.reject(error);
        }
    );
}

// Auto-open browser date picker on click/tap/focus for all date inputs across the app
function setupGlobalDatePickerTrigger() {
    document.addEventListener("click", function (e) {
        let el = e.target;
        if (el && el.tagName === "INPUT" && el.type === "date") {
            try {
                if (typeof el.showPicker === "function") {
                    el.showPicker();
                }
            } catch (err) {}
        }
    }, true);

    document.addEventListener("focusin", function (e) {
        let el = e.target;
        if (el && el.tagName === "INPUT" && el.type === "date") {
            try {
                if (typeof el.showPicker === "function") {
                    el.showPicker();
                }
            } catch (err) {}
        }
    }, true);
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", setupGlobalDatePickerTrigger);
} else {
    setupGlobalDatePickerTrigger();
}
