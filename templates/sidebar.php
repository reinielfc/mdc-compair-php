<?php

function getSidebar(...$asides) {
    $sidebar = "<aside id=\"sidebar\">";

    foreach ($asides as $file) {
        require_once("./templates/asides/" . $file);
        $sidebar .= "\n" . $aside . "\n";
    }

    $aside = null;
    return $sidebar . "\t\t</aside>";

}

?>