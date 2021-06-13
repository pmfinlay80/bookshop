<?php
session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}
$page_title = "Update Book Price";
include ('includes/header.html');
require ('../connect_db.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$title = htmlspecialchars($_POST['title']);
		$query = "SELECT price FROM book WHERE title = '$title'";
		$result = mysqli_query ($dbc, $query);
		if (mysqli_num_rows($result)>=1)
		{		
			if (!empty( $_POST ['price']))
			{
				$price = htmlspecialchars($_POST['price']);
				if(is_numeric($price))
				{
					$q = "UPDATE book SET price = '$price' WHERE title = '$title'";
					$r = mysqli_query ($dbc, $q);

					if ($r==TRUE)
					{
						echo '<h2>Price Updated!</h2>';
					}
					else
					{
						echo '<h2>ERROR!</h2>';
					}
				}
				else
				{
					echo '<h2>Enter Valid Price!</h2>';
				}
			}
			else
			{
				echo '<h2>Enter New Price!</h2>';
			}
		}	
		else
		{
			echo "<h2>No record of book $title!</h2>";
		}
	mysqli_close($dbc);
	}
?>
 
<form class="form" action="updateprice.php" method ="POST">
<fieldset> 
<legend>Update Price</legend>
	<label> Enter Title</label>
	<input type="text" name="title" value = "<?php if (isset( $_POST['title']))
		echo $_POST['title'];?>"><br>
	<label> Enter New Price</label>
	<input type="text" name="price" value = "<?php if (isset( $_POST['price']))
		echo $_POST['price'];?>"><br>
	<br><br>
	<input type = "submit" value="Update">
	<input type = "reset">
</fieldset>
</form>

<a href="goodbye.php">Log Out</a> | <a href="admin.php">Admin Page</a>

<?php 

include('includes/footer.html');
?>