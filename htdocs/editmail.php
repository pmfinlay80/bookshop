<?php
session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}

	$page_title = "Edit Email";
	include ('includes/header.html');
	require ('../connect_db.php');
	$id = $_SESSION['id'];
	$q = "SELECT * FROM users WHERE id = $id";
	$r = mysqli_query($dbc, $q);
	
	if (mysqli_num_rows($r)==1)
	{
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if (!empty( $_POST ['email']))
			{
				$email = htmlspecialchars($_POST['email']);
				if(!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					echo '<h2>Please enter a valid email!</h2>';
				}
				else
				{
					$qry = "UPDATE users SET email = '$email' WHERE id = '$id'";
					$rst = mysqli_query ($dbc, $qry);

					if ($rst==TRUE)
					{
						echo '<h2>Email Updated!</h2>';
					}
				}
			}
				else
				{
					echo "<h2>Enter new email address!</h2>";
				}
			
					
		}

		mysqli_close($dbc);
	}

?>

<form class="form" action="editmail.php" method ="POST">
<fieldset> 
<legend>Update Email</legend>

<label>Enter New Email:</label>
<input type ="text" name="email"
		value = "<?php if (isset( $_POST['email']))
		echo $_POST['email'];?>">
<p>
<input type="submit" value="Update">
</p>
</fieldset>
</form>
<?php include('includes/footer.html');?>