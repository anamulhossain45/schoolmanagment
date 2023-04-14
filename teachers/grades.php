<?php
include "../main.php";
isTeacher();
pageHeader('View Grades');
$id = $_GET['id'];
if (empty($id)) {
    ?>
    <h1>View Grades</h1>
<p>Go to <a href="students.php">students</a> and click on a student to view grades.</p>
<?php
} else {
    $sql = "SELECT * FROM grades WHERE student_id=".$id."";
    $result = $conn->query($sql);
    $sql = "SELECT * FROM students WHERE id=".$id."";
    $students = $conn->query($sql);
    if ($students->num_rows > 0) {
        while ($row = $students->fetch_assoc()) {
            $student[$id] = $row['name'];
        }
    } else {
        echo '<h1>View Grades</h1>
        <p>Invalid Student ID!</p>';
        pageFooter($conn);
        exit();
    }
    echo '<h1>View Grades</h1>
    <p><a href="add_grade.php?id='.$id.'">&raquo; Add a grade</a></p>';
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<table style="width:100%">
        <tr>
          <th style="width:30%; text-align: left;">Name</th>
          <th style="width:20%; text-align: left;">Year</th>
          <th style="width:20%; text-align: left;">Semester</th>
          <th style="width:20%; text-align: left;">Grade</th>
          <th style="width:10%; text-align: left;">Action</th>
        </tr>';
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . $student[$id] . "</td>
            <td>" . $row["year"] . "</td>
            <td>".$row["semester"]."</td>
            <td>".$row["grade"]."</td>
            <td><a href=\"update_grade.php?id=".$row["id"]."\">Update</a></td>";
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo "<p>No grades found!!</p>";
    }
}
echo '<br/><center><a href="students.php">Go Back</a></center>';
pageFooter($conn);
?>