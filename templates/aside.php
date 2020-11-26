<?php

function printAsides(...$asides) {
    echo "\t\t<aside id=\"sidebar\">";

    foreach ($asides as $file) {
        require_once("./templates/" . $file);
    }

    echo"\t\t</aside>\n";
}

?>