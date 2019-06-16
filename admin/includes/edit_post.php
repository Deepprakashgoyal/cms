<?php 

	        if (isset($_GET['p_id'])) {
	        $the_post_id = $_GET['p_id'];

	        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
	        $select_post_by_id = mysqli_query($connection, $query);
	        if (!$select_post_by_id) {
	            die("QUERY FAILED" . mysqli_error($select_post));
	        }
	        while ($row = mysqli_fetch_assoc($select_post_by_id)) {
            $post_catagory_id = $row['post_catagory_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            
            $post_status = $row['post_status'];
            $post_tag = $row['post_tag'];
            $post_comment = $row['post_comment_count'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
        }
    }

   				 /*query for updating post data*/


    	if (isset($_POST['update_post'])) {
    	    // $post_catagory_id = $_POST['Post_category_id'];
            $post_author = $_POST['post_author'];
            $post_title = $_POST['post_title'];
            $post_category = $_POST['post_category'];
            $post_status = $_POST['post_status'];
            $post_tag = $_POST['post_tag'];
            $post_image = $_FILES['post_image']['name'];
            $post_image_temp = $_FILES['post_image']['tmp_name'];
            move_uploaded_file($post_image_temp, "../images/$post_image");

            /*query for checking empty image field*/


            if (empty($post_image)) {
            	$query = "SELECT * FROM posts WHERE post_id =  $the_post_id";
            	$update_image = mysqli_query($connection, $query);
            	if (!$update_image) {
            		die("QUERY FAILED" . mysqli_error($connection));
            	}
            	while ($row = mysqli_fetch_assoc($update_image)) {
            		 $post_image = $row['post_image'];
            	}
            }
            
            
         
            $post_content = $_POST['post_content'];

            $query =  "UPDATE posts SET post_title = '$post_title', post_author = '$post_author', post_status = '$post_status', post_catagory_id = $post_category, post_tag = '$post_tag', post_date = now(), post_content = '$post_content', post_image = '$post_image' WHERE post_id = '$the_post_id'";
            

            $update_query = mysqli_query($connection, $query);
            if (!$update_query) {
            	die("QUERY FAILED" . mysqli_error($connection));
            }


    	
    }




 ?>

<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" name="post_title" class="form-control" value="<?php echo $post_title; ?>">
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
		<input type="text" name="post_author" class="form-control" value="<?php echo $post_author; ?>">
	</div>
	<div class="form-group">
		<label for="Post tag">post Tag</label>
		<input type="text" name="post_tag" class="form-control" value="<?php echo $post_tag; ?>">
	</div>
	<div class="form-group">
		<label for="status">Post status</label>
		<select name="post_status" id="" class="form-control">
			<option value="published">Publish</option>
			<option value="draft">Draft</option>
		</select>
		<!-- <input type="text" name="post_status" class="form-control" value="<?php echo $post_status; ?>"> -->
	</div>
	<div class="form-group">
		<label for="title">Post Image</label>
		<img src="../images/<?php echo $post_image; ?>" alt="post image" height="100px" > 
		<input type="file" class="form-control" name="post_image">
	</div>
	<div class="form-group">
		<label>Post content</label>
		<textarea name="post_content" id="" rows="10" class="form-control">
			
			<?php echo $post_content; ?>
		</textarea>
	</div>
	<input type="submit" name="update_post" value="submit" class="btn btn-primary">
</form>