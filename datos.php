<?php


$url = $_POST["url"];

$contadorContenido = 0;
listarArchivos($url);

function listarArchivos( $path ){
    $contadorContenido = 0;
    $dir = opendir($path);
    $files = array();
    while ($elemento = readdir($dir)){
        if($contadorContenido % 4 == 0){
            echo "</div>
            <div class=\"row\">";
        }
        if( $elemento != "." && $elemento != ".."){
            if( is_dir($elemento) ){
                //listarArchivos( $path.$elemento.'/' );
                carpeta($path.$elemento);
                echo "hola mundo";
            }else{
                ejecutable($elemento);
            }
        }
        $contadorContenido = $contadorContenido + 1;
    }
}

function ejecutable($nombreArchivo){
    
    echo "
    <div class=\"card col-sm\" style=\"width: 300px; height: 80px; margin:10px;\">
        <div class=\"card-body w-100\">
            <p class=\"w-auto\">".$nombreArchivo."</p>
        </div>
    </div>";
}

function carpeta($nombreArchivo){
    echo "
    <div class=\"card col-sm container\" style=\"width: 300px; height: 80px; margin:10px;\" id=\"carpeta\">
        <div class=\"card-body w-100 row\">
            <div class=\"col-sm\">
              <i class=\"material-icons\">
                folder
              </i>
            </div>
            <div class=\"col-sm\">
              folder
            </div>
            <div class=\"col-sm\">
              <a href=\"\" onclick=\"alert('$nombreArchivo')\">
                  <i class=\"material-icons\">
                    ".$nombreArchivo."
                  </i>
              </a>
            </div>
        </div>
    </div>";
}

/*function file(){

}

function video(){

}

function imagen(){

}*/



?>