<?php
echo <<< _END
            <link rel="stylesheet" type="text/css" href="css/aside-form.css">

            <div class="container">
                <form id="application-form" action="application-form.php" method="POST" autocomplete="off">
                    <h3>Apply for <span id="position">this position</span>.</h3>
                    <p>Do you wish to join our team? Please send us your resume and fill out the fields below:</p>

                    <label for="application-form-fullname">Full Name</label>
                    <input type="text" name="fullname" id="application-form-fullname" placeholder="John Doe" required>

                    <label for="application-form-email">Email Address</label>
                    <input type="email" name="email" id="application-form-email" placeholder="email@example.com" required>

                    <label for="application-form-phone">Phone Number</label>
                    <input type="tel" name="phone" id="application-form-phone" placeholder="305-555-7777" required>

                    <label for="application-form-resume">Upload Resume</label>
                    <input type="file" id="application-form-resume">

                    <label for="application-form-cover-letter">Cover Letter</label>
                    <textarea name="cover_letter" id="application-form-cover-letter" cols="30" rows="10" placeholder="Type or paste your cover letter here..." required></textarea>

                    <input type="hidden" name="position_id" id="position-id">
                    <input type="submit" name="submit" value="SEND APPLICATION">
                </form>
            </div>
_END;


?>
