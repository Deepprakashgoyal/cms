<?php 
if (isset($_GET['edit_user'])) {
	$the_user_id = $_GET['edit_user'];

	// query for selecting user data from database using user id

	$query = "SELECT * FROM users WHERE user_id = $the_user_id";
	$select_user_query = mysqli_query($connection, $query);
	if (!$select_user_query) {
		die("QUERY FAILED" . mysqli_error($connection));
	}
	while ($row = mysqli_fetch_assoc($select_user_query)) {
		   $username = $row['username'];
		   $user_firstname = $row['user_firstname'];
		   $user_lastname = $row['user_lastname'];
		   $user_role = $row['user_role'];
		   $user_image = $row['user_image'];
		   $user_email= $row['user_email'];
		   $user_password= $row['user_password'];
		}
	}

	if (isset($_POST['submit'])) {
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$username = $_POST['username'];
		$user_role = $_POST['user_role'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$user_image = $_FILES['image']['name'];
		$user_image_temp = $_FILES['image']['tmp_name'];
		move_uploaded_file($user_image_temp, "../images/$user_image");
      
      // query for updating user data into database

		$query = "UPDATE users SET user_firstname = '$user_firstname', user_lastname = '$user_lastname', username = '$username', user_role = '$user_role', user_image = '$user_image', user_password = '$user_password', user_email = '$user_email' WHERE user_id = $the_user_id";
		$update_user_query = mysqli_query($connection, $query);
		if (!$update_user_query) {
			die("QUERY FAILED" . mysqli_error($connection));
		}
   echo "<span class='alert-success'>User Updated successfully: </span>" . " " . "<a href='users.php'>View User</a>";




	}
?>

<!--// if(isset($_POST['submit'])) {
   
//    $user_firstname = $_POST['user_firstname'];
//    $user_lastname = $_POST['user_lastname'];
//    $username = $_POST['username'];
//    $user_email = $_POST['user_email'];
//    $user_role = $_POST['user_role'];
   
//    $user_password = $_POST['user_password'];
//    $user_image = $_FILES['image']['name'];
//    $user_image_temp = $_FILES['image']['tmp_name'];
//    move_uploaded_file($user_image_temp, "../images/$user_image");

//    $query = "INSERT INTO users(user_firstname, user_lastname, username, user_email, user_role, user_password,  user_image )";
//    $query .= "VALUES ('{$user_firstname}','{$user_lastname}','{$username}','{$user_email}','{$user_role}','{$user_password}','{$user_image}' )";
//    $result = mysqli_query($connection, $query);
//    if (!$result) {
//    	die("QUERY FAILED" . mysqli_error($connection));
//    }
//    } -->


<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">First Name</label>
		<input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname; ?>">
	</div>
	<div class="form-group">
		<label for="title">Last Name</label>
		<input type="text" name="user_lastname"  class="form-control" value="<?php echo $user_lastname; ?>">
	</div>
	
	<div class="form-group">
		<label for="user author">Username</label>
		<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
	</div><div class="form-group">
		<label for="user author">Password</label>
		<input type="Password" name="user_password" class="form-control" value="<?php echo $user_password; ?>" >
	</div>
	<div class="form-group">
		<label for="user tag">User Email</label>
		<input type="Email" name="user_email" class="form-control" value="<?php echo $user_email; ?>">
	</div><div class="form-group">
		<label for="user tag">User Role</label>
		<select name="user_role" id="" class="form-control">
			<option value='<?php echo $user_role; ?>'><?php echo $user_role; ?></option>
			<?php 
			if($user_role == "admin"){
				echo "<option value='subscriber'>Subscriber</option>";
			}else{
			echo "<option value='admin'>Admin</option>";

			}

			 ?>

		</select>
		
	</div>
	
	<div class="form-group">
		<label for="title">User Image</label>
		<input type="file" name="image" class="form-control"  >
	</div>
	
	<input type="submit" name="submit" value="submit" class="btn btn-primary">
</form>

