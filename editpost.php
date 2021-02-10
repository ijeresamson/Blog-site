<?php include "include/cofil.php"; ?>
<?php include "include/db.php"; ?>

<!DOCTYPE html>
<html lang="">
<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>My BLOG</title>
				<link rel="stylesheet" type="text/css" href="css/style.css">
				<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
				
</head>
<body>
			<?php
	if(isset($_POST['submit'])){
		$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$body = mysqli_real_escape_string($conn, $_POST['body']);
		$author = mysqli_real_escape_string($conn, $_POST['author']);
		
		
		$query = "UPDATE blog SET title= '$title', author= '$author', body= '$body' WHERE id = {$update_id}";
		
		
		if(mysqli_query($conn, $query)){
			header('Location: '. ROOT_URL.'');
		} else{
			die('Error:'. mysqli_error($conn));
		}
	}
	
	// get id
$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = 'SELECT * FROM blog WHERE id ='.$id;
// GET RESULT
$sum = mysqli_query($conn, $query);
// FETCH DATA

$post = mysqli_fetch_assoc($sum);
// Free result
mysqli_free_result($sum);
// close connection
mysqli_close($conn);
	
?>	
			<div class="container">										
<?php include('navbar.php'); ?>
	<h1>Add Post </h1>		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="form-group">
		<label>Title</label>
			<input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>">
			</div>
			
			<div class="form-group">
		<label>Author</label>
			<input type="text" name="author" class="form-control" value="<?php echo $post['author']; ?>">
			</div>
			
			<div class="form-group">
		<label>Body</label>
				<textarea type="text" name="body" class="form-control"><?php echo $post['body']; ?></textarea>
			</div>
			<input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
			<input type="submit" name="submit" value="submit" class="btn btn-primary">
		</form>				
	</div>	
	<script
			  src="https://code.jquery.com/jquery-1.12.4.js"
			  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
			  crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>		
</body>
</html>
