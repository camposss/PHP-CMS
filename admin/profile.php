<?php include "./admin_includes/admin_header.php" ?>
<?php
if(isset($_SESSION['username'])){
    $username= $_SESSION['username'];

$query= "SELECT * FROM users WHERE username = '{$username}'";
$select_user_profile= mysqli_query($conn,$query);

    while($row= mysqli_fetch_array($select_user_profile)){
        $user_id=$row['user_id'];
        $user_password=$row['user_password'];
        $firstname=$row['user_firstname'];
        $lastname=$row['user_lastname'];
        $username=$row['username'];
        $user_email=$row['user_email'];
        // $user_image =$row['user_image'];
        $user_role= $row['user_role'];
    }
}

?>
<?php 
if(isset($_POST['update_profile'])){

    $username=$_POST['username'];
    $user_password=$_POST['user_password'];
    $firstname=$_POST['user_firstname'];
    $lastname=$_POST['user_lastname'];
    $user_email=$_POST['user_email'];
    // $user_image =$row['user_image'];
    $user_role= $_POST['user_role'];

    // move_uploaded_file($post_image_temp, "../images/$post_image");

    // if(empty($post_image)){
    //     $query= "SELECT * FROM users WHERE user_id=$the_user_id";
    //     $select_image= mysqli_query($conn,$query);
    //     while($row= mysqli_fetch_array($select_image)){

    //         $post_image= $row['post_image'];
    //     }
        
    // }

    $query= "UPDATE users SET ";
    $query.= "username = '{$username}', ";
    $query.= "user_password = '{$user_password}', ";
    $query.= "user_firstname = '{$firstname}', ";
    $query.= "user_lastname = '{$lastname}', ";
    $query.= "user_email = '{$user_email}', ";
    // $query.= "user_image = '{$user_image}', ";
    $query.= "user_role = '{$user_role}' ";
    $query.= " WHERE username = '{$username}'";

    $update_user = mysqli_query($conn, $query);

    confirmQuery($update_user);

    if(!$update_user){
        die('query failed' .mysqli_error($conn));
    }
}


?>
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


                    </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->


<form action="" method= "post" enctype="multipart/form-data" >

<div class="form-group">
    <label for="">First Name</label>
    <input type="text" class="form-control" name="user_firstname" value="<?php echo $firstname ?>">
</div>
<div class="form-group">
    <label for="">Last Name</label>
    <input type="text" class="form-control" name="user_lastname" value="<?php echo $lastname ?>">
</div>
<div class="form-group">
    <select name="user_role" id="">
        <option value="subscriber"><?php echo $user_role ?></option>

    <?php 
        if($user_role=='admin'){
           echo "<option name='user_role' value='subscriber'>subscriber</option>";
        }else{
            echo "<option name='user_role' value='admin'>admin</option>";
        }
    ?>
            <!-- <option value="subscriber">Select Options</option>     -->
    </select>
</div>

<!-- <div class="form-group">
    <label for="">Post Image</label>
    <input type="file"name="image">
</div> -->


<div class="form-group">
    <label for="">Username</label>
    <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>" />
</div>
<div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>"/>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile" >
</div>


</form>
        </div>


        <!-- /#page-wrapper -->

<?php include "./admin_includes/admin_footer.php" ?>
