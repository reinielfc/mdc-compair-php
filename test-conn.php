<?php
require_once 'db_login.php';
$conn = openConn()  or die("Connection failed: %s\n" . $conn->error);

echo "Connected Successfully!";

closeConn($conn);

?>