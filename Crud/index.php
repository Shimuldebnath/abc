<?php
include_once "create.php";
if(isset($_GET['edit'])){
	$edit_state=true;
	$id=$_GET['edit'];
	$rec=mysqli_query($con,"SELECT * FROM details WHERE id=$id");
	$record=mysqli_fetch_array($rec);
	$title=$record['title'];
	$description=$record['description'];
	$id=$record['id'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Simple project</title>
	<link rel="stylesheet"  type="text/css" href="style.css">
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>

		<tbody>
				<?php while($row=mysqli_fetch_array($result)){ ?>
				<tr>
					<td><?php echo $row['title']; ?></td><br>
					<td><?php echo $row['description']; ?></td>
					<td><a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
					<td><a onclick="return confirm('Are you sure you want to delete?')" href="create.php?del=<?php echo $row['id']; ?>">Delete</a></td>
					</tr>
				<?php }?>
		</tbody>
	</table>
	
<center>
	<form method="post" action="index.php">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Title</label>
			<input type="text" name="title" value="<?php echo $title; ?>">
		</div>

		<div class="input-group">
			<label>Description</label>
			<input type="text" name="description" value="<?php echo $description; ?>">
		</div>

		<div class="input-group">
			<?php if($edit_state==false): ?>
				<button type="submit" name="submit" class="btn">Click Me!</button>
			<?php else: ?>
				<button type="submit" name="update" class="btn">Update</button>
			<?php endif ?>
			
		</div>
	</form>
</center>

</body>
</html>