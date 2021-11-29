<?php
// Connecting to DB on XAMPP
$username = 'root';
$password = 'password';
$host = 'localhost';
$dbname = 'hooshangry';

$dsn = "mysql:host=$host;dbname=$dbname";

/** connect to the database **/
try
{
   $db = new PDO($dsn, $username, $password);
}
catch (PDOException $e){
   $error_message = $e->getMessage();
   echo "<p>An error occurred while connecting to the database: $error_message </p>";
}
catch (Exception $e){
   $error_message = $e->getMessage();
   echo "<p>Error message: $error_message </p>";
}
?>