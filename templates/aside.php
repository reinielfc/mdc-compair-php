<?php

function printAsides(...$asides) {
    echo "\n\n\t\t<aside id=\"sidebar\">";

    foreach ($asides as $file) {
        require_once("./templates/" . $file);
    }

    echo"\n\t\t</aside>\n";
}

?>