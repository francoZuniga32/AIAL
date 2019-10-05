<?php
$url = $_POST["url"];
echo $url;
$directorio = opendir($url); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        carpeta($archivo); //de ser un directorio lo envolvemos entre corchetes
    }else{
        //obtenemos la extencion
        $info = new SplFileInfo($archivo);
        $extencion = $info->getExtension();
        
        ejecutable($archivo);

        //dependiendo del tipo de archivo realizamos alguna accion:
        /*switch ($extencion) {
            case "txt":
                
            break;
            case "avi":
                echo $extencion. "<br />";
            break;
            
            default:
                # code...
                break;
        }*/
    }
}

function ejecutable($nombreArchivo){
    echo "
    <div class=\"card\">
        <div class=\"card-body\">
            ".$nombreArchivo."
        </div>
    </div>";
}

function carpeta($nombreArchivo){
    echo "
    <div class=\"card bg-secondary\">
        <div class=\"card-body\">
            ".$nombreArchivo."
        </div>
    </div>";
}
?>