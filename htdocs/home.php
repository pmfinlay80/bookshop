
<?php

session_start();

if (!isset($_SESSION['id']))
{
	require ('login_tools.php');
	load();
}

$page_title ='Home';
include ('includes/header.html');


echo "<h2>Welcome
{$_SESSION['firstName']} {$_SESSION['surname']}!</h2>";


include('includes/footer.html');

?>