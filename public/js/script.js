document.getElementById("show-password").addEventListener("click", function () {
    var passwordInput = document.querySelector("input[name='password']");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
});
