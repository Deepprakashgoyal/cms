<?php include "includes/header.php" ?>
<?php include "../include/database.php" ?>




    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome in Post Section
                        </h1>
                        <?php 
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];

                        }else{
                            $source = '';
                        }
                        switch ($source) {
                            case 'add_post':
                               include "includes/add_posts.php";
                                break;
                                  case 'edit_post':
                               include "includes/edit_post.php";
                                break;
                                  case '100':
                                echo "hello100";
                                break;
                                  case '152':
                                echo "hello152";
                                break;

                            
                            default:
                                include "includes/view_all_posts.php";
                                break;
                        }





                         ?>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?php include "includes/footer.php" ?>