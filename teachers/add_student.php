<?php
include "../main.php";
isTeacher();
pageHeader('Add Student');
echo '<h1>Add a Student</h1>';
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO students (id, name, gender, dob, father, mother, contact, password, class, roll, section, department) VALUES ('".$_POST['id']."', '".$_POST['name']."', '".$_POST['gender']."', '".$_POST['dob']."', '".$_POST['father']."', '".$_POST['mother']."', '".$_POST['contact']."', '".$_POST['password']."', '".$_POST['class']."', '".$_POST['roll']."', '".$_POST['section']."', '".$_POST['department']."')";

    if ($conn->query($sql) === true) {
        echo "<p>Student added successfully</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else {
    ?>
<form method="post" class="space" action="add_student.php">
<label for="name">Student Name:</label><br/>
<input type="text" name="name" id="name" placeholder="e.g.: MD Anamul Hossain"><br/>
<label for="gender">Gender:</label><br/>
<input type="text" name="gender" id="gender" placeholder="e.g.: Male"><br/>
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
<button name="submit" type="submit">Add</button>
</form>
<?php
}
echo '<br/><center><a href="students.php">Go Back</a></center>';
pageFooter($conn);
?>