
<!-- showing all user data from database -->

<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> USER</th>
                                    <th>FIRST NAME</th>                                    
                                    <th>LAST NAME</th>
                                    <th>EMAIL</th>
                                    <th>USER IMAGE</th>
                                    <th>USER ROLE</th>
                                    <!-- <th>ADMIN</th>
                                    <th>SUBSCRIBER</th>   -->                                  
                                    <th>EDIT</th>                                    
                                    <th>DELETE</th>                            
                                 </tr>
                            </thead>
                            <tbody>
                                <?php 
                              // query for selecting users from database

                                $query = "SELECT * FROM users";
                                $select_user = mysqli_query($connection, $query);
                                if (!$select_user) {
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }
                                while ($row = mysqli_fetch_assoc($select_user)) {
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];                                    
                                    $user_firstname = $row['user_firstname'];
                                    $user_lastname = $row['user_lastname'];                                    
                                    $user_email = $row['user_email'];
                                    $user_image = $row['user_image'];                                   
                                   
                                    $user_role = $row['user_role'];                                   

                                      echo "<tr>";
                                      echo "<td>{$user_id}</td>";
                                      echo "<td>{$username}</td>";
                                      echo "<td>{$user_firstname}</td>";                               
                                      
                                      echo "<td>{$user_lastname}</td>";
                                     
                                      echo "<td>{$user_email}</td>";
                                      echo "<td><img src='../images/{$user_image}' width='100px'></td>";
                                      echo "<td>{$user_role}</td>";
                                      
                                      
                                      // $query = "SELECT * FROM posts WHERE post_id = $user_post_id";
                                      // $select_post_title = mysqli_query($connection, $query);
                                      // if (!$select_post_title) {
                                      //   die("QUERY FAILED" . mysqli_error($connection));
                                      // }
                                      // while ($row = mysqli_fetch_assoc($select_post_title)) {
                                      //    $post_id = $row['post_id'];
                                      //    $post_title = $row['post_title'];
                                      //    echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                                      // }

                                                                            
                                      // echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>";                                      
                                      // echo "<td><a href='users.php?change_to_sub=$user_id'>Subscriber</a></td>";                                      
                                      echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";                                      
                                      echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";                                      
                                      echo "</tr>";
                                }
                                 ?>
                               
                            </tbody>
                        </table>
 <?php 
 if (isset($_GET['change_to_admin'])) {
    $admin_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $admin_id";
    
    $change_admin_query = mysqli_query($connection, $query);
    if(!$change_admin_query) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
    header("location: users.php");
 }  
 if (isset($_GET['change_to_sub'])) {
    $sub_id = $_GET['change_to_sub'];
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $sub_id";
    
    $change_sub_query = mysqli_query($connection, $query);
    if(!$change_sub_query) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
    header("location: users.php");
 }
 if (isset($_GET['delete'])) {
  if(isset($_SESSION['user_role'])){
     if($_SESSION['user_role'] == 'admin'){



    $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
    
    $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
    $result = mysqli_query($connection, $query);
    if(!$result) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
    header("location: users.php");
  }
 }
}
?>
