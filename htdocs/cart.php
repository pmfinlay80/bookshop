<?php

session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}

$page_title = 'Cart';
include ('includes/header.html');
echo '<h1>Shopping Cart</h1>';

$total = 0;

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
	
	 echo '<form action="cart.php" method="POST"><table>
    <tr><th colspan ="5"><h2>Items in your cart</h2></th></tr><tr>';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
    {
		$subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $_SESSION['cart'][$row['id']]['price'];
		$total += $subtotal;

		echo "<tr><td>{$row['title']}</td>
		<td>by ({$row['author']})</td>
		<td> Qty:{$_SESSION['cart'][$row['id']]['quantity']}</td>
		<td> @ {$row['price']} = </td>
		<td>".number_format ($subtotal, 2)."</td>
		<td><a href='empty.php'>Remove</a></td></tr>";
    }
	echo '<tr><td colspan = "5">
    <strong><br>Subtotal</strong> = '.number_format( $total, 2),'</td></tr>';
	//mathematical operation - 10% discount on all orders over €60
	if($total>60)
	{
		$total = $total * .9;
		echo '<h2>10% discount applied</h2>';
	}
	echo '<tr></tr>';
    echo '<tr><td colspan = "5">
    <strong>Total</strong> = '.number_format( $total, 2),'</td></tr>
    </table>
    </form>';

    mysqli_close($dbc);
}
else
{
	echo '<p>There are no items in your cart!</p>';
}
echo '<p><a href="checkout.php?total='.$total.'">Checkout</a> | <a href="shop.php">Continue Shopping</a></p> ';
include ('includes/footer.html');

?>