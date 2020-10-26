<?php

function openConn() {
    $hn = 'localhost';
    $un = 'root';
    $pw = 'mysql';
    $db = 'compair';

    try {
        $conn = new PDO("mysql:host=$hn;dbname=$db", $un, $pw);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed!";
    }

    return $conn;
}



function closeConn($conn) {
    $conn = null;
}

function addContactForm($conn, $sub) {
    $form_id = null;
    $fname = sanitizeString($sub['fname']);
    $lname = sanitizeString($sub['lname']);
    $email = sanitizeString($sub['email']);
    $phone = sanitizeString($sub['phone']);
    $city  = sanitizeString($sub['city']);
    $comments = sanitizeString($sub['comments']);
    $zip = $contact_pref = $discovery_survey = $email_list = null;

    if (array_key_exists('zip', $sub))
        $zip = sanitizeString($sub['zip']);
    if (array_key_exists('contact_pref', $sub))
        $contact_pref = sanitizeString($sub['contact_pref']);
    if (array_key_exists('discovery_survey', $sub))
        $discovery_survey = sanitizeString($sub['discovery_survey']);
    if (array_key_exists('email_list', $sub))
        $email_list = sanitizeString($sub['email_list']) == 'on' ? true : false;

    $sql = "INSERT INTO contact_form (form_id, fname, lname,
    email, phone, city, zip, comments, contact_pref, discovery_survey, email_list)
    VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql)->execute([$form_id, $fname, $lname, $email, $phone,
        $city, $zip, $comments, $contact_pref, $discovery_survey, $email_list]);
    $stmt = null;
}

// for demonstration purposes
function printTable($conn, $table) {

    if (isset($_POST['delete']) && isset($_POST['form_id'])) {
        $form_id = $_POST['form_id'];
        $query = "DELETE FROM contact_form WHERE form_id='$form_id'";
        $result = $conn->query($query);
        if (!$result) echo "DELETE failed<br><br>";
    }

    $query = "SELECT * FROM $table";
    $result = $conn->query($query);
    if (!$result) die("Database access failed");

    $rows = $result->rowCount();

    for ($j = 0; $j < $rows; ++$j) {

        $row = $result->fetch(PDO::FETCH_NUM);

        $r0  = htmlspecialchars($row[0]);
        $r1  = htmlspecialchars($row[1]);
        $r2  = htmlspecialchars($row[2]);
        $r3  = htmlspecialchars($row[3]);
        $r4  = htmlspecialchars($row[4]);
        $r5  = htmlspecialchars($row[5]);
        $r6  = htmlspecialchars($row[6]);
        $r7  = htmlspecialchars($row[7]);
        $r8  = htmlspecialchars($row[8]);
        $r9  = htmlspecialchars($row[9]);
        $r10 = htmlspecialchars($row[10]);

        echo <<<_END
        <pre style="white-space: pre-wrap">
                Form ID: $r0
             First Name: $r1
              Last Name: $r2
                  Email: $r3
           Phone Number: $r4
                   City: $r5
               Zip Code: $r6
        Contact Through: $r8
        Survey Response: $r9
        Join Email List: $r10
               Comments:
        \n$r7\n
        </pre>
        <form action='contact.php' method='post'>
        <input type='hidden' name='delete' value='yes'>
        <input type='hidden' name='form_id' value='$r0'>
        <input type='submit' value='DELETE RECORD'></form>
        _END;
    }

    $result = null;
}

function sanitizeString($var) {
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}
