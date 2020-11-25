<?php

$urls = array (
    'Home'             => './index.php',
    'Air Conditioning' => './services.php#ac-repair-services',
    'Heating'          => './services.php#heating-repair',
    'Maintenance'      => './services.php#hvac-maintenance',
    'Schedule'         => './schedule-form.php',
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
    <link rel="icon" href="img/favicon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/contact-form.css">
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
                <table>
                    <tr>
                        <td style="text-align: right; font-weight: bold;">Call Us:</td>
                        <td style="text-align: left;">(305) 555-1247</td>
                    </tr>
                    <tr>
                        <td style="text-align: right; font-weight: bold;">Email Us:</td>
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

foreach ($urls as $topic => $url) {
    $current = ($title == $topic) ? ' class="active"' : '';
    echo "\t\t\t\t<li><a href=\"$url\"$current>$topic</a></li>\n";
}

echo <<< _END
            </ul>
        </div>
    </nav>\n\n
_END;

?>