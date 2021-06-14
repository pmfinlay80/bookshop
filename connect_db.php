<?php
$dbc = mysqli_connect('localhost', 'root', 'Password', 'bookshop')
OR die
(mysqli_connect_error());

mysqli_set_charset($dbc, 'utf8');
