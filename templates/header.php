<?php

echo <<< _END
<!DOCTYPE html>
<html lang=en>
<head>
    <title>$title | CompAir</title>
    <link rel="icon" href="img/favicon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <meta charset="UTF-8">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
</head>
<body>
    <header id="main-header">
        <div class="container">
            <div class="left">
                <a href="index.php"><img src="img/logo.svg" alt="CompAir"></a>
                <h2>HVAC Installation<br>Maintenance & Repair</h2>
            </div>
            <div class="right">
                <table style="font-weight: bold;">
                    <tr>
                        <td style="text-align: right;">Call Us:</td>
                        <td style="text-align: left;"><i>(305) 555-1247</i></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">Email Us:</td>
                        <td style="text-align: left;"><a href="mailto: contact@compair.com">contact@compair.com</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </header>

    <nav id="navbar">
        <div class="container">
            <ul>\n
_END;


$links = array(
    'Home'             => './index.php',
    'Air Conditioning' => './services.php#ac-repair-services',
    'Heating'          => './services.php#heating-repair',
    'Maintenance'      => './services.php#hvac-maintenance',
    'Services'         => './services.php',
    'Careers'          => './careers.php',
    'About Us'         => './about-us.php',
    'Contact'          => './contact.php'
);

foreach ($links as $link => $url) {
    echo "\t\t\t\t<li><a class=\"nav-link\" href=\"$url\">$link</a></li>\n";
}

echo <<< _END
            </ul>
        </div>
    </nav>

    <script type="module">
        import {setCurrentPageToActive} from './js/utils.js';
        setCurrentPageToActive();
    </script>\n\n
_END;

?>