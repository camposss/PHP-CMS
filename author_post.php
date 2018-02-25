<?php
include ('includes/db.php');
include ('includes/header.php');
session_start();
?>

    <!-- Navigation -->
<?php include ('includes/nav.php'); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">

                <?php 
                if(isset($_GET['p_id'])){
                    $the_post_id= $_GET['p_id'];
                    $the_post_author= $_GET['author'];
                }


            $query= "SELECT * FROM posts WHERE post_author ='{$the_post_author}'";
                $select_all_posts_query= mysqli_query($conn, $query);
                while($row= mysqli_fetch_assoc($select_all_posts_query)){
                    $post_title= $row['post_title'];
                    $post_author= $row['post_author'];
                    $post_date= $row['post_date'];
                    $post_image= $row['post_image'];
                    $post_content= $row['post_content'];
                    
                    ?>
                    
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href=""> <?php echo $post_title ?> </a>
                </h2>
                <p class="lead">
                    All Posts by: <?php echo $post_author ?> </a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?> </p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?> </p>
                <hr>
                <?php }

                ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
<?php
include ('includes/footer.php');

?>

