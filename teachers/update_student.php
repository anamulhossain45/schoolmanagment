<?php
include "../main.php";
isTeacher();
$id = $_GET['id'];
pageHeader('Update Student');
echo '<h1>Update Student</h1>';
if (isset($_POST['submit'])) {
    $sql = "UPDATE students SET id='" . $_POST['new_id'] . "', name='" . $_POST['name'] . "', gender='" . $_POST['gender'] . "', dob='" . $_POST['dob'] . "', father='" . $_POST['father'] . "', mother='" . $_POST['mother'] . "', contact='" . $_POST['contact'] . "', password='" . $_POST['password'] . "', class='" . $_POST['class'] . "', roll='" . $_POST['roll'] . "', section='" . $_POST['section'] . "', department='" . $_POST['department'] . "' WHERE id=" . $id . "";

    if ($conn->query($sql) === true) {
        echo "<p>Student updated successfully</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM students WHERE id=" . $id . "";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            ?>
<form method="post" class="space" action="update_student.php?id=<?php echo $id; ?>">
<label for="name">Student Name:</label><br/>
<input type="text" name="name" id="name" placeholder="MD Anamul Hossain"><br/>
<label for="gender">Gender:</label><br/>
<input type="text" name="gender" id="gender" placeholder="Male"><br/>
<label for="dob">Date of birth:</label><br/>
<input type="text" name="dob" id="dob" placeholder="e.g.: 12-12-2004"><br/>
<label for="father">Father's Name:</label><br/>
<input type="text" name="father" id="father" placeholder="e.g.: MD Rahim"><br/>
<label for="mother">Mother's Name:</label><br/>
<input type="text" name="mother" id="mother" placeholder="e.g.: Rehana Akter"><br/>
<label for="dob">Guardian's Conact No.:</label><br/>
<input type="tel" name="contact" id="contact" placeholder="e.g.: 01711111111"><br/>
<label for="id">Student ID:</label><br/>
<input type="number" name="id" id="id" placeholder="e.g.: 10235"><br/>
<label for="password">Password:</label><br/>
<input type="text" name="password" id="password"><br/>
<label for="class">Class:</label><br/>
<input type="number" name="class" id="class" placeholder="e.g.: 6"><br/>
<label for="roll">Roll no.:</label><br/>
<input type="number" name="roll" id="roll" size="2"><br/>
<label for="section">Section:</label><br/>
<input type="text" name="section" id="section" size="1"><br/>
<label for="department">Department:</label><br/>
<input type="text" name="department" id="department" placeholder="e.g.: Science"><br/>
<button name="submit" type="submit">Update</button>
</form>
<?php
}
    } else {
        echo "No student found with the provided ID!";
    }
}
echo '<br/><center><a href="students.php">Go Back</a></center>';
pageFooter($conn);
?>