<?php
// turn off php notices
error_reporting(E_ALL & ~E_NOTICE);

// make a mysql database connection and save it to a variable named conn
$db_host = "localhost"; // database hostname
$db_user = "root"; // database username
$password = ""; // database password
$db_name = "school"; // database name

// make the connection
$conn = new mysqli($db_host, $db_user, $password,$db_name);

session_start();

$days = array('sat'=>'Saturday', 'sun'=>'Sunday', 'mon'=>'Monday', 'tue'=>'Tuesday', 'wed'=>'Wednesday', 'thu'=>'Thursday');

function pageHeader($title) {
    echo '<!DOCTYPE html>
    <html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="/styles.css">
    <script src="/scripts.js"></script>
    <title>'.$title.'</title>
    </head>
    <body>
    <div class="topnav" id="myTopnav">
      <a href="/"><i class="fas fa-home"></i> Home</a>
      <a href="/students"><i class="fas fa-graduation-cap"></i> Students Zone</a>
      <a href="/teachers"><i class="fas fa-chalkboard-teacher"></i> Teachers Zone</a>
      <a href="notices.php"><i class="fas fa-newspaper"></i> Notices</a>
      <a href="routines.php"><i class="fas fa-table"></i> Routine</a>
      <a href="javascript:void(0);" class="icon" onclick="toggleNavigaton()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    <div class="wrapper">';
}

function pageFooter($conn) {
  echo '</div>
  <div class="footer">
  &copy; Sarail Annada High School
  </div>
  <script>
function toggleNavigaton() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  </script>
  </body>
  </html>';
// close the database connection
$conn->close();
}

function isStudent() {
  if(!isset($_SESSION['student'])) {
    echo 'You are not logged in as student. Please <a href="/students/">login</a> first!';
    print_r($_SESSION);
    exit();
  }
}

function isTeacher() {
  if(!isset($_SESSION['teacher'])) {
    echo 'You are not logged in as Teacher. Please <a href="/teachers/">login</a> first!';
    exit();
  }
}
?>