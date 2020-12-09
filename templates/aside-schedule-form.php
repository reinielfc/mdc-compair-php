<?php
echo <<< _END
            <link rel="stylesheet" type="text/css" href="css/aside-form.css">

            <div class="container">
                <form id="schedule-form" action="schedule-form.php" method="POST" autocomplete="off">
                    <p>Get Started Now</p>
                    <input type="text" name="fullname" id="schedule-form-fullname" placeholder="Full Name" required>
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
                    <input type="submit" name="submit" value="SCHEDULE NOW!">
                </form>
            </div>
_END;
?>