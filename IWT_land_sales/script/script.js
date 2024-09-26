function showPassword() {
    var input = document.getElementById("password");
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}

function calAmmount(ev) {
    var days = document.getElementById('day').value;

    var ammount = days * 100;

    document.getElementById('ammount').value = ammount;
}

