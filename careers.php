<?php
$title = 'Careers';
require_once './templates/header.php';

echo <<< _END
    <div class="main container">
        <section id="main">
            <div id="main-heading">
                <h1>$title</h1>
            </div>
            <p>To ensure customer satisfaction in our delivery of quality results, we need
            a team of skilled and dedicated professionals. If you are interested in a career
            with CompAir, please review our available positions:</p>\n
_END;

require_once './php/DBConnection.php';

$conn = new DBConnection();
$conn->open();
$conn = $conn->getConn();
$table = 'positions';

$sql = "SELECT * FROM $table WHERE available=1";
$result = $conn->query($sql);
if (!$result) die("Database access failed");

$num_rows = $result->num_rows;

if ($num_rows > 0) {

    $position  = "Position";
    $type      = "Type";
    $address   = "Address";
    $post_date = "Post Date";

    echo "\n" . <<<_END
                <table id="available-positions" class="table">
                    <thead>
                        <tr>
                            <th>$position*</th>
                            <th>$type</th>
                            <th>$address</th>
                            <th>$post_date</th>
                        </tr>
                    </thead>
                    <tbody>
    _END;

    for ($i = 0; $i < $num_rows; $i++) {

        $row = $result->fetch_array(MYSQLI_NUM);

        $position_id = htmlspecialchars($row[0]);
        $position    = htmlspecialchars($row[1]);
        $type        = htmlspecialchars($row[3]);
        $address     = htmlspecialchars($row[4]);
        $post_date   = htmlspecialchars($row[5]);

        $post_date = strtotime($post_date);
        $post_date = date("m/d/y", $post_date);

        echo "\n" . <<<_END
                            <tr>
                                <td>
                                    <button onclick="setPosition($position_id, '$position')">$position</button>
                                </td>
                                <td>$type</td>
                                <td>$address</td>
                                <td>$post_date</td>
                            </tr>
        _END;
    }

    echo "\n" . <<<_END
                    </tbody>
                </table>
                <p>* Click on a position to apply for it.</p>\n
    _END;
} else {
    echo "\n\t\t\t<p>No Positions Available At Time</p>\n";
}

echo "\t\t</section>\n\n";

echo <<<_END
        <script>
            function setPosition(positionID, position) {
                var formPositionTitle = document.getElementById('position');
                var formPositionID = document.getElementById('position-id');

                formPositionTitle.textContent = position;
                formPositionID.setAttribute('value', positionID);

            }
        </script>
_END;

require_once './templates/aside.php';
printAsides('aside-application-form.php'); //, 'aside-dummy.php');

echo "\t</div>";

require_once './templates/footer.php';

?>