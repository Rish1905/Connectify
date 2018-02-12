<?php 
require '../../config/config.php';
include("../classes/User.php");
include("../classes/Post.php");

	if(isset($_GET['post_id']))
		$post_id = $_GET['post_id'];

	if(isset($_GET['userLoggedIn']))
		$userLoggedIn = $_GET['userLoggedIn'];

	if(isset($_POST['result'])) {
		if($_POST['result'] == 'true') {
			$query = mysqli_query($con, "UPDATE posts SET deleted='yes' WHERE id='$post_id'");

			//Update post count for user 
			$userLoggedIn = $_SESSION['username'];
			
			$query = mysqli_query($con, "SELECT num_posts FROM users WHERE username='$userLoggedIn'");
			$row = mysqli_fetch_array($query);
			
		 	$num_posts = $row['num_posts'];
			$num_posts--;
			$update_query = mysqli_query($con, "UPDATE users SET num_posts='$num_posts' WHERE username='$userLoggedIn'");
	}
}

?>