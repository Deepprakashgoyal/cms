<?php include "database.php" ?>
<?php session_start(); ?>
<?php 
 if (isset($_POST['submit'])) {
    $username = $_POST['username'];
 	$password = $_POST['password'];
 $username = mysqli_real_escape_string($connection, $username);
 $password = mysqli_real_escape_string($connection, $password);

     // query for fetching user data from database
    
 	$query = "SELECT * FROM users WHERE username = '$username'";
 	$select_user_query = mysqli_query($connection, $query);
 	if (!$select_user_query) {
 		die("QUERY FAILED" . mysqli_error($connection));
 	}
 	while ($row = mysqli_fetch_assoc($select_user_query)) {
 		  $db_user_id = $row['user_id'];
 		  $db_username = $row['username'];
 		  $db_password = $row['user_password'];
 		  $db_user_role = $row['user_role'];

 	}
 	$hash_format = "$2y$10$";
 	$salt = "iusessomecrazystring22";

 	// $password = crypt("$2y$10$iusessomecrazystring22", $password);
 	// validating user data from inputed data
 	
 	if ($db_username === $username && $db_password === $password) {
 		$_SESSION['username'] = $db_username;
        $_SESSION['user_role'] = $db_user_role;      
 		header("location: ../admin");
 		
 	}else{
 		echo "this is wrong info";
 		header("location: ../index.php");
 	}
 }


 ?>