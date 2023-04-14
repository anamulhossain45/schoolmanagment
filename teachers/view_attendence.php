<?php
include "../main.php";
pageHeader('View Attendences');
$date = $_POST['date'];
$class = $_POST['class'];
if (empty($date) || empty($class)) {
    ?>
<form method="post" action="view_attendence.php">
<label for="date">Date:</label><br/>
<input type="text" name="date" id="date" placeholder="e.g.: 01-10-2020"><br/>
<label for="class">Class:</label><br/>
<input type="number" name="class" id="class" value="6"><br/>
<button name="submit" type="submit">View</button>
</form>
<?php
} else {
    echo '<h1>Attendence of class '.$class.' from '.$date.'</h1>';
    $sql = "SELECT * FROM attendences WHERE class=".$class." AND date='".$date."'";
    $result = $conn->query($sql);
    $sql = "SELECT * FROM students WHERE class=".$class."";
    $students = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $present_rolls = explode(",",$row['present']);
        }
    }

    if ($result->num_rows > 0) {
        // output data of each row
        echo '<table style="width:100%">
        <tr>
          <th style="width:10%; text-align: left;">Roll no.</th>
          <th style="width:80%; text-align: left;">Name</th>
          <th style="width:10%; text-align: left;">Present</th>
        </tr>';
        while ($row = $students->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["roll"] . "</td>
            <td>" . $row["name"] . "</td>";
            if(in_array($row["roll"], $present_rolls)) {
                echo "<td>Yes</td>";
            } else {
                echo "<td>No</td>";
            }
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo "Nothing found!";
    }
}
echo '<br/><center><a href="attendences.php">Go Back</a></center>';
pageFooter($conn);
?>