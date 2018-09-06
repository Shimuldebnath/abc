<?php

$con=mysqli_connect('localhost','root','');
if(!mysqli_connect('localhost','root',''))
{
	die('Not connected'.mysqli_error($con));
}
if(!mysqli_select_db($con,'crud'))
{
	die('Not connected'.mysqli_error($con));
}


?>