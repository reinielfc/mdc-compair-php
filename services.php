<?php
$title = 'Services';
require_once './templates/header.php';

echo <<< _END
    <div class="main container">
        <section id="main">
            <div id="main-heading">
                <h1>$title</h1>
            </div>

            <p>All our services are offered to both Commercial and Residential entities.</p>

            <h2 id="ac-repair-services">AC Repair Services</h2>
            <p>The worst thing that can happen during Florida's scorching hot summer days is for your AC to suddenly stop working.
            Here comes CompAir to the rescue! With our 24/7 emmergency repair service, it's just a matter of giving us a call and
            one of our certified technicians will be there taking care of the problem in no time.</p>
            <button onclick="setProjectType('AC Repair')">Schedule an AC Repair</button>

            <h2 id="ac-installation">AC Installation</h2>
            <p>When your old Air Conditioner starts showing signs of its age, it could mean that it is time for a replacement.
            Ignoring these signs might catch you by surprise later on, so, it is better to start thinking about getting a new one.
            Air Conditioners do not come cheap, but they are not something that you should cheap out on. That is why we are here, to
            help you consider your best options, so you can get it right the first time. After you purchase your new system, our team
            of prefessionals will take care of the rest.</p>
            <button onclick="setProjectType('AC Installation')">Schedule an AC Installation</button>

            <h2 id="heating-repair">Heating Repair</h2>
            <p>If you have a heating system at home, we have knowledgable heating repair technicians available for you. So your family
            does not get cold during the winter, we also offer our 24/7 emergency repair service for heating unit repairs.</p>
            <button onclick="setProjectType('Heating Unit Repair')">Schedule a Heating Unit Repair</button>

            <h2 id="heating-installation">Heating Installation</h2>
            <p>When repairs are not cutting it for your heating unit, CompAir professionals will let you know that it is time for a
            replacement. When you are ready for a new system, we will help you consider your best options, so you can choose wisely.
            After the purchase is done, our team will take care of the installation with as little disruption to your life as possible.</p>
            <button onclick="setProjectType('Heating Unit Installation')">Schedule a Heating Unit Installation</button>

            <h2 id="refrigeration-repair-services">Refrigeration Repair Services</h2>
            <p>Our 24/7 emergency repair service is extended to refrigeration equiment such as refrigerators, freezers, and ice machines.
            We fix all equipment makes and models, and so your food doesn't go bad we offer temporary replacements for small equiment.
            We also offer refigeration repair services for commercial entities such as restaurants, retail food establishments, food
            service companies, and food manufacturing plants. Our skilled technicians normally take care of the problem in very little
            time, we are aware that an extended downtime of refrigeration could mean losses in inventory.</p>
            <button onclick="setProjectType('Refrigeration Unit Repair')">Schedule a Refrigeration Unit Repair</button>

            <h2 id="hvac-maintenance">HVAC Maintenance</h2>
            <p>Routine maintenance is necessary to make sure that your HVAC equipment has long lasting and efficient service life.
            CompAir offers you maintenance services to make sure that this happens. During a maintenance inspection, our technicians
            will check and calibrate your system, afterwards they will notify you of any concerns that they have about your system,
            so you are aware of its current state and make informed decisions about it.</p>
            <button onclick="setProjectType('HVAC Maintenance')">Schedule a Maintenace Check</button>

        </section>
_END;

require_once './templates/aside.php';
printAsides('aside-schedule-form.php');//, 'aside-dummy.php');

echo <<<_END

        <script>
            // used for <select> element, selects an <option> by its value
            function selectOptionByValue(element, value){
                for(var i=0; i < element.options.length; i++)
                {
                    if(element.options[i].value == value)
                        element.selectedIndex = i;
                }
            }

            var select = document.getElementById('schedule-form-project-type');

            window.setProjectType = function setProjectType(projectType) {
                selectOptionByValue(select, projectType);
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
