<?php
include "../main.php";
isTeacher();
pageHeader('Manage Notices');
echo '<h1>Notices</h1>
<p><a href="add_notice.php">&raquo; Publish a Notice</a></p><br/>';
$sql = "SELECT * FROM notices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Published at: " . $row["date"] . ", By: " . $row["published_by"] . "<br/>
        <div class=\"notice\"><p class=\"notice_body\">" . $row["notice"] . "</p>
        Applicable for: Class " . $row["published_for"] . " (Valid till: " . $row["valid_till"] . ")<br/>
        Manage: <a href=\"remove_notice.php?id=" . $row["id"] . "\">Remove</a></div><br/>";
    }
} else {
    echo "No notices!";
}
echo '<br/><center><a href="students.php">Go Back</a></center>';
pageFooter($conn);
?>
