<?php 
if(isset($_POST['submit'])) {
   
   $user_firstname = $_POST['user_firstname'];
   $user_lastname = $_POST['user_lastname'];
   $username = $_POST['username'];
   $user_email = $_POST['user_email'];
   $user_role = $_POST['user_role'];
   
   $user_password = $_POST['user_password'];
   $user_image = $_FILES['image']['name'];
   $user_image_temp = $_FILES['image']['tmp_name'];
   move_uploaded_file($user_image_temp, "../images/$user_image");

   $query = "INSERT INTO users(user_firstname, user_lastname, username, user_email, user_role, user_password,  user_image )";
   $query .= "VALUES ('{$user_firstname}','{$user_lastname}','{$username}','{$user_email}','{$user_role}','{$user_password}','{$user_image}' )";
   $result = mysqli_query($connection, $query);
   if (!$result) {
   	die("QUERY FAILED" . mysqli_error($connection));
   }
   echo "<span class='alert-success'>User added successfully: </span>" . " " . "<a href='users.php'>View User</a>";

   }


 ?>

<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">First Name</label>
		<input type="text" name="user_firstname" class="form-control">
	</div>
	<div class="form-group">
		<label for="title">Last Name</label>
		<input type="text" name="user_lastname"  class="form-control">
	</div>
	
	<div class="form-group">
		<label for="user author">Username</label>
		<input type="text" name="username" class="form-control">
	</div><div class="form-group">
		<label for="user author">Password</label>
		<input type="Password" name="user_password" class="form-control">
	</div>
	<div class="form-group">
		<label for="user tag">User Email</label>
		<input type="Email" name="user_email" class="form-control">
	</div><div class="form-group">
		<label for="user tag">User Role</label>
		<select name="user_role" id="" class="form-control">
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>

		</select>
		
	</div>
	
	<div class="form-group">
		<label for="title">User Image</label>
		<input type="file" name="image" class="form-control">
	</div>
	
	<input type="submit" name="submit" value="submit" class="btn btn-primary">
</form>