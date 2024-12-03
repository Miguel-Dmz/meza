window.onload = function() {
    if (typeof aviso !== 'undefined' && aviso) {
        mostrarModal();
    }
};

function mostrarModal() {
    document.getElementById("modal").style.display = "block";
}

function cerrarModal() {
    document.getElementById("modal").style.display = "none";
}