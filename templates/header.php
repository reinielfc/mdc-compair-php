<head>
    <link rel="icon" href="images/favicon.svg">
    <link rel="stylesheet" href="styles.css">
    <title><?php echo ($title) ?> | CompAir</title>
    <?php
    echo "\n<style>\n" . $add_styles . "\n</style>\n"
    ?>
</head>

<body>
    <nav>
        <div id="title">
            <a href="index.php"><img src="images/logo.svg" alt="CompAir Logo"></a>
            <h2> HVAC Installation <br> Maintenance & Repair</h2>
        </div>
        <ul>
            <?php
            $urls = array(
                'Home'             => './index.php',
                'Air Conditioning' => './services.php#',
                'Heating'          => './services.php#',
                'Maintenance'      => './services.php#',
                'Services'         => './services.php',
                'Careers'          => './careers.php',
                'About Us'         => './about-us.php',
                'Contact'          => './contact.php'
            );

            echo "\n";
            foreach ($urls as $name => $url) {
                echo '<li><a ' . 'href="' . $url . '"' .
                    (($title === $name) ? ' class="current" ' : ' ') .
                    '>' . $name . "</a></li>\n";
            }
            ?>
        </ul>
    </nav>