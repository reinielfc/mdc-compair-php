<?php
$title = 'Careers';
require_once './templates/header.php';

echo <<< _END
    <div class="main container">
        <section id="main">
            <div id="main-heading">
                <h1>$title</h1>
            </div>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae ipsa optio
            omnis hic et accusantium praesentium neque facere fugit vero. Autem vero molestiae
            quibusdam, quod unde deleniti laboriosam veniam tempore!</p>
        </section>
_END;

require_once './templates/aside.php';

echo "\t</div>";

require_once './templates/footer.php';
