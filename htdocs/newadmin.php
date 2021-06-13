<?php
session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}

	$page_title = "Add New Administrator";
	include ('includes/header.html');
	require ('../connect_db.php');
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if (!empty( $_POST ['email']))
		{	
			$email = htmlspecialchars($_POST['email']);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				echo '<h2>Please enter a valid email</h2>';	
			}
			else
			{
				$query = "SELECT admin FROM users WHERE email = '$email'";
				$result = mysqli_query ($dbc, $query);
				if (mysqli_num_rows($result)==1)
				{		
						$q = "UPDATE users SET admin = 1 WHERE email = '$email'";
						$r = mysqli_query ($dbc, $q);

						if ($r==TRUE)
						{
							echo '<h2>Administrator Account Activated!</h2>';
						}
						else
						{
							echo 'ERROR!';
						}
				}
				else
				{
					echo '<h2>No registered user! <a href="register.php">Register Here</a></h2>';
				}
			}
		}
	mysqli_close($dbc);
	}
?>

<form class="form" action="newadmin.php" method ="POST">
<fieldset> 
<legend>Add New Admin</legend>

<label>Enter User Email:</label>
<input type ="text" name="email"
		value = "<?php if (isset( $_POST['email']))
		echo $_POST['email'];?>">
<p>
<input type="submit" value="Update">
</p>
</fieldset>
</form>

<a href="goodbye.php">Log Out</a> | <a href="admin.php">Admin Page</a>
<?php include('includes/footer.html');?>