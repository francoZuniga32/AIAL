<?php


$url = $_POST["url"];
$directorio = opendir($url); //ruta actual

$contadorContenido = 0;

echo "<div class=\"row bg-secondary\">".$url;
//obtenemos un archivo y luego otro sucesivamente
while ($archivo = readdir($directorio)){
    cargar($archivo, $url);

}

function listarArchivos( $path ){
    $dir = opendir($path);
    $files = array();
    while ($elemento = readdir($dir)){
        if($contadorContenido % 4 == 0){
            echo "</div>";
            echo "<div class=\"row bg-secondary\">";
        }

        if( $elemento != "." && $elemento != ".."){
        
            if( is_dir($path.$elemento) ){
                //listarArchivos( $path.$elemento.'/' );
                echo "<br>";
                carpeta($path.$elemento);
            }
            else{
                $files[] = $elemento;
            }
        }
    }
    echo $path;
    for($i=0; $i<count( $files ); $i++){
        ejecutable($files[$i]);
    }

    $contadorContenido = $contadorContenido + 1;
}


function ejecutable($nombreArchivo){
    echo "
    <div class=\"card col w-25\">
        <div class=\"card-body\">
            ".$nombreArchivo."
        </div>
    </div>";
}

function carpeta($nombreArchivo){
    echo "
    <div class=\"card col w-25\">
        <div class=\"card-body\">meterContenido
            <button type=\"button\ class=\"btn btn-light\" onclick=\"\">".$nombreArchivo."</button>
        </div>
    </div>";
}
?>