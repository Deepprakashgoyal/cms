<?php include "include/database.php" ?>
<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                    <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>
    
    <!--Login form-->

    <div class="well">
        <h4>Login</h4>
        <form action="include/login.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username">
                
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
               
            </div>
            <div class="form-group">
                 <button class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
        <!-- /.input-group -->
    </div>
    <!-- Blog Categories Well -->
    <div class="well">

        <!-- query for fetching catagories from database -->

        <?php
        
        $query = "SELECT * FROM category";
        $sidebar_category_query = mysqli_query($connection, $query);
        if(!$sidebar_category_query){
        die("QUERY FAILED" . mysqli_error($connection));
        }
        
        ?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php
                    while ($row = mysqli_fetch_assoc($sidebar_category_query)) {
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    echo "<li><a href='category.php?category=$cat_id'>$cat_title</a></li>";
                    }
                    ?>
                    
                </ul>
            </div>
            <!-- /.col-lg-6 -->
           
<!-- /.col-lg-6 -->
</div>
<!-- /.row -->
</div>
<!-- Side Widget Well -->
  <?php include "widget.php" ?>