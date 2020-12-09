<?php
echo "\t\t\t<div class=\"container\">";

require_once './php/DBConnection.php';

$conn = new DBConnection();
$conn->open();
$conn = $conn->getConn();
$table = 'contacts';

if (isset($_POST['delete']) && isset($_POST['contact_id'])) {
    $contact_id = $conn->real_escape_string($_POST['contact_id']);
    $sql = "DELETE FROM contacts WHERE contact_id='$contact_id'";
    $result = $conn->query($sql);
    if (!$result) echo "DELETE failed<br><br>";
}

$sql = "SELECT * FROM $table";
$result = $conn->query($sql);
if (!$result) die("Database access failed");

$num_rows = $result->num_rows;

for ($i = 0; $i < $num_rows; ++$i) {

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
    ioin Email List: $r10
           Comments: $r7
                    </pre>\n
                    <form action='contact.php' method='post'>
                        <input type='hidden' name='delete' value='yes'>
                        <input type='hidden' name='contact_id' value='$r0'>
                        <input type='submit' value='DELETE RECORD'>
                    </form>\n
    _END;

}

$conn->close();
$result->close();

echo "\t\t\t</div>";
?>