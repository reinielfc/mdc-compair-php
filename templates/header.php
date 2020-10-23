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
                    'Home'             => './index.php',
                    'Air Conditioning' => '#',
                    'Heating'          => '#',
                    'Maintenance'      => '#',
                    'Services'         => './services.php',
                    'Careers'          => './careers.php',
                    'About Us'         => './about-us.php',
                    'Contact'          => './contact.php'
                );

                echo "\n";
                foreach ($urls as $name => $url) {
                    echo '<li><a' . (($title === $name) ? ' class="current" ' : ' ') .
                        'href="' . $url . '">' . $name . "</a></li>\n";
                }
            ?>
        </ul>
    </nav>