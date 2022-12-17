

function passwordReveal() {
    var passwordElement = document.getElementById("submitted-password");
    if (passwordElement.type === "password") {
        passwordElement.type = "text";
    } else {
        passwordElement.type = "password";
    }
}