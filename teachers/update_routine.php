<?php
include "../main.php";
isTeacher();
pageHeader('Update Routines');
echo '<h1>Update Routines</h1>';
$sql = "SELECT * FROM routines WHERE id=" . $_GET['id'] . "";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if(isset($_POST['submit'])) {
        $sql = "UPDATE routines SET p1='" . $_POST['p1'] . "', p2='" . $_POST['p2'] . "', p3='" . $_POST['p3'] . "', p4='" . $_POST['p4'] . "', p5='" . $_POST['p5'] . "', p6='" . $_POST['p6'] . "', p7='" . $_POST['p7'] . "' WHERE id=" . $_GET['id'] . "";

    if ($conn->query($sql) === true) {
        echo "<p>Routine updated successfully</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    } else {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<form method="post" class="space" action="update_routine.php?id=' . $row["id"] . '">
            <label for="p1">Period 1 (10:00am to 11:00 am):</label><br/>
            <input type="text" name="p1" id="p1" value="' . $row["p1"] . '"><br/>
            <label for="p2">Period 2 (11:00am to 11:40 am):</label><br/>
            <input type="text" name="p2" id="p2" value="' . $row["p2"] . '"><br/>
            <label for="p3">Period 3 (11:40am to 12:20 am):</label><br/>
            <input type="text" name="p3" id="p3" value="' . $row["p3"] . '"><br/>
            <label for="p4">Period 4 (12:20am to 01:00 pm):</label><br/>
            <input type="text" name="p4" id="p4" value="' . $row["p4"] . '"><br/>
            <label for="p5">Period 5 (02:00pm to 02:40 pm):</label><br/>
            <input type="text" name="p5" id="p5" value="' . $row["p5"] . '"><br/>
            <label for="p6">Period 6 (02:40pm to 03:20 pm):</label><br/>
            <input type="text" name="p6" id="p6" value="' . $row["p6"] . '"><br/>
            <label for="p7">Period 7 (03:20pm to 04:00 pm):</label><br/>
            <input type="text" name="p7" id="p7" value="' . $row["p7"] . '"><br/>
            <button name="submit" type="submit">Update</button>
            </form>';
    }
}
echo '<br/><br/><center><a href="routines.php">Go Back</a></center>';
} else {
    echo "Routine not found!";
}
pageFooter($conn);
