document.getElementById("link-registrarse").addEventListener("click", mostrarRegister);
document.getElementById("link-iniciar-sesion").addEventListener("click", mostrarLogin);

function mostrarLogin() {
    document.getElementById("formulario-login").style.display = "flex";
    document.getElementById("formulario-register").style.display = "none";
}

function mostrarRegister() {
    document.getElementById("formulario-login").style.display = "none";
    document.getElementById("formulario-register").style.display = "flex";
}