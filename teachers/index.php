<?php
include "../main.php";
// process login
$msg = '';
if(isset($_POST['submit'])) {
    $sql = "SELECT * FROM teachers WHERE id=".$_POST['id']." AND password='".$_POST['password']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['teacher'] = 1;
        }
    } else {
        $msg = '<p>ID or password is wrong. Please try again.</p>';
    }
}

pageHeader('Teacher Panel');
if(!isset($_SESSION['teacher'])) {
// teacher is not logged in
?>
<h1>Welcome Teacher</h1>
<p>You are not logged in currently. Please login to access teacher panel.</p>
<?php
if(!empty($msg)) {
    echo $msg;
}
?>
<form method="post" action="index.php">
<label for="id">Your ID:</label><br/>
<input type="number" name="id" id="id" placeholder="e.g.: 1325"><br/>
<label for="password">Password:</label><br/>
<input type="password" name="password" id="password"><br/>
<button name="submit" type="submit">Login</button>
</form>
<?php
} else {
// techer is logged in
?>
<h1>Welcome <?php echo $_SESSION['name']; ?></h1>
<table>
    <tr>
        <td class="td2"><a href="notices.php"><i class="fas fa-newspaper"></i> Notices</a></td>
        <td class="td2"><a href="students.php"><i class="fas fa-graduation-cap"></i> Students</a></td>
        <td class="td2"><a href="attendences.php"><i class="fas fa-check-double"></i> Attendences</a></td>
        <td class="td2"><a href="grades.php"><i class="fas fa-certificate"></i> Grades</a></td>
        <td class="td2"><a href="routines.php"><i class="fas fa-table"></i> Routines</a></td>
        <td class="td2"><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></td>
    </tr>
</table>
<?php
}
pageFooter($conn);
?>