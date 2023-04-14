<?php
include "main.php";
//isStudent();
pageHeader('Class Routines');
$id = $_GET['id'];
if (isset($id)) {
    $sql = "SELECT * FROM routines WHERE id=" . $id . "";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<h1>Routine of ' . $days[$row['day']] . ' (Class ' . $row['class'] . ')</h1>
            <table style="width: 100%;">
            <tr>
            <th style="width: 10%; text-align: left;">Period</th>
            <th style="width: 40%; text-align: left;">Time</th>
            <th style="width: 50%; text-align: left;">Subject</th>
            </tr>
            <tr>
            <td>1st</td>
            <td>10:00 am - 11:00 am</td>
            <td>' . $row['p1'] . '</td>
            </tr>
            <tr>
            <td>1st</td>
            <td>10:00 am - 11:00 am</td>
            <td>' . $row['p2'] . '</td>
            </tr>
            <tr>
            <td>1st</td>
            <td>10:00 am - 11:00 am</td>
            <td>' . $row['p3'] . '</td>
            </tr>
            <tr>
            <td>1st</td>
            <td>10:00 am - 11:00 am</td>
            <td>' . $row['p4'] . '</td>
            </tr>
            <tr>
            <td>1st</td>
            <td>10:00 am - 11:00 am</td>
            <td>' . $row['p5'] . '</td>
            </tr>
            <tr>
            <td>1st</td>
            <td>10:00 am - 11:00 am</td>
            <td>' . $row['p6'] . '</td>
            </tr>
            <tr>
            <td>1st</td>
            <td>10:00 am - 11:00 am</td>
            <td>' . $row['p7'] . '</td>
            </tr>
            </table>';
        }
    } else {
        echo "Routine not found!";
    }
    echo '<br/><br/><center><a href="routines.php">Go Back</a></center>';
} else {
    echo '<h1>All Routines</h1>';
    $sql = "SELECT * FROM routines";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo '<table>
    <tr>
    <th>Class</th>
    <th>Day</th>
    <th>View</th>
    </tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
        <td>Class ' . $row["class"] . '</td>
        <td>' . $days[$row["day"]] . '</td>
        <td><a href="routines.php?id=' . $row["id"] . '">View</a></td>
        </tr>';
        }
        echo '</table>';
    } else {
        echo "No routines found!";
    }
}
pageFooter($conn);
