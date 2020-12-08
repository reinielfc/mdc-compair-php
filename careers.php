<?php
$title = 'Careers';
require_once './templates/header.php';

echo <<< _END
    <div class="main container">
        <section id="main">
            <div id="main-heading">
                <h1>$title</h1>
            </div>
            <p></p>To ensure customer satisfaction in our delivery of quality results, we need
            a team of skilled and dedicated professionals. If you are interested in a career
            with CompAir, please review our available positions:</p>
        </section>
_END;

require_once './templates/aside.php';
printAsides('aside-schedule-form.php', 'aside-dummy.php');

echo "\t</div>";

require_once './templates/footer.php';
