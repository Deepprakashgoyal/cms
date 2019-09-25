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
                     $the_post_author = $_GET['author'];

                }
            $query = "SELECT * FROM posts WHERE post_author = '$the_post_author' ";
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
                    All Posts by <?php echo $post_author ?>
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
               

                <!-- Comments Form -->
                

                <hr>

                <!-- Posted Comments -->

              
                    
                <!-- Comment -->
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       

   <?php include "include/footer.php" ?>