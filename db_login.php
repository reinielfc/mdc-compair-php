<?php

function openCon() {
    $hn = 'localhost';
    $un = 'root';
    $pw = 'mysql';
    $db = 'compair';

    $conn = new mysqli($hn, $un, $pw, $db);

    return $conn;
}


function closeCon($conn) {
    $conn->close();
}


?>