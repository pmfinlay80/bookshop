<?php

session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}

$page_title = 'Cart Addition';
include ('includes/header.html');

if (isset( $_GET['id'])) $id = $_GET['id'];

require ('../connect_db.php');

$q = "SELECT * FROM book WHERE id = $id";
$r = mysqli_query ($dbc, $q);
if (mysqli_num_rows($r)==1)
{
	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
	
	if(isset($_SESSION['cart'][$id]))
		{
			$_SESSION['cart'][$id]['quantity'] = $_SESSION['cart'][$id]['quantity']+1;
			echo '<p>'.$row["title"].' has been added to your cart</p>';
			
			$stock = $row['noinstock']-1;
			$qry = "UPDATE book SET noinstock = '$stock' WHERE id = '$id'";
			$rst = mysqli_query ($dbc, $qry);
		}
	else
		{
			$_SESSION['cart'][$id] = array ('quantity' => 1, 'price' => $row['price']);
			echo '<p>'.$row["title"].' has been added to your cart</p>';
			
			$stock = $row['noinstock']-1;
			$qry = "UPDATE book SET noinstock = '$stock' WHERE id = '$id'";
			$rst = mysqli_query ($dbc, $qry);
		}
}


mysqli_close($dbc);


echo'<p><a href="cart.php">View Cart</a> | <a href="shop.php">Continue Shopping</a></p>';
include ('includes/footer.html');

?>