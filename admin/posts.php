<?php include "./admin_includes/admin_header.php" ?>

    <div id="wrapper">

        <? include "./admin_includes/admin_nav.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                <h1 class="page-header">
                        Welcome Christian
                            <small>You are the admin</small>
                        </h1>
                <?php 
                   if(isset($_GET['source'])) {
                       $source= $_GET['source'];
                   }else{
                       $source= '';
                   }
                   switch($source){
                       case 'add_post':
                        include "./admin_includes/add_posts.php";
                        break;
                       case 'edit_post':
                        include "./admin_includes/edit_posts.php";
                        break;
                       case '100':
                        echo "NICE";
                        break;
                       default: 
                       include "./admin_includes/view_all_posts.php";
                       echo "default";
                   }
                ?>
                    </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include "./admin_includes/admin_footer.php" ?>