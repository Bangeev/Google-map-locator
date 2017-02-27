<?php

$readfile = "read.txt";
$writefile = "write.txt";
$rlines = 10;


// malka proverka
if(filemtime($readfile)>filemtime($writefile)){

    $filesize = filesize($readfile);

    //4etene
    $readfileHandle = fopen($readfile, "r");

    //zapis
    $writefileHandle = fopen($writefile, "w");

    $linecount=0;
    //cikulcheto
    while (!feof($readfileHandle) && $linecount++<$rlines) {
        //read one line
        $line = stream_get_line($readfileHandle, $filesize , "\n");
        //write the line
        fwrite($writefileHandle,$line);
    }
    //zatvarqne
    fclose($readfileHandle);
    fclose($writefileHandle);
}




?>