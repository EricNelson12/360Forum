<?php

// Create connection
function getCon(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forum";
return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
}

?>
