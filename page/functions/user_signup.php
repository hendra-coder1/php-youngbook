<?php 
require 'mysqliconnect.php';
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
echo $_POST['keepmeloggedin'];

$sql = "INSERT INTO `user_data` (`username`, `name`, `password`) VALUES ('$username', '$name', '$password');";

if(mysqli_query($conn, $sql)) {
	session_start();
	$_SESSION['messagecookie'] = 'Congratulations ! Create a new post';
	setcookie('userlogin', $username, time()+60*60*24, '/');
	// header('Location: ../forum/');
} else {
	echo "Failed" . mysqli_error($conn);
}
?>