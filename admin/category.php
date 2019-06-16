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
                           Welcome in Category Section
                            
                        </h1>
                        
                    </div>
                    <div class="col-md-6">
                    <?php 

                    if (isset($_POST['submit'])) {
                        
                        $cat_title = $_POST['cat_title'];
                        if ($cat_title == "" || empty($cat_title)) {
                            echo "<h2>This field should not be empty</h2>";
                        }else{
                            $query = "INSERT INTO category(cat_title) VALUE ('$cat_title')" ;
                            $add_cat = mysqli_query($connection, $query);
                            if (!$add_cat) {
                                die("QUERY FAILED" . mysqli_error($connection));
                            }
                        }
                        }
                    






                     ?>



                        <form action="" method="post">
                        <div class="form-group">
                            <label>Add Category</label>
                            <input type="text" class="form-control" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="submit" value="submit">
                        </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                    <?php 

                    

                     ?>



                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CATEGORY TITLE</th>
                                    <th> </th>
                                </tr>
                            </thead>

                            
                            <tbody>
                                <?php 
                                $query = "SELECT * FROM category";
                                $select_category = mysqli_query($connection, $query);
                                if (!$select_category) {
                                 die("QUERY FAILED" . mysqli_error($connection));
                            }
                                 while ($row = mysqli_fetch_assoc($select_category)) {
                                   $cat_id = $row['cat_id'];
                                   $cat_title = $row['cat_title'];
                                   echo "<tr>";
                                   echo "<td>{$cat_id}</td>";
                                   echo "<td>{$cat_title}</td>";
                                   echo "<td><a href='category.php?del={$cat_id}'>Delete</a></td>";
                                   echo "</tr>";
                            }
                             ?>
                             <?php 
                            if (isset($_GET['del'])) {
                                $del_cat = $_GET['del'];
                                $query = "DELETE FROM category WHERE cat_id = {$del_cat}";
                                $the_cat_id = mysqli_query($connection, $query);
                                header("Location: category.php");
                                if (!$the_cat_id) {
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }
                            }
                              ?>
                                
                            </tbody>
                        </table>
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