<?php include "include/database.php" ?>
<?php include "include/header.php" ?>
<!-- Navigation -->
<?php include "include/nav.php" ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
        

            <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
            </h1>
            <?php
            if (isset($_GET['category'])) {
                $category_id = $_GET['category'];
            }
            $query = "SELECT * FROM posts WHERE post_catagory_id = $category_id";
            $select_post_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_post_query)) {
            $post_title = $row['post_title'];
            $post_id = $row['post_id'];
            $post_date = $row['post_date'];
             $post_content = substr($row['post_content'],0,150);
            $post_author = $row['post_author'];
            $post_image = $row['post_image'];
            ?>
            
            <!-- First Blog Post -->
            <h2>
            <a href="post.php?p_id=<?php echo($post_id)?>"><?php echo $post_title ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?> at 10:00 PM</p>
            <hr>
            <a href="post.php?p_id=<?php echo($post_id)?>">
            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt=""></a>
            <hr>
            <p><?php echo $post_content ?></p>
             <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
            
            
            
            <?php } ?>
            
            
           
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