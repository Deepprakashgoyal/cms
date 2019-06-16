<?php include "include/database.php" ?>
<?php include "include/header.php" ?>

    <!-- Navigation -->
    <?php include "include/nav.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <?php
                if (isset($_GET['p_id'])) {
                     $the_post_id = $_GET['p_id'];

                }
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_post_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_post_query)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
            $post_author = $row['post_author'];
            $post_image = $row['post_image'];
        
            ?>

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?> at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $post_content ?></p>

            <?php } ?>

                <hr>

                <!-- Blog Comments -->
                <?php 
                if (isset($_POST['submit'])) {
                    $the_post_id = $_GET['p_id'];
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];

                    $query = "INSERT INTO comments(comment_email, comment_content, comment_author, comment_post_id, comment_date,  comment_status) ";

                    $query .= "VALUES ('{$comment_email}','{$comment_content}','{$comment_author}','$the_post_id',now(),'unapproved' )";
                    $comment = mysqli_query($connection, $query);
                    if (!$comment) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                    $query .= "WHERE post_id = $the_post_id";
                    $comment_count_query = mysqli_query($connection, $query);
                    if (!$comment_count_query) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                }

                 ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="POST">
                        <div class="form-group">
                            <label for="author">Name</label>
                           <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                             <label for="email">Email</label>
                             <input type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

               <?php 
            $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC";
            $select_comment_query = mysqli_query($connection, $query);
            if (!$select_comment_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            while ($row = mysqli_fetch_assoc($select_comment_query)) {
               $comment_content = $row['comment_content'];
                $comment_author = $row['comment_author'];
                $comment_date = $row['comment_date'];
                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <p><?php echo $comment_content ?></p>
                    </div>

                </div>
                <?php } ?>
                    
                <!-- Comment -->
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       

   <?php include "include/footer.php" ?>