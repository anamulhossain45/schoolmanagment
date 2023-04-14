<?php
include "../main.php";
isTeacher();
pageHeader('Daily Attendences');
$class = $_GET['class'];
if (empty($class)) {
    echo '<h1>Select Class</h1>
    <a href="attendences.php?class=6">&raquo; Class 6</a><br/>
    <a href="attendences.php?class=7">&raquo; Class 7</a><br/>
    <a href="attendences.php?class=8">&raquo; Class 8</a><br/>
    <a href="attendences.php?class=9">&raquo; Class 9</a><br/>
    <a href="attendences.php?class=10">&raquo; Class 10</a><br/>
    <h1>View Previous Attendences</h1>
    <a href="view_attendence.php">&raquo; View attendences</a><br/>';

} else {
    echo '<h1>Attendences of Class ' . $class . '</h1>
Date: ' . date("d-m-Y") . '<br/><br/>';
    $sql = "SELECT * FROM students WHERE class=" . $class . "";
    $result = $conn->query($sql);
    if (isset($_POST['submit'])) {
      while ($row = $result->fetch_assoc()) {
        $student_roll = "roll_".$row["roll"];
        if(isset($_POST[$student_roll])) {
          $presence[] = $row["roll"];
        } else {
          $absence[] = $row["roll"];
        }
      }
      echo $present = implode(",",$presence);
      echo $absent = implode(",",$absence);
        $sql = "INSERT INTO attendences (id, date, class, teacher, present, absent) VALUES ('".$class.date("dmY")."', '" . date("d-m-Y") . "', '" . $class . "', '" . $_SESSION['name'] . "', '" . $present . "', '" . $absent . "')";

        if ($conn->query($sql) === true) {
            echo "<p>Presences of class ".$class." taken successfully</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        if ($result->num_rows > 0) {
            // output data of each row
            echo '<form method="post" action="attendences.php?class=' . $class . '">
    <table style="width:100%">
    <tr>
      <th style="width:10%; text-align: left;">Roll no.</th>
      <th style="width:80%; text-align: left;">Name</th>
      <th style="width:10%; text-align: left;">Present</th>
    </tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
        <td>' . $row["roll"] . '</td>
        <td>' . $row["name"] . '</td>
        <td><input type="checkbox" id="roll_' . $row["roll"] . '" name="roll_' . $row["roll"] . '" value="1"></td>
      </tr>';
            }
            echo '</table>
    <button name="submit" type="submit">Save</button>
    </form>';
        } else {
            echo "No Students found in class " . $class . "!";
        }
    }
}
echo '<br/><center><a href="attendences.php">Go Back</a></center>';
pageFooter($conn);
?>
