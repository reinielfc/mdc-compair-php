<?php

function printAsides(...$asides) {
    echo "\n\n\t\t<aside id=\"sidebar\">";

    foreach ($asides as $file) {
        echo "\n";
        require_once("./templates/" . $file);
        echo "\n";
    }

    echo"\t\t</aside>\n";
}

?>