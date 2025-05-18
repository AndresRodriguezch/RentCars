document.getElementById("txtTelefono").addEventListener("input", function (e) {
    const valor = e.target.value;

    if (valor.length > 15) {
        e.target.value = valor.slice(0, 15);
    }
});

function btn_password() {
    let input = document.getElementById("input-password");
    return input.type == "password"
        ? (input.type = "text")
        : (input.type = "password");
}

function bloquearEspacios(e) {
    if (e.key === " " && !teclaPermitida(e)) {
        e.preventDefault();
    }
}

function bloquearCaracteresEspeciales(e) {
    const tecla = e.key;
    const regex = /^[a-zA-Z0-9]*$/;
    if (!regex.test(tecla) && !teclaPermitida(e)) {
        e.preventDefault();
    }
}

function soloNumeros(e) {
    const tecla = e.key;
    if (!/^[0-9]$/.test(tecla) && !teclaPermitida(e)) {
        e.preventDefault();
    }
}

function soloLetras(e) {
    const tecla = e.key;
    const regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]$/;
    if (!regex.test(tecla) && !teclaPermitida(e)) {
        e.preventDefault();
    }
}

function teclaPermitida(e) {
    const teclasPermitidas = [
        "Backspace",
        "Delete",
        "ArrowLeft",
        "ArrowRight",
        "Tab",
    ];
    return teclasPermitidas.includes(e.key);
}
