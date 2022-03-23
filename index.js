const loginForm = document.getElementById("login-form");
const loginButton = document.getElementById("login-form-submit");
const loginErrorMsg = document.getElementById("login-error-msg");
const createAccountButton = document.getElementById("create-account-button");

createAccountButton.addEventListener("click", (e) => {
    e.preventDefault();
    window.location.href = "createaccount.html";
})
