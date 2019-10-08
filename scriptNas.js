function cargarDatos() {
    raiz = "media/";
    meterContenido(raiz);
}

function cargarCarpeta(url) {
    console.log(url);
    meterContenido(url);
}

function cargarImagen($img){
    $("#imagenes").modal("show");
    document.getElementById("imagenModal").setAttribute("src",$img);
    document.getElementById("imagenDescarga").setAttribute("download",$img);
}

function cargarVideos($video, $formato){
    $("#videos").modal("show");
    $videosInsertar = "<source src=\""+$video+"\" type=\"video/"+$formato+"\" ></source>";
    $("#videoModal").html($videosInsertar);
    document.getElementById("videoDescarga").setAttribute("download",$video);
}

function cargarfile($file){
    $("#files").modal("show");
    document.getElementById("fileModal").setAttribute("src", $file);
    document.getElementById("fileDescarga").setAttribute("download",$file);
}