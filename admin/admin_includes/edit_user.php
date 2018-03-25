<?php
if(isset($_GET['edit_user'])){
    $the_user_id= $_GET['edit_user'];
    $query = "SELECT * FROM users WHERE user_id =$the_user_id";
    $select_user_query= mysqli_query($conn, $query);
    confirmQuery($select_user_query);
    if(!$select_user_query){
        die('Query Failed '.mysqli_error($select_user_query));
    }
    while($row= mysqli_fetch_assoc($select_user_query)){
        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_password=$row['user_password'];
        $firstname=$row['user_firstname'];
        $lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_image =$row['user_image'];
        $user_role= $row['user_role'];
    }
}
if(isset($_POST['edit_user'])){
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
    $query = "SELECT randSalt FROM users";
    $select_randsalt_query= mysqli_query($conn, $query);
    if(!$select_randsalt_query){
        die("Query Failed" .mysqli_error($conn));
    }
    $row= mysqli_fetch_array($select_randsalt_query);
    $salt= $row['randSalt'];
    $hashed_password = crypt($user_password, $salt);

    $query= "UPDATE users SET ";
    $query.= "username = '{$username}', ";
    $query.= "user_password = '{$hashed_password}', ";
    $query.= "user_firstname = '{$firstname}', ";
    $query.= "user_lastname = '{$lastname}', ";
    $query.= "user_email = '{$user_email}', ";
    // $query.= "user_image = '{$user_image}', ";
    $query.= "user_role = '{$user_role}' ";
    $query.= " WHERE user_id = {$the_user_id}";
    $update_user = mysqli_query($conn, $query);

    confirmQuery($update_user);

    if(!$update_user){
        die('query failed' .mysqli_error($conn));
    }
}
?>
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
        <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
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
    <input type="password" class="form-control" name="user_password" value= <?php echo $user_password ?> />
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_user" value="Add User" >
</div>
</form>