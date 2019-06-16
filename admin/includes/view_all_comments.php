
<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> AUTHOR</th>
                                    <th>COMMENT</th>                                    
                                    <th>STATUS</th>
                                    <th>EMAIL</th>
                                    <th>DATE</th>
                                    <th>RESPONSE ON POST</th>
                                    <th>APPROVE</th>
                                    <th>UNAPPROVE</th>
                                    <th>DELETE</th>                            
                                 </tr>
                            </thead>
                            <tbody>
                                <?php 

                                $query = "SELECT * FROM comments";
                                $select_comment = mysqli_query($connection, $query);
                                if (!$select_comment) {
                                    die("QUERY FAILED" . mysqli_error($select_comment));
                                }
                                while ($row = mysqli_fetch_assoc($select_comment)) {
                                    $comment_id = $row['comment_id'];
                                    $comment_author = $row['comment_author'];
                                    
                                    $comment_post_id = $row['comment_post_id'];
                                    $comment_status = $row['comment_status'];
                                    
                                    $comment_email = $row['comment_email'];
                                    
                                    $comment_date = $row['comment_date'];
                                    $comment_content = $row['comment_content'];                                   

                                      echo "<tr>";
                                      echo "<td>{$comment_id}</td>";
                                      echo "<td>{$comment_author}</td>";
                                      echo "<td>{$comment_content}</td>";                               
                                      
                                      echo "<td>{$comment_status}</td>";
                                     
                                      echo "<td>{$comment_email}</td>";
                                    
                                      echo "<td>{$comment_date}</td>";
                                      $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                                      $select_post_title = mysqli_query($connection, $query);
                                      if (!$select_post_title) {
                                        die("QUERY FAILED" . mysqli_error($connection));
                                      }
                                      while ($row = mysqli_fetch_assoc($select_post_title)) {
                                         $post_id = $row['post_id'];
                                         $post_title = $row['post_title'];
                                         echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                                      }

                                      echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";                                      
                                      echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";                                      
                                      echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";                                      
                                      echo "</tr>";
                                }
                                 ?>
                               
                            </tbody>
                        </table>
 <?php 
 if (isset($_GET['unapprove'])) {
    $unapprove = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $unapprove";
    
    $unapprove_result = mysqli_query($connection, $query);
    if(!$unapprove_result) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
    header("location: comments.php");
 }  
 if (isset($_GET['approve'])) {
    $approve = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approve";
    
    $approve_result = mysqli_query($connection, $query);
    if(!$approve_result) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
    header("location: comments.php");
 }
 if (isset($_GET['delete'])) {
    $the_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
    $result = mysqli_query($connection, $query);
    if(!$result) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
    header("location: comments.php");
 }
?>
