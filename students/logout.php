<?php
include "../main.php";
pageHeader('Logout');
session_destroy();
?>
<h1>Logout</h1>
<p>You have been logged out successfuly! <a href="index.php">Go back</a>.</p>
<?php
pageFooter($conn);
?>