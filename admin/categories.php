<?php include "./admin_includes/admin_header.php" ?>
    <div id="wrapper">
        <? include "./admin_includes/admin_nav.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Welcome Christian
                            <small>You are the admin</small>
                        </h1>
                    </div>
                    <div class="col-xs-6">
<?php insert_categories();?>
                        <form action="" method= "post">
                            <div class="form-group">
                                <label for="cat-title">Add Categories</label>
                                <input class = "form-control" name = "cat_title" type="text">
                            </div>
                            <div class="form-group">
                                <input class= "btn btn-primary" name = "submit" type="submit" value="Add Category">
                            </div>
                        </form>
<?php
//update and include query
if(isset($_GET['edit'])){
    $cat_id= $_GET['edit'];
    include 'admin_includes/update_categories.php';
}
?>
                    </div>
                    <div class="col-xs-6">
                        <table class= "table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
<?php findAllCategories();?>
<?php deleteCategory();?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include "./admin_includes/admin_footer.php" ?>
