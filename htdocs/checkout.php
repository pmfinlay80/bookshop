<?php

session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}

$page_title = 'Checkout';
include ('includes/header.html');
echo '<h1>Checkout</h1>';
if(isset($_GET['total'])
 && ($_GET['total'] >0)
 && (!empty($_SESSION['cart'])))

{
	require ('../connect_db.php');

	$q = "INSERT INTO orders (id, total, order_date) VALUES (".$_SESSION['id'].",".$_GET['total'].", NOW())";
	$r = mysqli_query($dbc, $q);
	$order_id = mysqli_insert_id( $dbc);
	$q = "SELECT * FROM book WHERE id IN (";
	foreach ($_SESSION['cart'] as $id => $value)
	{$q.= $id.',';}
	$q = substr ($q, 0, -1). ') ORDER BY id ASC';
	$r = mysqli_query ($dbc, $q);

	while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
	{
		$query = "INSERT INTO order_contents
			(order_id, id, quantity, price)
			VALUES ($order_id, ".$row['id'].",".
			$_SESSION['cart'][$row['id']]['quantity']. ",".
			$_SESSION['cart'][$row['id']]['price']. ")";
		$result = mysqli_query ($dbc, $query);
	}
	mysqli_close ($dbc);
	echo "<p> Thank you for your order. Your Order No. is #".$order_id."</p>";
	echo '<p><a href="goodbye.php">Logout</a></p>';
	$_SESSION['cart'] = NULL;

}
else
{
	echo '<p>There are no items in your cart!</p>';
}

echo'<p><a href="cart.php">View Cart</a> | <a href="shop.php">Continue Shopping</a></p>';
include ('includes/footer.html');

?>