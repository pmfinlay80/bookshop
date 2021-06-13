<?php
session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}

$page_title = "Account";
include ('includes/header.html');

	require ('../connect_db.php');
	$id = $_SESSION['id'];
	$q = "SELECT * FROM users WHERE id = $id";
	$r = mysqli_query($dbc, $q);

			if (mysqli_num_rows($r)==1)
			{
				echo '<h1>Account Details</h1>';
				while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
				{
				echo ' <div id="templatemo_content_right">
				<ul>
					<li><strong>Name: </strong>'.$row["firstName"].' '.$row["surname"].'</li>
					<li><strong>Email: </strong> '.$row["email"].'</li>
				</ul>
				<a href="editmail.php">Update Email</a> | <a href="changepass.php">Change Password</a>';
				if ($row['admin'] == 1)
				{
				echo ' | <a href = "admin.php">Update Site</a>';
				}
				echo '<div class="cleaner_with_height">&nbsp;</div>
				</div>';
				}
			}
			else
			{
				echo "No user by this name";
			}
			
			echo '<h2>Order History</h2>';
			$qry = "SELECT * FROM orders WHERE id = $id";
			$rst = mysqli_query($dbc, $qry);
	
			if (mysqli_num_rows($rst)>=1)
			{
				while ($row = mysqli_fetch_array($rst, MYSQLI_ASSOC))
				{
				echo ' 
				<ul>
					<li><strong>Order No:</strong> '.$row["order_id"].'   <strong>Order Date:</strong> '.$row["order_date"].'   <strong>Total:</strong> '.$row["total"].'</li>
				</ul>';
				}
			}
			else
			{
				echo "No orders";
			}	
			
			
		mysqli_close($dbc);
		
		echo'<div class="cleaner_with_height">&nbsp;</div>';


?>
 

<?php include('includes/footer.html');?>