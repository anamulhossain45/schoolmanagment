<?php
include "../main.php";
pageHeader('Manage Routines');
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
    <th>Update</th>
    </tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
        <td>Class ' . $row["class"] . '</td>
        <td>'.$days[$row["day"]].'</td>
        <td><a href="/routines.php?id=' . $row["id"] . '">View</a></td>
        <td><a href="update_routine.php?id=' . $row["id"] . '">Update</a></td>
        </tr>';
    }
    echo '</table>';
} else {
    echo "No routines found!";
}
echo '<br/><center><a href="students.php">Go Back</a></center>';
pageFooter($conn);
?>