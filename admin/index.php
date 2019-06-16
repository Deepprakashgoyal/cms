<?php include "includes/header.php" ?>
<?php ob_start(); ?>

<?php 
  if (!isset($_SESSION['user_role'])) {
      header("location: ../index.php");
  }
 ?>






    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <h1 class="page-header">
                            Welcome in Admin
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->
                
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                    $query = "SELECT * FROM posts";
                    $select_posts = mysqli_query($connection, $query);
                    if (!$select_posts) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    $post_count = mysqli_num_rows($select_posts);

                     ?>

                  <div class='huge'><?php echo $post_count; ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                    $query = "SELECT * FROM comments";
                    $select_comments = mysqli_query($connection, $query);
                    if (!$select_comments) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    $comment_count = mysqli_num_rows($select_comments);

                     ?>
                     <div class='huge'><?php echo $comment_count; ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                    $query = "SELECT * FROM users";
                    $select_users = mysqli_query($connection, $query);
                    if (!$select_users) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    $user_count = mysqli_num_rows($select_users);

                     ?>
                    <div class='huge'><?php echo $user_count; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                    $query = "SELECT * FROM category";
                    $select_category = mysqli_query($connection, $query);
                    if (!$select_category) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    $category_count = mysqli_num_rows($select_category);

                     ?>
                        <div class='huge'><?php echo $category_count; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="category.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
             <?php 
                    $query = "SELECT * FROM posts WHERE post_status = 'draft'";
                    $select_draft_posts = mysqli_query($connection, $query);
                    if (!$select_draft_posts) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    $draft_count = mysqli_num_rows($select_draft_posts);

                    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                    $select_unapproved_comment = mysqli_query($connection, $query);
                    if (!$select_unapproved_comment) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    $unapproved_count = mysqli_num_rows($select_draft_posts);

                    $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
                    $select_subscriber = mysqli_query($connection, $query);
                    if (!$select_subscriber) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    $subscriber_count = mysqli_num_rows($select_draft_posts);


                     ?>






                <div class="row">
                    <div class="col-lg-12">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          <?php 
          $element_text = ['Active Posts', 'Draft Posts', 'Categories', 'Users', 'Subscribers', 'Comments', 'Unapproved Comments'];
          $element_count = [$post_count, $draft_count, $category_count, $user_count, $subscriber_count, $comment_count, $unapproved_count];
          for ($i = 0; $i < 7; $i++) {
              echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
          }
           ?>
         
         
        ]);

        var options = {
          chart: {
            title: ' ',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

                <div id="columnchart_material" style="width: 100%; height: 500px;"></div>    
                </div>
            </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?php include "includes/footer.php" ?>