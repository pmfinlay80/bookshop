<?php

session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}

$page_title = 'Empty Cart';
include ('includes/header.html');

if (!empty($_SESSION['cart']))
{
    require ('../connect_db.php');
    $q = "SELECT * FROM book WHERE id IN (";
    foreach ($_SESSION['cart'] as $id => $value)
    {
		$q.= $id.',';
    }
    $q = substr( $q, 0, -1).') ORDER BY id ASC';
    $r = mysqli_query ($dbc, $q);
	
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
    {
		$stock = $_SESSION['cart'][$row['id']]['quantity'];
		$stock += $row['noinstock'];
			
		$qry = "UPDATE book SET noinstock = '$stock' WHERE id = '$id'";
		$rst = mysqli_query ($dbc, $qry);
    }
	echo '<h2>Item successfully removed from cart!</h2>';
}
else
{
	echo '<h2>No Items in Cart!</h2>';
}

unset ($_SESSION['cart'][$id]);
	
mysqli_close($dbc);

include ('includes/footer.html');

?>