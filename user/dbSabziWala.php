<?php 
function OpenCon()
{
$dbhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'sabziwala';
$tbname = 'admin';
$conn = mysqli_connect ("$dbhost","$username","$password", "$dbname");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
 }
return $conn;

}

function CloseCon($conn)
 {
 $conn -> close();
}


 ?>