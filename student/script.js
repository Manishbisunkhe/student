function switchForm() {
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");
    const switchText = document.getElementById("switchText");

    if (loginForm.style.display === "none") {
        loginForm.style.display = "block";
        registerForm.style.display = "none";
        switchText.innerHTML = "Don't have an account? <a href='#' onclick='switchForm()'>Register here</a>";
    } else {
        loginForm.style.display = "none";
        registerForm.style.display = "block";
        switchText.innerHTML = "Already have an account? <a href='#' onclick='switchForm()'>Login here</a>";
    }
}

function login() {
    const username = document.getElementById("loginUsername").value;
    const password = document.getElementById("loginPassword").value;
    const errorMsg = document.getElementById("errorMsg");

    // Clear previous error message
    errorMsg.innerHTML = "";

    // AJAX request to the backend
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            errorMsg.innerHTML = xhr.responseText;
        }
    };

    xhr.open("POST", "backend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("action=login&username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password));
}

function register() {
    const username = document.getElementById("registerUsername").value;
    const password = document.getElementById("registerPassword").value;
    const errorMsg = document.getElementById("errorMsg");

    // Clear previous error message
    errorMsg.innerHTML = "";

    // AJAX request to the backend
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            errorMsg.innerHTML = xhr.responseText;
        }
    };

    xhr.open("POST", "backend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("action=register&username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password));
}
