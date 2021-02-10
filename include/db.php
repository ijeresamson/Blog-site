<?php
// create a connection
$conn = mysqli_connect('localhost', 'root', '', 'postblog');
if(!$conn){
    die('The connection was lost' . mysqli_error($conn));
}

?>
