<?php

session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}

$page_title = 'Shop';
include ('includes/header.html');
echo '<a href="search.php">Refine Search</a><br>';
require ('..\connect_db.php');

$q = "SELECT * FROM book ORDER BY title ASC";
$r = mysqli_query ($dbc, $q);
if (mysqli_num_rows($r)>0)
{

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
				echo '<h2>Currently Unavailable</h2>';
			}
            echo '<div class="cleaner_with_height">&nbsp;</div>
			</div>';

}

mysqli_close($dbc);
}

echo'<div class="cleaner_with_height">&nbsp;</div>';

	
include ('includes/footer.html');

?>