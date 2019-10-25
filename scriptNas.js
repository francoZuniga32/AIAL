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

function cargarAudio(audio){
    $("#audio").modal("show");
    espectro("spec", audio);
    document.getElementById("videoDescarga").setAttribute("download",$video);
}

function cargarfile($file){
    $("#files").modal("show");
    document.getElementById("fileModal").setAttribute("src", $file);
    document.getElementById("fileDescarga").setAttribute("download",$file);
}

function playMusic(){
    $("#btnPlay").css("display", "none");
    $("#btnPause").css("display", "block");
}
function pauseMusic(){
    $("#btnPlay").css("display", "block");
    $("#btnPause").css("display", "none");
}

function espectro(contenedor, media){
    var Spectrum = WaveSurfer.create({
        container: '#'+contenedor,
        progressColor: "#65EEB7",
        barWidth: 3,
        width: 300,
        height: 60,
        maxCanvasWidth: 300,
        responsive: true 
    });

    var buttons = {
        play: document.getElementById("btnPlay"),
        pause: document.getElementById("btnPause"),
        stop: document.getElementById("btnStop")
    };

    // Handle Play button
    buttons.play.addEventListener("click", function(){
            Spectrum.play();

            // Enable/Disable respectively buttons
        }, false);

        // Handle Pause button
        buttons.pause.addEventListener("click", function(){
            Spectrum.pause();

            // Enable/Disable respectively buttons
        }, false);


        // Handle Stop button
        /*buttons.stop.addEventListener("click", function(){
            Spectrum.stop();

            // Enable/Disable respectively buttons
            buttons.pause.disabled = true;
            buttons.play.disabled = false;
            buttons.stop.disabled = true;
        }, false);*/

    playFalco = true;
    Spectrum.on('ready', function () {
        playFalco = true;
    });

    Spectrum.load(media);
}