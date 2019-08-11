<?php 
if (isset($_POST['submit'])) {
foreach ($_POST['checkboxArray'] as $postValueId) {

  $bulk_option = $_POST['bulk_option'];

  switch ($bulk_option) {
    case 'published':
      $query = "UPDATE posts SET post_status = '{$bulk_option}' WHERE post_id = '{$postValueId}' ";
      $upate_to_publish_status = mysqli_query($connection, $query);
      if (!$upate_to_publish_status) {
        die("query failed" . mysql_error($connection));
      }
      break;
      case 'draft':
      $query = "UPDATE posts SET post_status = '{$bulk_option}' WHERE post_id = '{$postValueId}' ";
      $upate_to_draft_status = mysqli_query($connection, $query);
      if (!$upate_to_draft_status) {
        die("query failed" . mysql_error($connection));
      }
      break;

      case 'delete':
      $query = "DELETE FROM posts WHERE post_id = '{$postValueId}' ";
      $delete_post = mysqli_query($connection, $query);
      if (!$delete_post) {
        die("query failed" . mysql_error($connection));
      }
      break;
  }

}
}
 ?>

<!-- showing all post data from database -->

<form action="" method="post">
<table class="table table-bordered table-hover">
  <div class="col-md-4" style="padding-left: 0; padding-bottom: 10px;">
    <select id="" class="form-control" name="bulk_option">
      <option value="">Select option</option>
      <option value="published">published</option>
      <option value="draft">Draft</option>
      <option value="delete">Delete</option>
    </select>
  </div>
  <div class="col-md-4">
    <input type="submit" class="btn btn-success" value="Apply" name="submit">
    <input type="submit" class="btn btn-primary" value="Add New" >
  </div>
                            <thead>
                                <tr>
                                  <th><input type="checkbox" id="checkallboxes"></th>
                                    <th>ID</th>
                                    <th> AUTHOR</th>
                                    <th>TITLE</th>
                                    
                                    <th>CATEGORY</th>
                                    <th>STATUS</th>
                                    <th>IMAGE</th>
                                    <th>TAGS</th>
                                    <th>COMMENTS</th>
                                    <th>DATE</th>
                                    <th></th>
                                    <th></th>

                                 
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                               // query for getting post data from database
                                
                                $query = "SELECT * FROM posts";
                                $select_post = mysqli_query($connection, $query);
                                if (!$select_post) {
                                    die("QUERY FAILED" . mysqli_error($select_post));
                                }
                                while ($row = mysqli_fetch_assoc($select_post)) {
                                    $post_id = $row['post_id'];
                                    $post_author = $row['post_author'];
                                    $post_title = $row['post_title'];
                                    $post_category_id = $row['post_catagory_id'];
                                    
                                    $post_status = $row['post_status'];
                                    $post_tag = $row['post_tag'];
                                    $post_comment = $row['post_comment_count'];
                                    $post_date = $row['post_date'];
                                    $post_image = $row['post_image'];

                                      echo "<tr>";
                                      ?>
                                      <td><input type="checkbox" value="<?php echo $post_id?>" name="checkboxArray[]" class="checkboxes"></td>
                                      
                                      <?php
                                      echo "<td>{$post_id}</td>";
                                      echo "<td>{$post_author}</td>";
                                      echo "<td>{$post_title}</td>";


                                      $query = "SELECT * FROM category where cat_id = $post_category_id";
                                      $select_cat_id = mysqli_query($connection, $query);
                                      if (!$select_cat_id) {
                                        die("QUERY FAILED" . mysqli_error($connection));
                                      }
                                      while ($row = mysqli_fetch_assoc($select_cat_id)) {
                                            $cat_title = $row['cat_title'];
                                      

                                      echo "<td>{$cat_title}</td>";
                                    }
                                      



                                      echo "<td>{$post_status}</td>";
                                      echo "<td><img src='../images/$post_image' alt='image' width=100></td>";
                                      echo "<td>{$post_tag}</td>";
                                      echo "<td>{$post_comment}</td>";
                                      echo "<td>{$post_date}</td>";
                                      echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";                                      
                                      echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";                                      
                                      echo "</tr>";
                                }



                                 ?>
                               
                            </tbody>
                        </table>
                        </form>
 <?php 
 if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$delete} ";
    $result = mysqli_query($connection, $query);
    if(!$result) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
    header("location: posts.php");
 }
?>
