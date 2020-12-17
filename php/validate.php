<?php
function validate($fieldType, &$field, $required, &$error="") {

    if (empty($field) && $required) {
        $error = "Required field";
        return false;
    }

    $sanitizedField = sanitize($field);

    switch ($fieldType) {
        case 'any';
            return true;
            break;
        case 'longtext':
            $pattern = "/(.*?)/";
            break;
        case 'text':
            $pattern = "/^[a-zA-Z-' ]*$/";
            $error = "Only letters and white space allowed";
            break;
        case 'email':
            if (!filter_var($sanitizedField, FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid email format";
                return false;
            }
            $pattern = "/(.*?)/";
            break;
        case 'phone':
            $pattern = "/^[2-9]\d{2}-\d{3}-\d{4}$/";
            $error = "Invalid phone format";
            break;
        case 'address':
            $pattern = "/(.*?)/";
            break;
        case 'zip':
            $pattern = "/^\d{5}$/";
            $error = "Only 5 digits accepted";
            break;
    }

    if (!preg_match($pattern, $sanitizedField))
        return false;

    $error = "";
    $field = $sanitizedField;
    return true;
}

function sanitize($string)
{
    $stirng = trim($string);
    $string = stripslashes($stirng);
    $stirng = htmlspecialchars($stirng);
    return $stirng;
}
?>