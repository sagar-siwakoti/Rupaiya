<?php

include("functions.php");

if(isset($_POST['userName']))
{
$name= mysqli_real_escape_string($conn, $_POST['userName']);
$query="SELECT * from user where UserName='$name'";
$result = $conn->query($query);
if ($result->num_rows == 0) 
{
	echo "No Match Found";
}
else
{
	echo "<span style='color:red;font-weight: bold;'>You already registered with this email</span>";
}
} 
?>