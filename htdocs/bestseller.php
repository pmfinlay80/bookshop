<?php

session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}

$page_title = 'Best Sellers';
include ('includes/header.html');

require ('..\connect_db.php');

$q = "SELECT book.id, book.title, book.author, book.price, book.image, book.isbn, book.reldate, book.info, book.noinstock
FROM order_contents
INNER JOIN book ON order_contents.id=book.id ORDER BY order_contents.quantity DESC LIMIT 5";
$r = mysqli_query ($dbc, $q);
if (mysqli_num_rows($r)>0)
{
echo'<h2>TOP 5 BEST SELLERS</h2>';
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
{
	echo ' <div id="templatemo_content_right">
			<h1>'.$row["title"].'<span>(by '.$row["author"].')</span></h1>
            <div class="image_panel"><img src="'.$row["image"].'" alt="Book Cover" width="100" height="150" /></div>
            <ul>
	            <li>Author: '.$row["author"].'</li>
            	<li>Release Date: '.$row["reldate"].'</li>
                <li>ISBN 13: '.$row["isbn"].'</li>
				<li>Price: &euro;'.$row["price"].'</li>
            </ul>
            
            <p>'.$row["info"].'</p>
			<div class="cleaner_with_height">&nbsp;</div>';
			if($row["noinstock"]>=1)
			{
				echo '<div class="buy_now_button"><a href="added.php?id='.$row['id'].'">Buy Now</a></div>';
			}
			else
			{
				echo '<h2>Out of Stock</h2>';
			}
            echo '<div class="cleaner_with_height">&nbsp;</div>
			</div>';

}

mysqli_close($dbc);
}

echo'<div class="cleaner_with_height">&nbsp;</div>';
    
	
include ('includes/footer.html');

?>