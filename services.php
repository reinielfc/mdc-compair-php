<?php
$title = 'Services';
require_once './templates/header.php';

echo <<< _END
    <div class="main container">
        <section id="main">
            <div id="main-heading">
                <h1>$title</h1>
            </div>

            <h2 id="ac-repair-services">AC Repair Services</h2>
            <p>The worst thing that can happen during Florida's scorching hot summer days is
            for your AC to suddenly stop working. Here comes CompAir to the rescue! With our
            24/7 emmergency repair service, it's just a matter of giving us a call and one
            of our certified technicians will be there taking care of the problem in no time.</p>
            <button onclick="setProjectType('AC Repair')">Schedule an AC Repair</button>

            <h2 id="ac-installation">AC Installation</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae ipsa optio
            omnis hic et accusantium praesentium neque facere fugit vero. Autem vero molestiae
            quibusdam, quod unde deleniti laboriosam veniam tempore!</p>
            <button onclick="setProjectType('AC Installation')">Schedule an AC Installation</button>

            <h2 id="heating-repair">Heating Repair</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae ipsa optio
            omnis hic et accusantium praesentium neque facere fugit vero. Autem vero molestiae
            quibusdam, quod unde deleniti laboriosam veniam tempore!</p>
            <button onclick="setProjectType('Heating Unit Repair')">Schedule a Heating Unit Repair</button>

            <h2 id="heating-installation">Heating Installation</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae ipsa optio
            omnis hic et accusantium praesentium neque facere fugit vero. Autem vero molestiae
            quibusdam, quod unde deleniti laboriosam veniam tempore!</p>
            <button onclick="setProjectType('Heating Unit Installation')">Schedule a Heating Unit Installation</button>

            <h2 id="refrigeration-repair-services">Refrigeration Repair Services</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae ipsa optio
            omnis hic et accusantium praesentium neque facere fugit vero. Autem vero molestiae
            quibusdam, quod unde deleniti laboriosam veniam tempore!</p>
            <button onclick="setProjectType('Refrigeration Unit Repair')">Schedule a Refrigeration Unit Repair</button>

            <h2 id="hvac-maintenance">HVAC Maintenance</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae ipsa optio
            omnis hic et accusantium praesentium neque facere fugit vero. Autem vero molestiae
            quibusdam, quod unde deleniti laboriosam veniam tempore!</p>
            <button onclick="setProjectType('HVAC Maintenance')">Schedule a Maintenace Check</button>
            <button onclick="">Sign Up for Routine Maintenance Plan</button>

        </section>
_END;

require_once './templates/aside.php';
printAsides('aside-schedule-form.php', 'aside-dummy.php');

echo <<<_END

        <script type='module'>
            import {selectItemByValue} from './js/utils.js';
            var select = document.getElementById('schedule-form-project-type');
            window.setProjectType = function setProjectType(projectType) {
                selectItemByValue(select, projectType);
                select.scrollIntoView({behavior: "smooth", block: "center"});
                select.classList.add("notice-animation");
                select.style.animation = 'none';
                select.offsetHeight;
                select.style.animation = null;
            }
        </script>\n\n
_END;

echo "\t</div>";

require_once './templates/footer.php';
?>
