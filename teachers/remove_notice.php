<?php
include "../main.php";
isTeacher();
pageHeader('Remove Notice');
echo '<h1>Remove Notice</h1>';
// sql to delete a record
$sql = "DELETE FROM notices WHERE id=".$_GET['id']."";

if ($conn->query($sql) === TRUE) {
  echo "<p>Notice deleted successfully</p>";
} else {
  echo "Error deleting notice: " . $conn->error;
}
echo '<br/><center><a href="notices.php">Go Back</a></center>';
pageFooter($conn);
?>