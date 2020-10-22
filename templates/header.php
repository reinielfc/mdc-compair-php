<head>
    <link rel="icon" href="images/favicon.svg">
    <link rel="stylesheet" href="styles.css">
    <title><?php echo($title) ?> | CompAir</title>
</head>

<body>
    <nav>
        <div id="title">
            <a href="index.html"><img src="images/logo.svg" alt="CompAir Logo"></a>
            <h2> HVAC Installation <br> Maintenance & Repair</h2>
        </div>
        <ul>
            <?php
                $urls = array(
                    'Home' => './index.php',
                    'Air Conditioning' => '#',
                    'Heating' => '#',
                    'Maintenance' => '#',
                    'Services' => './services.html',
                    'Careers' => './careers.html',
                    'About Us' => './about-us.html',
                    'Contact' => './contact.html'
                );

                foreach ($urls as $name => $url) {
                    echo '<li ' . (($title === $name) ? ' class="current" ' : '') .
                        '><a href="'.$url.'">'.$name.'</a></li>';
                }
            ?>
        </ul>
    </nav>