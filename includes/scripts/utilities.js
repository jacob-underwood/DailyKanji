

function passwordReveal(elementId) {
    var passwordElement = document.getElementById(elementId);
    if (passwordElement.type === "password") {
        passwordElement.type = "text";
    } else {
        passwordElement.type = "password";
    }
}

// function post(url, key, data) {
//     fetch(url,
//         {
//             method: "POST",
//             body: JSON.stringify({
//                 [key]: data
//             }),
//             headers: {
//                 "Content-type": "application/json; charset=UTF-8"
//             }
//     }).then(response => console.log(response));
// }
