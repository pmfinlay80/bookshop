<?php

$page_title = "Register";
include ('includes/header.html');
echo'<h1>Register</h1>';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require ('../connect_db.php');
	$errors = array();

	if (empty( $_POST ['firstName']))
		{
			$errors[] = 'Enter first name';
		}
		else
		{
			$fn = htmlspecialchars($_POST['firstName']);
		}

	if (empty( $_POST ['surname']))
		{
			$errors[] = 'Enter last name';
		}
		else
		{
			$ln = htmlspecialchars($_POST['surname']);
		}
	
	if (empty( $_POST ['email']))
		{
			$errors[] = 'Enter email address';
		}
		else
		{
			$e = htmlspecialchars($_POST['email']);
			if(filter_var($e, FILTER_VALIDATE_EMAIL))
			{
				$e;
			}
			else
			{
				$errors[] = 'Please enter a valid email';
			}	
		}
		
	if (!empty( $_POST ['pass1']))
	{
		if ( $_POST ['pass1'] != $_POST['pass2'])
		{
			$errors[] = 'Passwords do not match';
		}
		else
		{
			$p = htmlspecialchars($_POST['pass1']);
		}
	}
	else
	{
		$errors[] = "Enter your password";
	}

	if (empty($errors))
	{
		$q = "SELECT id FROM users WHERE email = '$e'";
		$r = mysqli_query ($dbc, $q);
		if (mysqli_num_rows ($r) != 0)
		{
			$errors[] = 'Email address already registered <a href="login.php">LOGIN</a>';
		}
	}

	if ( empty( $errors))
	{
	$q = "INSERT INTO users (firstName, surname, email, pass, regDate)
	VALUES ('$fn', '$ln', '$e', SHA1('$p'), NOW())";
	$r = mysqli_query ($dbc, $q);

	if ($r)
	{
		echo '<h1>Registered!</h1>
		<p>You are now registered</p>
		<p><a href="login.php">Login</a></p>';
	}
	mysqli_close( $dbc);
	include('includes/footer.html');
	exit();
	}

else
{
   echo '<h1>Error!</h1>
   <p id="err_msg">The following error(s) occured:<br>';
   foreach($errors as $msg)
   {
   	   echo "- $msg<br>";
   }
   echo 'Please try again.</p>';
   mysqli_close($dbc);
}

}
?>

<form class="form" action="register.php" method ="POST">
<fieldset> 
<legend>Register</legend>
<label>First Name:</label> 
<input type ="text" name="firstName"
		value = "<?php if (isset( $_POST['firstName']))
		echo $_POST['firstName'];?>">
<label>Last Name:</label>
<input type ="text" name="surname"
		value = "<?php if (isset( $_POST['surname']))
		echo $_POST['surname'];?>">
<label>Email Address:</label>
<input type ="text" name="email"
		value = "<?php if (isset( $_POST['email']))
		echo $_POST['email'];?>">
<label>Password:</label>
<input type ="password" name="pass1"
		value = "<?php if (isset( $_POST['pass1']))
		echo $_POST['pass1'];?>">
<label>Confirm Password:</label> 
<input type ="password" name="pass2"
			value = "<?php if (isset( $_POST['pass2']))
		echo $_POST['pass2'];?>">

<p>
<input type="submit" value="Register">
</p>
</fieldset>
</form>
<?php include('includes/footer.html');?>