
<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
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