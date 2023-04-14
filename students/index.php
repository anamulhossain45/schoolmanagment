<?php
include "../main.php";
// process login
$msg = '';
if(isset($_POST['submit'])) {
    $sql = "SELECT * FROM students WHERE id=".$_POST['id']." AND password='".$_POST['password']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['class'] = $row['class'];
            $_SESSION['student'] = 1;
        }
    } else {
        $msg = '<p>ID or password is wrong. Please try again.</p>';
    }
}

pageHeader('Student Panel');
if(!isset($_SESSION['student'])) {
// teacher is not logged in
?>
<h1>Welcome Dear Student</h1>
<p>You are not logged in currently. Please login to access students panel.</p>
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
<p>You can view all information here available for you. Start viewing by clicking any link below.</p>
<table>
<tr>
<td class="td"><a href="/notices.php"><i class="fas fa-newspaper"></i> Notices from the School</a></td>
<td class="td"><a href="routine.php"><i class="fas fa-table"></i> Your class Routine</a></td>
<td class="td"><a href="grades.php"><i class="fas fa-certificate"></i> Your grades</a></td>
<td class="td"><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></td>
</tr>
</table>

<?php
}
pageFooter($conn);
?>