<?php

function openConn() {
    $hn = 'localhost';
    $un = 'root';
    $pw = 'mysql';
    $db = 'compair';

    $conn = new mysqli($hn, $un, $pw, $db);

    return $conn;
}


function closeConn($conn) {
    $conn->close();
}


?>