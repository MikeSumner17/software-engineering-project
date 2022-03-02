const loginForm = document.getElementById("login-form");
const loginButton = document.getElementById("login-form-submit");
const loginErrorMsg = document.getElementById("login-error-msg");
const createAccountButton = document.getElementById("create-account-form");

loginButton.addEventListener("click", (e) => {
    e.preventDefault();
    const username = loginForm.username.value;
    const password = loginForm.password.value;

    if (username === "user" && password === "web_dev") {
        window.location.href = "main.html";
    } else {
        alert("Invalid username and/or password.");
    }
})

createAccountButton.addEventListener("click", e => {
    e.preventDefault();
})
