<?php
include "../main.php";
isTeacher();
pageHeader('Remove a Sudent');
echo '<h1>Remove Student</h1>';
// sql to delete a record
$sql = "DELETE FROM students WHERE id=".$_GET['id']."";

if ($conn->query($sql) === TRUE) {
  echo "<p>Student deleted successfully</p>";
} else {
  echo "Error deleting notice: " . $conn->error;
}
echo '<br/><center><a href="students.php">Go Back</a></center>';
pageFooter($conn);
?>