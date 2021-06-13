<?php

session_start();

if(!isset($_SESSION['id']))
{
    require ('login_tools.php');
    load();
}

$page_title = 'Admin';
include ('includes/header.html');


echo'<div class="cleaner_with_height">&nbsp;</div>';
echo "<h2>Welcome {$_SESSION['firstName']} {$_SESSION['surname']}!</h2>";
?>
<h1>Admin Page</h1>
<ul>
<li><a href="addbook.php">Add New Book</a></li>
<li><a href="deletebook.php">Delete Book</a></li>
<li><a href="updateprice.php">Update Book Price</a></li>
<li><a href="updatestock.php">Update Stock</a></li>
<li><a href="newadmin.php">Add New Administrator</a></li>
</ul>


<?php
include ('includes/footer.html');


?>