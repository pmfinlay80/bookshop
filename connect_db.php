<?php
$dbc = mysqli_connect('localhost', 'root', 'Elsief80#1_3', 'bookshop')
OR die
(mysqli_connect_error());

mysqli_set_charset($dbc, 'utf8');