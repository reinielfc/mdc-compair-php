<?php
$currentFilename = FILENAME;

if (key_exists('statusMsg', $_GET))
    $statusMsg = $_GET['statusMsg'];
else
    $statusMsg = "<span>*</span> Check that all fields with an asterisk are filled correctly.";

if (isset($_POST['application_form_submit']) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    require_once './php/validate.php';
    require_once './php/upload-file.php';

    $uploadFile = 'resume';
    $destination = 'uploads/';

    $ready = true
        && validate('text', $_POST["full_name"], true, $fnameErr)
        && validate('email', $_POST["email"], true, $emailErr)
        && validate('phone', $_POST["phone"], true, $phoneErr)
        && uploadFile($uploadFile, $destination, $resumeErr, 'doc', 'docx', 'pdf');

        $_POST['resume'] = $destination;
    if ($ready) {
        require_once './php/DBConnection.php';
        $conn = new DBConnection();
        $conn->open();
        $conn->insertRecord('applications', $_POST);
        $conn->close();
        header("Location: submitted-form.php");
    }
}

$aside = <<< _END
            <link rel="stylesheet" type="text/css" href="css/aside-form.css">

            <div class="filled container">
                <form id="application-form" action="$currentFilename" method="POST" autocomplete="off">
                    <h3>Application Form</h3>
                    <p>Do you wish to join our team? Please send us your resume and fill out the fields below:</p>

                    <label for="application-form-position">Position</label>
                    <input type="text" name="position" id="application-form-position" placeholder="(Select from the available positions)" required disabled>

                    <label for="application-form-fullname">Full Name</label>
                    <input type="text" name="full_name" id="application-form-fullname" placeholder="John Doe" required>

                    <label for="application-form-email">Email Address</label>
                    <input type="email" name="email" id="application-form-email" placeholder="email@example.com" required>

                    <label for="application-form-phone">Phone Number</label>
                    <input type="tel" name="phone" id="application-form-phone" placeholder="305-555-7777" pattern="^[2-9]\d{2}-\d{3}-\d{4}$" required>

                    <input type="file" name="resume" id="application-form-resume" accept=".doc, .docx, .pdf" required>

                    <label for="application-form-cover-letter">Cover Letter</label>
                    <textarea name="cover_letter" id="application-form-cover-letter" cols="30" rows="10" placeholder="Type or paste your cover letter here..." required></textarea>

                    <input type="hidden" name="position_id" id="application-form-position-id">
                    <input type="submit" name="application_form_submit" value="SEND APPLICATION">
                </form>
            </div>
_END;
?>
