<?php
require_once 'db_login.php';
$conn = openCon();

echo "Connected Successfully!";

closeCon($conn);

?>