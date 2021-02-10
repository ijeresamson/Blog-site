<?php include "include/cofil.php"; ?>
<?php include "include/db.php"; ?>

	<?php
	if(isset($_POST['delete'])){
		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
		
				$query = "DELETE FROM blog WHERE id = {$delete_id}";
		
		
		if(mysqli_query($conn, $query)){
			header('Location: '. ROOT_URL.'');
		} else{
			die('Error:'. mysqli_error($conn));
		}
	}
	?>
<?php
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
<!DOCTYPE html>
<html lang="">
<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>My Post</title>
				<link rel="stylesheet" type="text/css" href="css/style.css">
				<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
</head>

<body>
				<div class="container">	
				<a href="<?php echo ROOT_URL ?>" class="btn btn-default">Back</a>
			<h1><?php echo $post['title']; ?></h1>	
			<small>Created on <?php echo $post['current_int']; ?> by <?php 
			echo $post['author']; ?></small>
			<p><?php echo $post['body']; ?></p>	
			<hr>
			<form class="pull-right" style="float: right;" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="hidden" name="delete_id" value="<?php echo $post['id'];?>">
			<input type="submit" name="delete" value="Delete" class="btn btn-danger">	
			</form>
			<a href="<?php ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-default">Edit</a>					
	</div>	
					<script src="https://code.jquery.com/jquery-1.12.4.js"
			  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
			  crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>			
</body>
</html>
