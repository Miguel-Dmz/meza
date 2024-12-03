window.onload = function() {
    if (typeof aviso !== 'undefined' && aviso) {
        mostrarModal();
    }
    else if (typeof aviso2 !== 'undefined' && aviso2) {
        mostrarModal2();
    }
};

function mostrarModal() {
    document.getElementById("modal").style.display = "block";
}

function cerrarModal() {
    document.getElementById("modal").style.display = "none";
}

function mostrarModal2() {
    document.getElementById("modal2").style.display = "block";
}

function cerrarModal2() {
    document.getElementById("modal2").style.display = "none";
}