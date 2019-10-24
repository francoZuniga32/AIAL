<?php
require_once("pclzip-2-8-2/pclzip.lib.php");
comprimir("media");

$zip = new PclZip('test.zip');
$zip->create('a.txt,b.txt');

function comprimir($url){
    $directorioRaiz = opendir($url);

    $zip = new PclZip($url);

    while ($elemento = readdir($directorioRaiz)){
        $zip->create($elemento);
    }
}

?>