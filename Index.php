<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'sbpos');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($db,"select username from user where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['username'];

if(!isset($_SESSION['login_user'])){
    header("location:./Pages/Login.php");
    die();
}
else{
    header("location:./Pages/dashbord.php");
    die();
}
?>
<html>

<head>
    <title>Welcome </title>
</head>

<body>
<h1>Welcome <?php echo $login_session; ?></h1>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>

</html>