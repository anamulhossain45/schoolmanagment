<?php
include "../main.php";
isTeacher();
pageHeader('Add Grade');
$id = $_GET['id'];
echo '<h1>Add a Grade</h1>';
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO grades (student_id, year, semester, grade) VALUES ('".$id."', '".$_POST['year']."', '".$_POST['semester']."', '".$_POST['grade']."')";

    if ($conn->query($sql) === true) {
        echo "Grade added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else {
    ?>
<form method="post" class="space" action="add_grade.php?id=<?php echo $id; ?>">
<label for="year">Year:</label><br/>
<input type="number" name="year" id="year"><br/>
<label for="semester">Semester:</label><br/>
<input name="semester" id="semester"/><br/>
<label for="grade">Grade:</label><br/>
<input type="text" name="grade" id="grade"><br/>

<button name="submit" type="submit">Add</button>
</form>
<?php
}
echo '<br/><center><a href="students.php">Go Back</a></center>';
pageFooter($conn);
?>