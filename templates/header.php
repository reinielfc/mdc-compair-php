<?php
$header = <<< _END
<!DOCTYPE html>
<html lang=en>

<head>
    <title>$title | CompAir</title>
    <link rel="icon" href="img/favicon.png">
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
                <p>Give us a call: <i>(305) 555-1247</i></p>
            </div>
        </div>
    </header>

    <nav id="navbar">
        <div class="container">
            <ul>
				<li><a class="nav-link hide-mobile" href="./index.php">Home</a></li>
				<li><a class="nav-link hide-mobile" href="./services.php#ac-repair-services">Air Conditioning</a></li>
				<li><a class="nav-link hide-mobile" href="./services.php#heating-repair">Heating</a></li>
				<li><a class="nav-link hide-mobile" href="./services.php#hvac-maintenance">Maintenance</a></li>
				<li><a class="nav-link" href="./services.php">Services</a></li>
				<li><a class="nav-link" href="./careers.php">Careers</a></li>
				<li><a class="nav-link" href="./about-us.php">About Us</a></li>
				<li><a class="nav-link" href="./contact.php">Contact</a></li>
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
