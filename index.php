<!DOCTYPE html>
<html>
<head>
	<title>CRUD Operations</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "admin123";

	$conn = new mysqli($servername, $username, $password,'crud') or die(mysqli_error($conn));
	$result = $conn->query("select * FROM emp") or die($conn->error);
	//prnt($result->fetch_assoc());
	//prnt($result->fetch_assoc());
	function prnt($array)
	{
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
	?>
	<div class="container">
	<div class="justify-content-center">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>name</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
	<?php
		while ($row = $result->fetch_assoc()): 
	?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>"
				class="btn btn-info">Edit</a>
				<a href="index.php?delete=<?php echo $row['id']; ?>"
				class="btn btn-danger">Delete</a>	
			</td>
		</tr>
		<?php endwhile; ?>

		</table>
	</div>

	<?php require_once 'database.php';?>
	<div class="center justify-content-center">	
	<form method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="form-group">
		<label>ID</label>
		<input type ="number" class="form-control" name="ID" value ="<?php echo $id;?>" placeholder="Enter your ID" >
		</div>

		<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="Name" value ="<?php echo $name;?>" placeholder="Enter your name">
		</div>
		<div class="form-group">
		<?php 
			if ($update==true):
		?>
			<button type="submit" class="btn btn-info" name="update">Update</button>

		<?php
			else:
		?>
			<button type="submit" class="btn btn-primary" name="save">Save</button>
		<?php endif;?>
		</div>
	</form>
	</div>
	</div>
</body>
</html>