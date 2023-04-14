<?php
include "main.php";
pageHeader('Notices');
echo '<h1>Notices</h1>';
$sql = "SELECT * FROM notices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Published at: " . $row["date"] . ", By: " . $row["published_by"] . "<br/>
        <div class=\"notice\">
        <p class=\"notice_body\">" . $row["notice"] . "</p>
        Applicable for: Class " . $row["published_for"] . " (Valid till: " . $row["valid_till"] . ")</div><br/>";
    }
} else {
    echo "No notices!";
}
pageFooter($conn);
?>