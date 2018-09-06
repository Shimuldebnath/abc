<?php
include_once "dbconnect.php";
$id=0;
$title="";
$description="";
$edit_state=false;

if(isset($_POST['submit']))
{
	$title=$_POST['title'];
	$description=$_POST['description'];


$query="INSERT INTO details(title,description) VALUES ('$title','$description')";
mysqli_query($con,$query) or die(mysqli_error($con));
}
//update records
if(isset($_POST['update']))
{
 $title = mysqli_real_escape_string($con,$_POST['title']);
 $description = mysqli_real_escape_string($con,$_POST['description']);
 $id = mysqli_real_escape_string($con,$_POST['id']);
 mysqli_query($con, "UPDATE details SET title='$title', description='$description' WHERE id=$id");
}

//delete records
if(isset($_GET['del']))
{
	$id=$_GET['del'];
	mysqli_query($con,"DELETE FROM details WHERE id=$id");
	header('location:index.php');
}
//retrive records
$result=mysqli_query($con,"SELECT * FROM details");
?>
<?php
/*
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<br>
<br>
<center>
<h2>Enter your information:</h2><br><br>

<form name="myform" action='index.php' method="post">
<input type="text" name="title" placeholder="Title" required /><br><br>
<input type="text" name="description" placeholder="Description" required /><br><br>
<button type="submit" name="submit">Click Me!</button>
</form>
</center>
</body>
</html>
*/
?>