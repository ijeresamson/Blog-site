<?php setcookie('username', 'samson', time()+10);  ?>
<?php include "include/cofil.php"; ?>
<?php include "include/db.php"; ?>
<?php

$query = 'SELECT * FROM blog ORDER by current_int DESC';
// GET RESULT
$sum = mysqli_query($conn, $query);
// FETCH DATA

$posts = mysqli_fetch_all($sum, MYSQLI_ASSOC);
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
				<title>My BLOG</title>
				<link rel="stylesheet" type="text/css" href="css/style.css">
				<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
				
</head>
<body  style="background-color: black;">

<div class="container">

<?php include('navbar.php'); ?>

<h1>Post </h1>		
<?php foreach($posts as $post) : ?>	
<div class="well">		
<h3><?php echo $post['title']; ?></h3>
<small>Created on <?php echo $post['current_int']; ?> by <?php 
echo $post['author']; ?></small>
<p><?php echo $post['body']; ?></p>	
<a class="button" href="<?php echo ROOT_URL ?>post.php?id=<?php echo $post['id']; ?>">Read More </a>	
</div>
<?php endforeach; ?>	
</div>	
	<script
			  src="https://code.jquery.com/jquery-1.12.4.js"
			  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
			  crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>		
</body>
</html>












