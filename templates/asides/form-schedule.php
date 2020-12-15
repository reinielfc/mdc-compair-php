<?php

$currentFilename = FILENAME;

if (isset($_POST['schedule_form_submit']) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    require_once './php/validate.php';

    $ready = true
        && validate('text', $_POST["full_name"], true)
        && validate('email', $_POST["email"], true)
        && validate('phone', $_POST["phone"], true)
        && validate('address', $_POST["address"], true)
        && validate('text', $_POST["project_type"], true)
        && validate('longtext', $_POST["project_desc"], true);

    if ($ready) {
        require_once './php/DBConnection.php';
        $conn = new DBConnection();
        $conn->open();
        $conn->insertRecord('schedule', $_POST); //TODO: make schedule table
        $conn->close();
        header("Location: submitted-form.php");
    }
}

$aside = <<< _END
            <link rel="stylesheet" type="text/css" href="css/aside-form.css">

            <div class="filled container">
                <form id="schedule-form" action="./$currentFilename" method="POST" autocomplete="off">
                    <p>Get Started Now</p>
                    <input type="text" name="full_name" id="schedule-form-fullname" placeholder="Full Name" required>
                    <input type="email" name="email" id="schedule-form-email" placeholder="Email" required>
                    <input type="tel" name="phone" id="schedule-form-phone" placeholder="Phone Number" required>
                    <input type="text" name="address" id="schedule-form-address" placeholder="Full Address" required>
                    <select name="project_type" id="schedule-form-project-type" required>
                        <option value="">Project Type</option>
                        <option>AC Repair</option>
                        <option>AC Installation</option>
                        <option>Heating Unit Repair</option>
                        <option>Heating Unit Installation</option>
                        <option>Refrigeration Unit Repair</option>
                        <option>HVAC Maintenance</option>
                    </select>
                    <textarea name="project_desc" id="schedule-form-project-desc" cols="30" rows="10" placeholder="Project Description" required></textarea>
                    <input type="submit" name="schedule_form_submit" value="SCHEDULE NOW!">
                </form>
            </div>
_END;
?>