<?php
session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}
$page_title = "Add New Book";
include ('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require ('../connect_db.php');
	$errors = array();

	if (empty( $_POST ['title']))
		{
			$errors[] = 'Enter Title';
		}
		else
		{
			$title = htmlspecialchars($_POST['title']);
			if(!is_string($title))
			{
			$errors[]= 'Please enter a valid title';
			}
		}

	if (empty( $_POST ['author']))
		{
			$errors[] = 'Enter author name';
		}
		else
		{
			$author = htmlspecialchars($_POST['author']);
			if(!is_string($author))
			{
			$errors[]= 'Please enter a valid name';
			}
		}
	
	if (!empty( $_POST ['image']))
		{
			$img = htmlspecialchars($_POST['image']);
			if(!is_string($title))
			{
			$errors[]= 'Invalid image path';
			}
		}
		else
		{
			$img = 'images\\imagecomingsoon.jpg';
		}
	
	if (empty( $_POST ['price']))
		{
			$errors[] = 'Enter Selling Price';
		}
		else
		{
			$price = htmlspecialchars($_POST['price']);
			if(!is_numeric($price))
			{
			$errors[]= 'Please enter a valid price';
			}
		}
	
	if (!empty( $_POST ['isbn']))
		{
			$isbn = htmlspecialchars($_POST['isbn']);
			if(!is_numeric($isbn))
			{
			$errors[]= 'Please enter a valid isbn';
			}
		}
		else
		{
			$isbn = 0;
		}
		
	if (!empty( $_POST ['reldate']))
		{
			$reldate = htmlspecialchars($_POST['reldate']);
			if(!is_numeric($reldate))
			{
			$errors[]= 'Please enter a valid year';
			}
		}
		else
		{
			$reldate = 2019;
		}

	if (!empty( $_POST ['genre']))
		{
			$genre = htmlspecialchars($_POST['genre']);
			if(!is_string($genre))
			{
			$errors[]= 'Please enter a valid genre';
			}
		}
		else
		{
			$genre = 'Awaiting Classification';
		}
		
	if (!empty( $_POST ['info']))
		{
			$info = htmlspecialchars ($_POST['info']);
			if(!is_string($info))
			{
			$errors[]= 'Error please recheck description';
			}
		}
		else
		{
			$info = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec dui. Donec nec neque ut quam sodales feugiat. 
			Nam sodales, pede vel dapibus lobortis, ipsum diam molestie risus, a vulputate risus nisl pulvinar lacus.';
		}

	if (empty( $_POST ['noinstock']))
		{
			$errors[] = 'Enter number in stock';
		}
		else
		{
			$noin = htmlspecialchars($_POST['noinstock']);
			if(!is_numeric($noin))
			{
			$errors[]= 'Please enter a valid stock number';
			}
		}

	if ( empty( $errors))
	{
		$q = "INSERT IGNORE INTO `book` (`author`, `title`, `image`, `price`, `isbn`, `reldate`, `genre`, `info`, `noinstock`) VALUES
		('$author', '$title', '$img', '$price', '$isbn', '$reldate', '$genre', '$info', '$noin')";
		$r = mysqli_query ($dbc, $q);

		if ($r==TRUE)
		{
			echo "<h2>New title $title added successfully</h2>";

			echo '<div id="templatemo_content_right">
				  <h1>'.$title.'<span>(by '.$author.')</span></h1>
				  <div class="image_panel"><img src="'.$img.'" alt="Book Cover" width="100" height="150" /></div>
					<ul>
						<li>Author: '.$author.'</li>
						<li>Release Date: '.$reldate.'</li>
						<li>ISBN 13: '.$isbn.'</li>
						<li>Price: &euro;'.$price.'</li>
					</ul>
						
					<p>'.$info.'</p>
					<div class="cleaner_with_height">&nbsp;</div>
		
					<div class="cleaner_with_height">&nbsp;</div>
					</div>';
		} 
		else
		{
			echo "<h2>ERROR</h2>";
		}
	}

	else
	{
	   echo '<h1>Error!</h1>
	   <p id="err_msg">The following error(s) occured:<br>';
	   foreach($errors as $msg)
	   {
		   echo "- $msg<br>";
	   }
	   echo '<br><a href="addbook.php">Please try again</a></p>';
	}
  
 mysqli_close($dbc);
	    include('includes/footer.html');
        //exit();
}
?>
 
<form class="form" action="addbook.php" method ="POST">
<fieldset> 
<legend>Add New Book</legend>
	<label>Title</label>
	<input type="text" name="title" value = "<?php if (isset( $_POST['title']))
		echo $_POST['title'];?>"><br>
	<label>Author</label>
	<input type="text" name="author" value = "<?php if (isset( $_POST['author']))
		echo $_POST['author'];?>"><br>
	<label>Image</label>
	<input type="text" name="image" value = "<?php if (isset( $_POST['image']))
		echo $_POST['image'];?>"><br>
	<label>Price</label>
	<input type="text" name="price" value = "<?php if (isset( $_POST['price']))
		echo $_POST['price'];?>"><br>
	<label>ISBN</label>
	<input type="text" name="isbn" value = "<?php if (isset( $_POST['isbn']))
		echo $_POST['isbn'];?>"><br>
	<label>Release Date</label>
	<input type="text" name="reldate" value = "<?php if (isset( $_POST['reldate']))
		echo $_POST['reldate'];?>"><br>
	<label>Genre</label>
	<input type="text" name="genre" value = "<?php if (isset( $_POST['genre']))
		echo $_POST['genre'];?>"><br>
	<label>Description</label>
	<input type="text" name="info" value = "<?php if (isset( $_POST['info']))
		echo $_POST['info'];?>"><br>
	<label>Number in Stock</label>
	<input type="text" name="noinstock" value = "<?php if (isset( $_POST['noinstock']))
		echo $_POST['noinstock'];?>">
	<br><br>
	<input type = "submit" value="Add Book">
	<input type = "reset">
</fieldset>
</form>

<a href="goodbye.php">Log Out</a> | <a href="admin.php">Admin Page</a>
<?php include('includes/footer.html');?>