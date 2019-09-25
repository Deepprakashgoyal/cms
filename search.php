<?php include "include/database.php" ?>
<?php include "include/header.php" ?>
<!-- Navigation -->
<?php include "include/nav.php" ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!-- <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
            </h1> -->
            <!-- query for searching post tag name in database -->
            <?php
            if (isset($_POST['submit'])) {
            $search = $_POST['search'];
            $query = "SELECT * FROM posts WHERE post_tag = '$search' ";
            $search_query = mysqli_query($connection, $query);
            if (!$search_query) {
            die("QUERY FAILED" . mysqli_error($connection));
            }
            $count = mysqli_fetch_array($search_query);
            $array_length = count($count);
            if ($array_length == 0) {
            echo "<h1>SORRY, NO RESULT FOUND</h1>";
            }else{
                echo "<h1>HERE ARE SOME RESULTS</h1>";

            // fatching post data from database 
                
            while ($row = mysqli_fetch_assoc($search_query)) {

            $post_title = $row['post_title'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
            $post_author = $row['post_author'];
            $post_image = $row['post_image'];
            $post_tag = $row['post_tag'];
            
            ?>
            
            <!-- First Blog Post -->
            <h2>
            <a href="#"><?php echo $post_title ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?> at 10:00 PM</p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
            <hr>
            <p><?php echo $post_content ?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
            
            
            
            <?php } 
            }
            } ?> 
            
            
       
            
            
            
            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "include/sidebar.php" ?>
    </div>
    <!-- /.row -->
    <hr>
    <!-- Footer -->
    
    <?php include "include/footer.php" ?>