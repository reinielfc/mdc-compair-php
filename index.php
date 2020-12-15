<?php
$title = 'Home';
define('FILENAME', pathinfo(__FILE__, PATHINFO_FILENAME) . ".php");

require_once './templates/header.php';
require_once './templates/sidebar.php';
require_once './templates/footer.php';

$sidebar = getSidebar('form-schedule.php');

echo <<< _END
$header

    <div class="main container">
        <section id="showcase">
            <div class="foreground">
                <h1>Give your home a boost in comfort.</h1>
            </div>
        </section>

        <section id="main">
            <h1>Welcome</h1>
            <p>Started in 2012, by a father and his son, CompAir was founded with one mission
            in mind; to provide a better service, at a lower price. Towards that goal we are
            committed 100%, we believe that customer comfort and satisfaction should always
            come first. We pride ourselves with providing an individualized service for each
            and every customer, whether residential or commercial, we believe that their
            uniqueness should grant them special attention.</p>

            <p>If you are in need of quality heating, ventilation, or air conditioning in the
            areas of Kendall, Coral Gables, Doral, Palmetto Bay, or other surrounding areas
            don't hesitate to give us a call. CompAir will take care of all your HVAC
            installation, maintenance, replacement, and repair needs. After we are done, you
            will notice the difference instantly, a new level of comfort in your life.
            CompAir your air.</p>
        </section>

        $sidebar
    </div>

$footer
_END;
?>