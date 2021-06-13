<?php
session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}
$page_title = "Book Search";
include ('includes/header.html');
echo'<h2>Search</h2>';
if(isset($_POST["inputValue"]) && isset($_POST["inputType"]) )
		{
			$value =htmlspecialchars($_POST["inputValue"]);
			$cat = htmlspecialchars($_POST["inputType"]);

			require ('../connect_db.php');

			$q = "SELECT * FROM book WHERE $cat LIKE '%$value'";
			$r = mysqli_query($dbc, $q);

			if (mysqli_num_rows($r)>=1)
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
				echo '<h2>Out of Stock</h2>';
			}
            echo '<div class="cleaner_with_height">&nbsp;</div>
				</div>';
				}
			}
			else
			{
				echo '<h2>No Matching Listings - Please check spelling or try a different search!</h2>
				<a href="shop.php">Shop All</a>';
			}
				mysqli_close($dbc);
			
		}
echo'<div class="cleaner_with_height">&nbsp;</div>';


?>
 

<form class="form" action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST">
<fieldset> 
<legend>Search By</legend>
	<label>Title<input type="radio" name = "inputType" value = "title" checked></label>
	<label>Author<input type="radio" name = "inputType" value = "author"></label>
	<label>Genre<input type="radio" name = "inputType" value = "genre"></label>
	<br><br>
	<label>Search Value</label><input type="text" name="inputValue">
	<br><br>
	<input type = "submit" value="SEARCH">
	<input type = "reset">
</fieldset>
</form>

<?php include('includes/footer.html');?>