<?php
session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}

	$page_title = "Change Password";
	include ('includes/header.html');
	require ('../connect_db.php');
	$errors = array();
	$id = $_SESSION['id'];
	$q = "SELECT * FROM users WHERE id = $id";
	$r = mysqli_query($dbc, $q);

	if (mysqli_num_rows($r)==1)
	{

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if (!empty( $_POST ['pass1']))
			{
				if ( $_POST ['pass1'] != $_POST['pass2'])
				{
					$errors[] = 'Passwords do not match!';
				}
				else
				{
					$p = htmlspecialchars($_POST['pass1']);

				}
			}
			else
			{
				$errors[] = "Enter new password!";
			}

			if ( empty( $errors))
			{
			$qry = "UPDATE users SET pass = SHA1('$p') WHERE id = '$id'";
			$rst = mysqli_query ($dbc, $qry);

			if ($rst==TRUE)
				{
					echo '<h2>Password Changed!</h2>';
				}
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
	}

?>

<form class="form" action="changepass.php" method ="POST">
<fieldset>
<legend>Change Password</legend>
<label>Password:</label>
<input type ="password" name="pass1"
		value = "<?php if (isset( $_POST['pass1']))
		echo $_POST['pass1'];?>">
<label>Confirm Password:</label>
<input type ="password" name="pass2"
			value = "<?php if (isset( $_POST['pass2']))
		echo $_POST['pass2'];?>">
<p>
<input type="submit" value="Update">
</p>
</fieldset>
</form>
<?php include('includes/footer.html');?>