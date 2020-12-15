<?php
$title = 'Home';
define('FILENAME', pathinfo(__FILE__, PATHINFO_FILENAME) . ".php");

require_once './templates/header.php';
require_once './templates/footer.php';

echo <<< _END
$header

    <div class="main container">
        <section id="main">
            <h1>Your form has been submitted successfully!</h1>
            <p>Redirecting Home in ... <span id="countdown">6</span> seconds</p>
        </section>

        <script>
            var seconds = 5;

            function countdown() {
                seconds = seconds - 1;
                if (seconds <= 0) {
                    window.location = "./index.php";
                } else {
                    document.getElementById("countdown").innerHTML = seconds;
                    window.setTimeout("countdown()", 1000);
                }
            }

            countdown();
        </script>
    </div>

$footer
_END;
?>
