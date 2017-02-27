<?php
$file="read.txt";
$filewrite="write.txt"; //smenqme razshirenieto na php posle
$requiredLines=10003; // 10003 заради това че пършите три реда не ни трябват

$filesize = filesize($file);

$fileHandle = fopen($file, "r"); //otvarqne na faila ot koito daa chetem

$filewriteHandle = fopen($filewrite, "w"); //otvarqme faila v koito she zapisvame

$linecount=0; 
//cikulcheto s koeto da vzemem purvite 10000 reda ili 10003 v nashiq sluchai
    while (!feof($fileHandle) && $linecount++<$requiredLines) { 

        $line = stream_get_line($fileHandle, $filesize, "\n"); //chetem celiqt fail kato 1 red ako faila e na 1 red

        fwrite($filewriteHandle,$line . "\n"); //zapisvame v faila kato vsicko pravim na nov red
    }

//zatvarqme i dvata faila
    fclose($fileHandle);
    fclose($filewriteHandle);

?>