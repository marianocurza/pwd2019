<?php
$file = 'curzadb-pdo.sqlite';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

header("Content-Disposition: attachment; filename=" . urlencode($file));    
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");             
header("Content-Length: " . filesize($file));
flush(); // this doesn't really matter.

$fp = fopen($file, "r"); 
while (!feof($fp))
{
    echo fread($fp, 65536); 
    flush(); // this is essential for large downloads
}  
fclose($fp); 
?>