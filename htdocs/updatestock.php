<?php
session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}
$page_title = "Update Stock Level";
include ('includes/header.html');
require ('../connect_db.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$title = htmlspecialchars($_POST['title']);
		$query = "SELECT noinstock FROM book WHERE title = '$title'";
		$result = mysqli_query ($dbc, $query);
		if (mysqli_num_rows($result)>=1)
		{		
			if (!empty( $_POST ['stock']))
			{
				$stock = htmlspecialchars($_POST['stock']);
				if(is_numeric($stock))
				{
					$q = "UPDATE book SET noinstock = '$stock' WHERE title = '$title'";
					$r = mysqli_query ($dbc, $q);

					if ($r==TRUE)
					{
						echo '<h2>Stock Level Updated!</h2>';
					}
					else
					{
						echo '<h2>ERROR!</h2>';
					}
				}
				else
				{
					echo '<h2>Enter Valid Number!</h2>';
				}
			}
			else
			{
				echo '<h2>Enter New Stock Level!</h2>';
			}
		}	
		else
		{
			echo "<h2>No record of book $title!</h2>";
		}
	mysqli_close($dbc);
	}
?>
 
<form class="form" action="updatestock.php" method ="POST">
<fieldset> 
<legend>Update Stock Level</legend>
	<label> Enter Title</label>
	<input type="text" name="title" value = "<?php if (isset( $_POST['title']))
		echo $_POST['title'];?>"><br>
	<label> Enter Number in Stock</label>
	<input type="text" name="stock" value = "<?php if (isset( $_POST['stock']))
		echo $_POST['stock'];?>"><br>
	<br><br>
	<input type = "submit" value="Update">
	<input type = "reset">
</fieldset>
</form>

<a href="goodbye.php">Log Out</a> | <a href="admin.php">Admin Page</a>

<?php 

include('includes/footer.html');
?>