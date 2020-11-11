<?php

$urls = array (
    'Home'             => './index.php',
    'Air Conditioning' => './services.php#',
    'Heating'          => './services.php#',
    'Maintenance'      => './services.php#',
    'Services'         => './services.php',
    'Careers'          => './careers.php',
    'About Us'         => './about-us.php',
    'Contact'          => './contact.php'
);

echo <<< _END
<!DOCTYPE html>
<html lang=en>
<head>
    <title>$title | CompAir</title>
    <link rel="icon" href="images/favicon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/contact-form.css">
    <meta charset="UTF-8">
</head>
<body>
    <header id="main-header">
        <div class="container">
            <!--<h1>CompAir</h1>-->
            <div class="left">
                <a href="index.php"><img src="images/logo.svg" alt="CompAir"></a>
                <h2>HVAC Installation <br> Maintenance & Repair</h2>
            </div>
            <div class="right">
                <h3>Call Us: <i style="font-weight: 100;">(305) 555-1247</i></h3>
            </div>
        </div>
    </header>

    <nav id="navbar">
        <div class="container">
            <ul>\n
_END;



foreach ($urls as $topic => $url) {
    $current = ($title == $topic) ? ' class="active"' : '';
    echo <<< _END
                    <li><a href="$url"$current>$topic</a></li>\n
    _END;
}

echo <<< _END
            </ul>
        </div>
    </nav>\n\n
_END;
?>