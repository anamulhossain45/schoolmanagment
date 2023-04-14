<?php
include "../main.php";
isTeacher();
$id = $_GET['id'];
pageHeader('Update Grade');
echo '<h1>Update Grade</h1>';
if (isset($_POST['submit'])) {
    $sql = "UPDATE grades SET year='" . $_POST['year'] . "', semester='" . $_POST['semester'] . "', grade='" . $_POST['grade'] . "' WHERE id=" . $id . "";

    if ($conn->query($sql) === true) {
        echo "<p>Grade updated successfully</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM grades WHERE id=" . $id . "";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            ?>
<form method="post" class="space" action="update_grade.php?id=<?php echo $id; ?>">
<label for="year">Year:</label><br/>
<input type="number" name="year" id="year" value="<?php echo $row['year']; ?>"><br/>
<label for="semester">Semester:</label><br/>
<input type="text" name="semester" id="semester" value="<?php echo $row['semester']; ?>"><br/>
<label for="grade">Grade:</label><br/>
<input type="text" name="grade" id="grade" value="<?php echo $row['grade']; ?>"><br/>

<button name="submit" type="submit">Update</button>
</form>
<?php
}
    } else {
        echo "No grade found with the provided ID!";
    }
}
echo '<br/><center><a href="students.php">Go Back</a></center>';
pageFooter($conn);
?>