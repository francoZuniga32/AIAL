<?php

$url = $_POST['url'];

echo "
<nav aria-label=\"breadcrumb\">
    <ol class=\"breadcrumb\">
        <li class=\"breadcrumb-item active\" aria-current=\"page\">".$url."</li>
    </ol>
</nav>";


if($url != "media/"){
    $back = accederFicheroAnterior($url);
    botonBack($back);
}

listarArchivos( $url );

function listarArchivos( $url ){
    $directorioRaiz = opendir($url);
    $archivo = array();
    $contadorContenido = 0;
    while ($elemento = readdir($directorioRaiz)){
        if( $elemento != "." && $elemento != ".."){
            //cargamos los archivos
            if( is_dir($url.$elemento) ){
                if($contadorContenido % 3 == 0){
                    echo "</div>
                    <div class=\"row justify-content-start\">";
                }
                carpeta($elemento, $path); 
                //incrementamos la variable
                $contadorContenido = $contadorContenido + 1;
            }
            else{
                $archivo[] = $elemento;
            }
        }
    }
    echo "</div><hr/>";

    for($i=0; $i<count( $archivo ); $i++){
        if($i % 3 == 0){
            echo "</div>
            <div class=\"row justify-content-start\">";
        }
        ejecutable($archivo[$i], $url);
    }
    echo "<BR>";
}

function accederFicheroAnterior($url){
    $control = true;
    $url = substr($url, 0, -1);
    $i = strlen($url);

    while($i >= 0 && $control){
        if(substr($url,-1) == "/"){
            $control = false;
        }else{
            $url = substr($url, 0, $i);
            $i = $i - 1;
        }
    }
    return $url;
}

function botonBack($url){
    echo "
    <button type=\"button\" class=\"btn btn-light\" onclick=\"cargarCarpeta('".$url."');\">
        <i class=\"material-icons\">
            arrow_back
        </i>
    </button>
    ";
}

function ejecutable($nombreArchivo, $url){

    $info = new SplFileInfo($nombreArchivo);
    $formato = $info->getExtension();

    switch ($formato) {
        //imagenes
        case 'png':
            imagenes($url, $nombreArchivo, $formato);
        break;
        case 'jpg':
            imagenes($url, $nombreArchivo, $formato);
        break;
        case 'jpeg':
            imagenes($url, $nombreArchivo, $formato);
        break;
        case 'GIF':
            imagenes($url, $nombreArchivo, $formato);
        break;
        //videos
        case 'mp4':
            video($url, $nombreArchivo, $formato);
        break;
        case 'WebM':
            video($url, $nombreArchivo, $formato);
        break;
        case 'VP8':
            video($url, $nombreArchivo, $formato);
        break; 
        case 'Vorbis':
            video($url, $nombreArchivo, $formato);
        break;
        //comprimidos
        case 'zip':
            comprimido($url, $nombreArchivo, $formato);
        break;
        //documetos
        case 'pdf':
            pdf($url, $nombreArchivo, $formato);
        break;
        case 'rar':
            comprimido($url, $nombreArchivo, $formato);
        break;
        default:
            files($url, $nombreArchivo, $formato);
        break;
    }
}

function carpeta($nombreArchivo, $path){
    echo "
    <div class=\"card col-sm container\" style=\"margin:10px;\" ondblclick=\"cargarCarpeta('".$path.$nombreArchivo."/');\">
        <div class=\"card-body w-100 row align-items-center\">
            <div class=\"col-sm\" style=\"width: 80px; padding: 0%;\">
              <i class=\"material-icons\">
                folder_open
              </i>
            </div>
            <div class=\"col-sm texto\" >
                ".$nombreArchivo."
            </div>
            <div class=\"col-sm\">
              <button href=\"\" onclick=\"\">
                  <i class=\"material-icons\">
                    more_vert
                  </i>
              </button>
            </div>
        </div>
    </div>";
}

function imagenes($url, $imagen, $formato){
    echo "
    <div class=\"card col-sm container\" style=\"margin:10px;\" ondblclick=\"cargarImagen('".$url.$imagen."');\" touchstart=\"cargarImagen('".$url.$imagen."');\">
        <div class=\"card-body w-100 row align-items-center\">
            <div class=\"col-sm\" style=\"width: 80px; padding: 0%;\">
              <i class=\"material-icons\">
                image
              </i>
            </div>
            <div class=\"col-sm texto\" >
                ".$imagen."
            </div>
            <div class=\"col-sm\">
                <div class=\"dropdown\">
                    <button class=\"\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <i class=\"material-icons\">
                            more_vert
                        </i>
                    </button>
                    <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
                        <a class=\"dropdown-item\" href=\"".$url.$imagen."\" download=\"".$url.$imagen."\">
                            <i class=\"material-icons\">
                            save_alt
                            </i>Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
}

function comprimido($url, $imagen, $formato){
    echo "
    <div class=\"card col-sm container\" style=\"margin:10px;\" ondblclick=\"cargarImagen('".$url.$imagen."');\" touchstart=\"cargarImagen('".$url.$imagen."');\">
        <div class=\"card-body w-100 row align-items-center\">
            <div class=\"col-sm\" style=\"width: 80px; padding: 0%;\">
              <i class=\"material-icons\">
                folder
              </i>
            </div>
            <div class=\"col-sm texto\" >
                ".$imagen."
            </div>
            <div class=\"col-sm\">
                <div class=\"dropdown\">
                    <button class=\"\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <i class=\"material-icons\">
                            more_vert
                        </i>
                    </button>
                    <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
                        <a class=\"dropdown-item\" href=\"".$url.$imagen."/\" download=\"".$url.$imagen."\">
                            <i class=\"material-icons\">
                            save_alt
                            </i>Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
}

function video($url, $imagen, $formato){
    echo "
    <div class=\"card col-sm container\" style=\"margin:10px;\" ondblclick=\"cargarVideos('".$url.$imagen."', '".$formato."');\" touchstart=\"cargarVideos('".$url.$imagen."', '".$formato."');\">
        <div class=\"card-body w-100 row align-items-center\">
            <div class=\"col-sm\" style=\"width: 80px; padding: 0%;\">
              <i class=\"material-icons\">
                movie
              </i>
            </div>
            <div class=\"col-sm texto\" >
                ".$imagen."
            </div>
            <div class=\"col-sm\">
                <div class=\"dropdown\">
                    <button class=\"\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <i class=\"material-icons\">
                            more_vert
                        </i>
                    </button>
                    <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
                        <a class=\"dropdown-item\" href=\"".$url.$imagen."/\" download=\"".$url.$imagen."\">
                            <i class=\"material-icons\">
                            save_alt
                            </i>Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
}

function pdf($url, $imagen, $formato){
    echo "
    <div class=\"card col-sm container\" style=\"margin:10px;\" ondblclick=\"cargarfile('".$url.$imagen."');\">
        <div class=\"card-body w-100 row align-items-center\">
            <div class=\"col-sm\" style=\"width: 80px; padding: 0%;\">
              <i class=\"material-icons\">
                 picture_as_pdf
              </i>
            </div>
            <div class=\"col-sm texto\" >
                ".$imagen."
            </div>
            <div class=\"col-sm\">
                <div class=\"dropdown\">
                    <button class=\"\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <i class=\"material-icons\">
                            more_vert
                        </i>
                    </button>
                    <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
                        <a class=\"dropdown-item\" href=\"".$url.$imagen."\" download=\"".$url.$imagen."\">
                            <i class=\"material-icons\">
                            save_alt
                            </i>Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
}

function files($url, $imagen, $formato){
    echo "
    <div class=\"card col-sm container\" style=\"margin:10px;\" ondblclick=\"cargarfile('".$url.$imagen."');\">
        <div class=\"card-body w-100 row align-items-center\">
            <div class=\"col-sm\" style=\"width: 80px; padding: 0%;\">
              <i class=\"material-icons\">
              insert_drive_file
              </i>
            </div>
            <div class=\"col-sm texto\" >
                ".$imagen."
            </div>
            <div class=\"col-sm\">
                <div class=\"dropdown\">
                    <button class=\"\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <i class=\"material-icons\">
                            more_vert
                        </i>
                    </button>
                    <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
                        <a class=\"dropdown-item\" href=\"".$url.$imagen."\" download=\"".$url.$imagen."\">
                            <i class=\"material-icons\">
                            save_alt
                            </i>Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
}
?>
