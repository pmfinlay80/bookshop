<?php

if ($_SERVER[ 'REQUEST_METHOD'] == 'POST')
{
	require ('../connect_db.php');
	require ('login_tools.php');
	
	list ($check, $data) = validate ($dbc, $_POST['email'], $_POST['pass']);
	
	if ($check)
	{
		session_start();
		
		$_SESSION['id'] = $data['id'];
		$_SESSION['firstName'] = $data['firstName'];
		$_SESSION['surname'] = $data['surname'];
		$_SESSION['admin'] = $data['admin'];
		
		
		$_SESSION['CREATED'] = time();
		if (time() - $_SESSION['CREATED'] > 1800) 
		{
		// session started more than 30 minutes ago
		session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
		$_SESSION['CREATED'] = time();  // update creation time
		}
		
		if ($data['admin'] == 1)
			{
				load('admin.php');
			}
		else 
			{
				load('home.php');
			}
	}
	else
	{
		$errors = $data;
	}
	mysqli_close($dbc);
}

include('login.php');