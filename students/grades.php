<?php
include "../main.php";
isStudent();
pageHeader('View Grades');
$id = $_SESSION['id'];

$sql = "SELECT * FROM grades WHERE student_id=" . $id . "";
$result = $conn->query($sql);

echo '<h1>View Grades</h1>';
if ($result->num_rows > 0) {
    // output data of each row
    echo '<table>
        <tr>
          <th style="width:30%; text-align: left;">Name</th>
          <th style="width:20%; text-align: left;">Year</th>
          <th style="width:20%; text-align: left;">Semester</th>
          <th style="width:20%; text-align: left;">Grade</th>
        </tr>';
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $_SESSION['name'] . "</td>
            <td>" . $row["year"] . "</td>
            <td>" . $row["semester"] . "</td>
            <td>" . $row["grade"] . "</td>";
        echo "</tr>";
    }
    echo '</table>';
} else {
    echo "<p>No grades found!!</p>";
}
echo '<br/><center><a href="/students">Go Back</a></center>';
pageFooter($conn);
