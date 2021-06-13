<?php

function load($page = 'login.php')
{
	$url = 'http://'.$_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']);
	$url = rtrim($url, '/\\');
	$url.='/'.$page;
	header("Location: $url");
	exit();
}

function validate($dbc, $email = '', $pwd = '')
{
	$errors = array();

	if (empty( $email))
		{
			$errors[] = 'Enter email address';
		}
		else
		{
			$e = htmlspecialchars($email);
		}

	if (empty( $pwd))
		{
			$errors[] = 'Enter password';
		}
		else
		{
			$p = htmlspecialchars($pwd);
		}

	if (empty( $errors))
		{
			$q = "SELECT id, firstName, surname, admin FROM users WHERE email = '$e' AND pass = SHA1('$p')";
			$r = mysqli_query ($dbc, $q);


		if (mysqli_num_rows($r)==1)
		{
			$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
			return array(true, $row);
		}
		else
		{
			$errors[] = 'Email address and password not found';
		}
	return array(false, $errors);
		}
}
?>