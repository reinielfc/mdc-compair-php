<?php
$title = 'Careers';
define('FILENAME', pathinfo(__FILE__, PATHINFO_FILENAME) . ".php");

require_once './templates/header.php';
require_once './templates/sidebar.php';
require_once './templates/footer.php';

$sidebar = getSidebar('form-application.php');

$positionsTable = function() {
    require_once './php/DBConnection.php';

    $conn = new DBConnection();
    $conn->open();
    $conn = $conn->getConn();

    $sql = "SELECT * FROM positions WHERE available=1";
    $result = $conn->query($sql);
    if (!$result) die("Database access failed");

    $num_rows = $result->num_rows;

    $table = "<p>No Positions Available At Time</p>";

    if ($num_rows > 0) {

        $position  = "Position";
        $type      = "Type";
        $address   = "Address";
        $post_date = "Post Date";

        $table = "\n" . <<<_END
                    <div class="container">
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

            $table .= "\n" . <<<_END
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

        $table .= "\n" . <<<_END
                            </tbody>
                        </table>
                    </div>
                    <p>* Click on a position to apply for it.</p>
        _END;
    }

    return $table;
};

$positionsTable = $positionsTable();

echo <<< _END
$header

    <div class="main container">
        <section id="main">
            <div id="main-heading">
                <h1>$title</h1>
            </div>

            <div class="image">
                <img src="./img/hvac-technician.jpg" alt="HVAC Technician.">
                <a class="attribution" href='https://www.freepik.com/photos/technology'>Technology photo created by master1305 - www.freepik.com</a>
            </div>

            <p>To ensure customer satisfaction in our delivery of quality results, we need
            a team of skilled and dedicated professionals. If you are interested in a career
            with CompAir, please review our available positions:</p>

            $positionsTable

            <script src="./js/utils.js"></script>
            <script>
                function setPosition(positionID, position) {
                    var formPosition = document.getElementById('application-form-position');
                    var formPositionID = document.getElementById('application-form-position-id');

                    formPosition.setAttribute('value', position);
                    formPositionID.setAttribute('value', positionID);

                    noticeMe(formPosition);
                }
            </script>
        </section>

        $sidebar
    </div>

$footer
_END;
?>