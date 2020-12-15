<?php
$header = <<< _END
<!DOCTYPE html>
<html lang=en>
<head>
    <title>$title | CompAir</title>
    <link rel="icon" href="img/favicon.svg">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <td style="text-align: right;">Give us a call:</td>
                        <td style="text-align: left;"><i>(305) 555-1247</i></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">Email Us:</td>
                        <td style="text-align: left;"><a href="mailto:contact@compair.com">contact@compair.com</a></td>
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

    <script>
        function setCurrentPageToActive() {
            var navLinks = document.getElementsByClassName('nav-link');
            var curLink = window.location.href;

            for (let i = 0; i < navLinks.length; i++) {
                var element = navLinks.item(i);
                var elementClass = element.getAttribute('class');
                if (element.href == curLink) {
                    element.setAttribute('class', elementClass + " active");
                } else {
                    elementClass = elementClass.replace(" active", "");
                    element.setAttribute('class', elementClass)
                }
            }
        }

        window.addEventListener('locationchange', setCurrentPageToActive());
        window.addEventListener('hashchange', setCurrentPageToActive, false);
    </script>
    </nav>
_END;
?>
