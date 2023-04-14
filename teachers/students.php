<?php
include "../main.php";
isTeacher();
pageHeader('Manage Students');
echo '<h1>Students</h1>
<p><a href="add_student.php">&raquo; Add a Student</a></p>';
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Date of Birth</th>
    <th>Father\'s Name</th>
    <th>Mother\'s Name</th>
    <th>Contact No.</th>
    <th>Class</th>
    <th>Roll No.</th>
    <th>Section</th>
    <th>Department</th>
    <th>Manage</th>
    </tr>';
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id"]."</td>
        <td>" . $row["name"]."</td>
        <td>" . $row["gender"]."</td>
        <td>" . $row["dob"]."</td>
        <td>" . $row["father"]."</td>
        <td>" . $row["mother"]."</td>
        <td>" . $row["contact"]."</td>
        <td>" . $row["class"]."</td>
        <td>" . $row["roll"]."</td>
        <td>" . $row["section"]."</td>
        <td>" . $row["department"]."</td>
        <td><a href=\"grades.php?id=" . $row["id"] . "\">Grades</a> <a href=\"update_student.php?id=" . $row["id"] . "\">Update</a>  <a href=\"remove_student.php?id=" . $row["id"] . "\">Remove</a></td>
        </tr>";
    }
    echo '</table>';
} else {
    echo "No students found!";
}
echo '<br/><center><a href="index.php">Go Back</a></center>';
pageFooter($conn);
?>