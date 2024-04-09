<?php

$servername = "localhost";
$username = "root";
$wachtwoord = "";
$dbname = "apotheek";

if(!$con = mysqli_connect($servername, $username, $wachtwoord, $dbname))
{

	die("failed to connect!");
}
