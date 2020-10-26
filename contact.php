<?php
$title = 'Contact';

require_once 'db_connPDO.php';
$label_style = "";

if (isset($_POST['submit'])) {
  if (
    empty($_POST['fname']) || empty($_POST['lname']) ||
    empty($_POST['email']) || empty($_POST['phone']) ||
    empty($_POST['city'])  || empty($_POST['comments'])
  ) {
    $label_style .= <<< _END
      .req-field input:placeholder-shown,
      .req-field textarea:placeholder-shown {
          border-color: #ff6600 !important;
      }
    _END;
  } else {
    $sub; // submission
    foreach ($_POST as $field => $value) {
      if (!empty($_POST[$field]))
        $sub[$field] = sanitizeString($value);
    }
    $conn = openConn();
    addContactForm($conn, $sub);
    closeConn($conn);
  }
}

?>

<!DOCTYPE html>
<html>

<?php
$add_styles = $label_style;
require_once('templates/header.php');

?>

<div class="main-content">
  <main>

    <div class="heading">
      <h1>Contact</h1>
    </div>

    <form id="contact-form" action="contact.php" method="POST" autocomplete="on">

      <p>Should you have any questions and/or complaints:</p>

      <ul style="line-height: normal;">
        <li>Call us at <b>305-555-1247</b>, or</li>
        <li>Email us at <a href="mailto: contact@compair.com">contact@compair.com</a>, or</li>
        <li>Fill out the following form:</li>
      </ul>

      <fieldset class="two-col">
        <div class="text-field-box req-field" id="fname">
          <label>First Name <span class="required">*</span></label>
          <input type="text" name="fname" placeholder="John">
        </div>

        <div class="text-field-box req-field" id="lname">
          <label>Last Name <span class="required">*</span></label>
          <input type="text" name="lname" placeholder="Doe">
        </div>

        <div class="text-field-box req-field" id="email">
          <label>Email <span class="required">*</span></label>
          <input type="email" name="email" placeholder="email@example.com" autocomplete="off">
        </div>

        <div class="text-field-box req-field" id="phone">
          <label>Phone Number <span class="required">*</span></label>
          <input type="text" name="phone" placeholder="305-555-7777" patern="([0-9]{3}-){2}[0-9]{4}">
        </div>

        <div class="text-field-box req-field" id="city">
          <label>City <span class="required">*</span></label>
          <input type="text" name="city" placeholder="Miami">
        </div>

        <div class="text-field-box">
          <label>Zip Code</label>
          <input type="text" name="zip" placeholder="33176">
        </div>
      </fieldset>

      <fieldset class="one-col">
        <div class="textarea-box req-field" id="comments">
          <label>Comments <span class="required">*</span></label>
          <textarea name="comments" cols="30" rows="10" placeholder="Type your comments here..."></textarea>
        </div>

        <div class="box">
          <label>I'd Prefer To Be Contacted By</label>
          <ul>
            <li>
              <input type="radio" name="contact_pref" id="email-pref" value="email">
              <label for="email-pref">Email</label>
            </li>
            <li>
              <input type="radio" name="contact_pref" id="phone-pref" value="phone">
              <label for="phone-pref">Phone</label>
            </li>
          </ul>
        </div>

        <div class="box">
          <label>How Did You Hear About Us?</label>
          <select name="discovery_survey">
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
        </div>

        <div class="box">
          <label>Join Our Email List</label>
          <input type="checkbox" name="email_list" id="join-email-list">
          <label for="join-email-list">Sign me up for the CompAir email list</label>
        </div>
      </fieldset>

      <fieldset class="submit">
        <p><span class="required">*</span> Check that all fields with an asterisk are filled.</p>
        <input type="submit" name="submit" value="SUBMIT">
      </fieldset>
    </form>

  </main>

  <aside style="overflow: scroll; height: 50%;">
    <?php
    $conn = openConn();
    printTable($conn, 'contact_form');
    closeConn($conn);
    ?>
  </aside>
</div>

<?php require_once('templates/footer.php'); ?>

</html>