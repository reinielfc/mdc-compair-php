<?php

function openConn() {
    $hn = 'localhost';
    $un = 'root';
    $pw = 'mysql';
    $db = 'compair';

    $conn = new mysqli($hn, $un, $pw, $db);

    return $conn;
}

function closeConn($conn) {
    $conn->close();
}

function addContactForm($conn, $sub) {
    $form_id = null;
    $fname = sanitizeString($sub['fname']);
    $lname = sanitizeString($sub['lname']);
    $email = sanitizeString($sub['email']);
    $phone = sanitizeString($sub['phone']);
    $city  = sanitizeString($sub['city']);
    $comments = sanitizeString($sub['comments']);
    $zip = $contact_pref = $discovery_survey = $email_list = "NULL";

    if (array_key_exists('zip', $sub))
        $zip = sanitizeString($sub['zip']);
    if (array_key_exists('contact_pref', $sub))
        $contact_pref = sanitizeString($sub['contact_pref']);
    if (array_key_exists('discovery_survey', $sub))
        $discovery_survey = sanitizeString($sub['discovery_survey']);
    if (array_key_exists('email_list', $sub))
        $email_list = sanitizeString($sub['email_list']) == 'on' ? true : false;

    $stmt = $conn->prepare("INSERT INTO contact_form (form_id, fname, lname,
    email, phone, city, zip, comments, contact_pref, discovery_survey, email_list)
    VALUES (?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param('isssssssssi', $form_id, $fname, $lname, $email, $phone,
        $city, $zip, $comments, $contact_pref, $discovery_survey, $email_list);

    $stmt->execute();
    $stmt->close();
}

function printTable($conn, $table) {
    $query = "SELECT * FROM $table";
    $result = $conn->query($query);
    if (!$result) die("Database access failed");

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {

        $row = $result->fetch_array(MYSQLI_NUM);

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
        _END;
    }

    $result->close();
}

function sanitizeString($var) {
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}

?>