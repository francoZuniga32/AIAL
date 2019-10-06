<?php


$url = "/home/franco/Descargas/";

function listarArchivos( $path ){
    $dir = opendir($path);
    $files = array();
    while ($elemento = readdir($dir)){
        if( $elemento != "." && $elemento != ".."){
        
            if( is_dir($path.$elemento) ){
                //listarArchivos( $path.$elemento.'/' );
                echo "<br>";
                echo($path.$elemento);
            }
            else{
                $files[] = $elemento;
            }
        }
    }
    echo $path;
    for($x=0; $x<count( $files ); $x++){
        echo $files[$x].", ";
        echo "<BR>";
    }
    echo "<BR>";
}
    
    listarArchivos( $url );
    ?>
