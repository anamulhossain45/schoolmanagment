<?php
include "../main.php";
isTeacher();
pageHeader('Add Notice');
echo '<h1>Add a Notice</h1>';
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO notices (date, notice, published_by, published_for, valid_till) VALUES ('".$_POST['date']."', '".$_POST['notice']."', '".$_SESSION['name']."', '".$_POST['classes']."', '".$_POST['valid_till']."')";

    if ($conn->query($sql) === true) {
        echo "<p>Notice added successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else {
    ?>
<form method="post" class="space" action="add_notice.php">
<label for="date">Publish Date:</label><br/>
<input type="text" name="date" id="date" value="<?php echo date('d-m-Y'); ?>"><br/>
<label for="notice">Notice:</label><br/>
<textarea name="notice" id="notice"></textarea><br/>
<label for="classes">Applicable Classes (Seperate be comma):</label><br/>
<input type="text" name="classes" id="classes" placeholder="e.g.: 6,8,10"><br/>
<label for="valid_till">Valid till (date):</label><br/>
<input type="text" name="valid_till" id="valid_till" placeholder="e.g.: 10-12-2020"><br/>
<button name="submit" type="submit">Add</button>
</form>
<?php
}
echo '<br/><center><a href="notices.php">Go Back</a></center>';
pageFooter($conn);
?>