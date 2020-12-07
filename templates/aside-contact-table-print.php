<?php
echo "\t\t\t<div class=\"container\">";

require_once './php/DBConnection.php';

$conn = new DBConnection();
$conn->open();
$conn = $conn->getConn();
$table = 'contact_form';

if (isset($_POST['delete']) && isset($_POST['form_id'])) {
    $form_id = $conn->real_escape_string($_POST['form_id']);
    $query = "DELETE FROM contact_form WHERE form_id='$form_id'";
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed<br><br>";
}

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

    echo "\n" . <<<_END
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
           Comments: $r7
                    </pre>\n
                    <form action='contact.php' method='post'>
                        <input type='hidden' name='delete' value='yes'>
                        <input type='hidden' name='form_id' value='$r0'>
                        <input type='submit' value='DELETE RECORD'>
                    </form>\n
    _END;

}

$conn->close();
$result->close();

echo "\t\t\t</div>";
?>