<?php
session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}
$page_title = "Delete Book";
include ('includes/header.html');
require ('../connect_db.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if (!empty( $_POST ['title']))
		{
			$title = htmlspecialchars($_POST['title']);
			$query = "SELECT * FROM book WHERE title = '$title'";
			$result = mysqli_query ($dbc, $query);
			if (mysqli_num_rows($result)>=1)
			{		
				$q = "DELETE FROM book WHERE title = '$title'";
				$r = mysqli_query ($dbc, $q);

				if ($r==TRUE)
				{
					echo '<h2>Record Deleted!</h2>';
				}
				else
				{
					echo '<h2>ERROR!</h2>';
				}
			}
			else
			{
				echo "<h2>No record for book titled $title!</h2>";
			}
		}
		else
		{
			echo '<h2>Enter title of book you wish to delete!</h2>';
		}
	}
	mysqli_close($dbc);
	
?>
 
<form class="form" action="deletebook.php" method ="POST">
<fieldset> 
<legend>Delete Book</legend>
	<label> Enter Title</label>
	<input type="text" name="title" value = "<?php if (isset( $_POST['title']))
		echo $_POST['title'];?>"><br>
	<br><br>
	<input type = "submit" value="Delete">
	<input type = "reset">
</fieldset>
</form>

<a href="goodbye.php">Log Out</a> | <a href="admin.php">Admin Page</a>

<?php 

include('includes/footer.html');
?>