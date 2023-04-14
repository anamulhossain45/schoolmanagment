<?php
include "../main.php";
isStudent();
pageHeader('Class Routine');
$class = $_SESSION['class'];
$id = $_GET['id'];
if (isset($id)) {
    $sql = "SELECT * FROM routines WHERE id=" . $id . "";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<h1>Routine of '.$days[$row['day']].' (Class '.$row['class'].')</h1>
            <table style="width: 100%;">
            <tr>
            <th style="width: 10%; text-align: left;">Period</th>
            <th style="width: 40%; text-align: left;">Time</th>
            <th style="width: 50%; text-align: left;">Subject</th>
            </tr>
            <tr>
            <td>1st</td>
            <td>10:00 am - 11:00 am</td>
            <td>'.$row['p1'].'</td>
            </tr>
            <tr>
            <td>2nd</td>
            <td>11:00 am - 11:40 am</td>
            <td>'.$row['p2'].'</td>
            </tr>
            <tr>
            <td>3rd</td>
            <td>11:40 am - 12:20 pm</td>
            <td>'.$row['p3'].'</td>
            </tr>
            <tr>
            <td>4th</td>
            <td>12:20 pm - 01:00 pm</td>
            <td>'.$row['p4'].'</td>
            </tr>
            <tr>
            <td> </td>
            <td>01:00 pm - 02:00 pm</td>
            <td>Lunch Break</td>
            </tr>
            <tr>
            <tr>
            <td>5th</td>
            <td>02:00 pm - 02:40 pm</td>
            <td>'.$row['p5'].'</td>
            </tr>
            <tr>
            <td>6th</td>
            <td>02:40 pm - 03:20 pm</td>
            <td>'.$row['p6'].'</td>
            </tr>
            <tr>
            <td>7th</td>
            <td>03:20 pm - 04:00 pm</td>
            <td>'.$row['p7'].'</td>
            </tr>
            </table>';
        }
    } else {
        echo "Routine not found!";
    }
} else {
    echo '<h1>Select Day</h1>';
    $sql = "SELECT * FROM routines WHERE class=" . $class . "";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<a href="routine.php?id=' . $row['id'] . '">&raquo; ' . $days[$row['day']] . '</a><br/>';
        }
    } else {
        echo "No routines found!";
    }
}
echo '<br/><br/><center><a href="routine.php">Go Back</a></center>';
pageFooter($conn);
