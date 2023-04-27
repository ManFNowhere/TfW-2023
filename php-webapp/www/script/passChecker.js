var password = document.getElementById("password"),
    confPassword = document.getElementById("confPassword");

function validatePassword() {
    if (password.value != confPassword.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;