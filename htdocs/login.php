
<?php

$page_title = 'Login';
include ('includes/header.html');
echo'<h1>Login</h1>';
if (isset($errors) && !empty($errors))
{
	echo '<p id="err_msg">Oops! There was a problem:<br>';
	foreach( $errors as $msg)
	{
		echo " - $msg<br>";
	}
	echo 'Please try again or <a href="register.php">Register</a></p>';
}

?>


<form class="form"action="login_action.php" method="POST">
<fieldset> 
<legend>Login</legend>
<label>Email Address:</label><input type="text" name="email"><br>
<label>Password:</label><input type="text" name="pass"><br>
<p><input type="submit" value="Login"></p>
</fieldset
</form>

<?php include('includes/footer.html'); ?>