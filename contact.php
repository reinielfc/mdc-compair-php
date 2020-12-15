<?php
$title = 'Contact';
define('FILENAME', pathinfo(__FILE__, PATHINFO_FILENAME) . ".php");

require_once './templates/header.php';
require_once './templates/sidebar.php';
require_once './templates/footer.php';

$sidebar = getSidebar('form-schedule.php'); //, 'contact-table-print.php');//, 'dummy.php');
$statusMsg = "<span>*</span> Check that all fields with an asterisk are filled correctly.";

// form validation and submission
if (isset($_POST['submit']) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    require_once './php/validate.php';

    $ready = true
    && validate('text', $_POST["fname"], true, $fnameErr)
        && validate('text', $_POST["lname"], true, $lnameErr)
        && validate('email', $_POST["email"], true, $emailErr)
        && validate('phone', $_POST["phone"], true, $phoneErr)
        && validate('text', $_POST["city"], true, $cityErr)
        && validate('zip', $_POST["zip"], false, $zipErr)
        && validate('longtext', $_POST["comments"], true, $commentsErr);

    if ($ready) {
        require_once './php/DBConnection.php';
        $conn = new DBConnection();
        $conn->open();
        $conn->insertRecord('contacts', $_POST);
        $conn->close();
        header("Location: submitted-form.php");
    }

}

echo <<< _END
$header

    <div class="main container">
        <section id="main">
            <div id="main-heading">
                <h1>Contact</h1>
            </div>


            <p>Should you have any questions and/or complaints:</p>
            <ul style="line-height: normal;">
                <li>Call us at <b>305-555-1247</b>, or</li>
                <li>Email us at <a href="mailto:contact@compair.com">contact@compair.com</a>, or</li>
                <li>Fill out the following form:</li>
            </ul>

            <form action="contact.php" method="POST" autocomplete="on">
                <table>
                    <tr>
                        <td>
                            <label for="fname">First Name <span>*$fnameErr</span> </label>
                            <input type="text" name="fname" id="fname" placeholder="John" value="$fname" required>
                        </td>
                        <td><label for="lname">Last Name <span>*$lnameErr</span> </label>
                            <input type="text" name="lname" id="lname" placeholder="Doe" value="$lname" required></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email <span>*$emailErr</span> </label>
                            <input type="text" name="email" id="email" placeholder="email@example.com" autocomplete="off" value="$email" required>
                        </td>
                        <td>
                            <label for="phone">Phone Number <span>*$phoneErr</span> </label>
                            <input type="tel" name="phone" id="phone" placeholder="305-555-7777" pattern="^[2-9]\d{2}-\d{3}-\d{4}$" value="$phone" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="city">City <span>*$cityErr</span> </label>
                            <input type="text" name="city" id="city" placeholder="Miami" value="$city" required>
                        </td>
                        <td>
                            <label for="zip">Zip Code <span>$zipErr</span> </label>
                            <input type="text" name="zip" id="zip" placeholder="33176" value="$zip">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="comments">Comments <span>*$commentsErr</span> </label>
                            <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Type your comments here..." required>$comments</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>I'd Prefer To Be Contacted By</label>
                            <ul class="choice-list">
                                <li>
                                    <input type="radio" name="contact_pref" id="email-pref" value="email">
                                    <label for="email-pref">Email</label>
                                </li>
                                <li>
                                    <input type="radio" name="contact_pref" id="phone-pref" value="phone">
                                    <label for="phone-pref">Phone</label>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>How Did You Hear About Us?</label>
                            <select name="discovery_survey" id="discovery_survey">
                                <option value="">(select one)</option>
                                <option>Previous Customer</option>
                                <option>Google</option>
                                <option>Facebook</option>
                                <option>Twitter</option>
                                <option>Other Website</option>
                                <option>Newspaper Advertisement</option>
                                <option>TV Advertisement</option>
                                <option>Radio Advertisement</option>
                                <option>Sign on Service Truck</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Join Our Email List</label>
                            <ul class="choice-list">
                                <li>
                                    <input type="checkbox" name="email_list" id="join-email-list">
                                    <label for="join-email-list">Sign me up for the CompAir email list</label>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="SUBMIT">
                            <p id="status-message">$statusMsg</p>
                        </td>
                    </tr>
                </table>
            </form>
        </section>

        $sidebar
    </div>

$footer
_END;
?>
