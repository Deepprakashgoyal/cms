<?php 

// getting input data 

if(isset($_POST['submit'])) {
   
   $post_title = $_POST['title'];
   $post_category = $_POST['post_category'];
   
   $post_author = $_POST['author'];
   $post_tag = $_POST['tag'];
   $post_status = $_POST['post_status'];
   $post_date = date("d-m-y");
   $post_content = $_POST['post_content'];
   $post_image = $_FILES['image']['name'];
   $post_image_temp = $_FILES['image']['tmp_name'];
   move_uploaded_file($post_image_temp, "../images/$post_image");

   // query for inserting data into database

   $query = "INSERT INTO posts(post_catagory_id, post_title, post_author, post_content, post_date, post_image, post_tag, post_status )";
   $query .= "VALUES ('{$post_category}','{$post_title}','{$post_author}','{$post_content}',now(),'{$post_image}','{$post_tag}','{$post_status}' )";
   $result = mysqli_query($connection, $query);
   if (!$result) {
   	die("QUERY FAILED" . mysqli_error($connection));
   }
   echo "<span class='alert-success'>Post added successfully: </span>" . " " . "<a href='posts.php'>View Post</a>";
   }


 ?>

<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" name="title" class="form-control">
	</div>
	<div class="form-group">
		<label for="title">Post Category</label>
		<select name="post_category" id="post_category" class="form-control">

			<?php 
				$query = "SELECT * FROM category";
				$post_category = mysqli_query($connection, $query);
				if (!$post_category) {
				die("QUERY FAILED" . mysqli_error($connection));
				}
				while ($row = mysqli_fetch_assoc($post_category)) {
				$cat_title = $row['cat_title'];
				 $cat_id = $row['cat_id'];

				echo "<option value='$cat_id'>$cat_title</option>";
			}


			 ?>

		</select>
	</div>
	
	<div class="form-group">
		<label for="Post author">post author</label>
		<input type="text" name="author" class="form-control">
	</div>
	<div class="form-group">
		<label for="Post tag">post Tag</label>
		<input type="text" name="tag" class="form-control">
	</div>
	<div class="form-group">
		<label for="status">Post status</label>
		<select name="post_status" id="" class="form-control">
			<option value="published">Publish</option>
			<option value="draft">Draft</option>
		</select>
	</div>
	<div class="form-group">
		<label for="title">Post Image</label>
		<input type="file" name="image" class="form-control">
	</div>
	<div class="form-group">
		<label>Post content</label>
		<textarea name="post_content" id="editor" rows="10" class="form-control"></textarea>
	</div>
	<input type="submit" name="submit" value="submit" class="btn btn-primary">
</form>