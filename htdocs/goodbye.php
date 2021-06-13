<?php

session_start();

if(!isset ($_SESSION['id']))
{
	require('login_tools.php');
	load();
}

$page_title = "Goodbye";
include('includes/header.html');

$_SESSION = array();

echo'<h1>Goodbye!</h1>
<p> You are now logged out</p>
<a href ="login.php">Login</a></p>';

include ('includes/footer.html');