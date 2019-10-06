function cargarDatos() {
    raiz = "/home/franco/Descargas/";
    meterContenido(raiz);
}

function cargarCarpeta(url) {
    console.log(url);
    meterContenido(url);
}

function cargarImagen($img){
    console.log($img);
    $("#modal").modal("show");
    $("#modal-body").html($img);
}