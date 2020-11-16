<?php

$fnameErr = $lnameErr = $emailErr = $phoneErr = $cityErr = $zipErr = $commentsErr = "";
$fname = $lname = $email = $phone = $city = $zip = $comments = "";
$ready = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["fname"])) {
        $fnameErr = "First name is required";
        $ready = false;
    } else {
        $fname = test_input($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $fnameErr = "Only letters and white space allowed";
            $ready = false;
        }
        $_POST['fname'] = $fname;
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Last name is required";
    } else {
        $lname = test_input($_POST["lname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            $lnameErr = "Only letters and white space allowed";
            $ready = false;
        }
        $_POST['lname'] = $lname;
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email name is required";
        $ready = false;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $ready = false;
        }
        $_POST['email'] = $email;
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
        $ready = false;
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[2-9]\d{2}-\d{3}-\d{4}$/", $phone)) {
            $phoneErr = "Invalid phone format";
            $ready = false;
        }
        $_POST['phone'] = $phone;
    }

    if (empty($_POST["city"])) {
        $cityErr = "City is required";
        $ready = false;
    } else {
        $city = test_input($_POST["city"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $city)) {
            $cityErr = "Only letters and white space allowed";
            $ready = false;
        }
        $_POST['city'] = $city;
    }

    if (!empty($_POST["zip"])) {
        $zip = test_input($_POST["zip"]);
        if (!preg_match("/^\d{5}$/", $zip)) {
            $zipErr = "Only 5 digits accepted";
            $ready = false;
        }
        $_POST['zip'] = $zip;
    }


    if (empty($_POST["comments"])) {
        $commentsErr = "Comments required";
        $ready = false;
    } else {
        $comment = test_input($_POST["comments"]);
        $_POST['comment'] = $comment;
    }

}

function test_input($string)
{
    $stirng = trim($string);
    $string = stripslashes($stirng);
    $stirng = htmlspecialchars($stirng);
    return $stirng;
}

?>