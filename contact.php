<!DOCTYPE html>
<html>

  <head>
    <link rel="icon" href="images/favicon.svg">
    <link rel="stylesheet" href="styles.css">
    <title>Template | CompAir</title>
  </head>

  <body>
    <header>
      <div id="title">
        <a href="index.html"><img src="images/logo.svg" alt="CompAir Logo"></a>
        <h2> HVAC Installation <br> Maintenance & Repair</h2>
      </div>
    </header>

    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="">Air Conditioning</a></li>
        <li><a href="">Heating</a></li>
        <li><a href="">Maintenance</a></li>
        <li><a href="services.html">Services</a></li>
        <li><a href="careers.html">Careers</a></li>
        <li><a href="about-us.html">About Us</a></li>
        <li><a class="current" href="contact.php">Contact</a></li>
      </ul>
    </nav>

    <div class="main-content">
      <main>

        <div class="heading">
          <h1>Contact</h1>
        </div>

        <?php
        echo "Hell-O";
        ?>

        <form id="contact-form" action="" method="POST" autocomplete="on">

          <h2>Should you have any questions and/or complaints:</h2>

          <ul style="line-height: normal;">
            <li>Call us at <b>305-555-1247</b>, or</li>
            <li>Email us at <a href="mailto: contact@compair.com">contact@compair.com</a>, or</li>
            <li>Fill out the following form:</li>
          </ul>

          <fieldset class="two-col">
            <div class="text-field-box">
              <label for="fname">First Name</label>
              <input type="text" name="fname" id="fname" placeholder="John" required>
            </div>

            <div class="text-field-box">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" id="lname" placeholder="Doe" required>
            </div>

            <div class="text-field-box">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" placeholder="email@example.com" autocomplete="off" required>
            </div>

            <div class="text-field-box">
              <label for="phone">Phone Number</label>
              <input type="text" name="phone" id="phone" placeholder="305-555-7777"
                patern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
            </div>

            <div class="text-field-box">
              <label for="city">City</label>
              <input type="text" name="city" id="city" placeholder="Miami" required>
            </div>

            <div class="text-field-box">
              <label for="zip">Zip Code</label>
              <input type="text" name="zip" id="zip" placeholder="33176">
            </div>
          </fieldset>

          <fieldset class="one-col">
            <div class="textarea-box">
              <label for="comments">Comments</label>
              <textarea name="comments" id="comments" cols="30" rows="10"
                placeholder="Type your comments here..."></textarea>
            </div>

            <div class="box">
              <label for="contact-pref">I'd Prefer To Be Contacted By</label>
              <ul>
                <li>
                  <input type="radio" name="contact-pref" id="email-pref" value="email">
                  <label for="email-pref">Email</label>
                </li>
                <li>
                  <input type="radio" name="contact-pref" id="phone-pref" value="phone">
                  <label for="phone-pref">Phone</label>
                </li>
              </ul>
            </div>

            <div class="box">
              <label for="contact-source">How Did You Hear About Us?</label>
              <select name="contact-source" id="contact-source">
                <option value="">(select one)</option>
                <option value="previous customer">Previous Customer</option>
                <option value="google">Google</option>
                <option value="facebook">Facebook</option>
                <option value="twitter">Twitter</option>
                <option value="other">Other Website</option>
                <option value="newspaper ad">Newspaper Advertisement</option>
                <option value="tv ad">TV Advertisement</option>
                <option value="radio ad">Radio Advertisement</option>
                <option value="service truck sign">Sign on Service Truck</option>
              </select>
            </div>

            <div class="box">
              <label for="email-list">Join Our Email List</label>
              <input type="checkbox" name="email-list" id="email-list">
              <label for="email-list">Sign me up for the CompAir email list</label>
            </div>
          </fieldset>

          <fieldset class="submit">
            <input type="submit" value="Submit">
          </fieldset>

        </form>
      </main>

      <aside>
      </aside>
    </div>

    <footer>
      <p>
        <a href="index.html">Home</a> |
        <a href="services.html">Services</a> |
        <a href="careers.html">Careers</a> |
        <a href="about-us.html">About Us</a> |
        <a href="contact.php">Contact</a>
      </p>
    </footer>
  </body>
</html>