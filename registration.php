<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php 
if(isset($_POST['submit'])){
    echo "we hit register or something";
    $username= $_POST['username'];
    $password= $_POST['password'];
    $email= $_POST['email'];

    if(!empty($username) &&  !empty($password) && !empty($email)){
        echo $username= mysqli_real_escape_string($conn, $username); 
        $password= mysqli_real_escape_string($conn, $password); 
        $email= mysqli_real_escape_string($conn, $username); 
        
        // $query= "SELECT randSalt FROM users";
        // $select_randsalt_query= mysqli_query($conn, $query);
        // if(!$select_randsalt_query){
        //     die("query failed". mysqli_error($conn));
        // }
        // $row= mysqli_fetch_array($select_randsalt_query);
        // $salt= $row['randSalt'];

        // $password= crypt($password, $salt);
        // $hash = password_hash($password, PASSWORD_BCRYPT);

        $password =sha1($password);
        
        $query= "INSERT INTO users (username, user_email, user_password, user_role)";
        $query .= "VALUES ('{$username}', '{$email}', '{$password}', 'subscriber')";
        $register_user_query= mysqli_query($conn, $query);
        if(!$register_user_query){
            die("Query Failed ". mysqli_error($conn). ''. mysqli_errno($conn));

        }
        // while($row= mysqli_fetch_array($select_randsalt_query)){
        //     echo $salt= $row['randSalt'];
        // }
        $message= "Your registration has be been submitted";
    }else{
        $message= "Fields cannot be empty";
    }
}else{
    $message= "";
}

?>
    <!-- Navigation -->
    <?php  include "includes/nav.php"; ?>
    <!-- Page Content -->
    <div class="container">
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <h6 class="text-center text-danger"><?php echo $message; ?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-success btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
        <hr>

<?php include "includes/footer.php";?>
