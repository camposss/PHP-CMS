<?php session_start();?>

<?php 

    $_SESSION['username']= null;
    // $_SESSION['password']= $db_password;
    $_SESSION['firstname']= null;
    $_SESSION['lastname']= null;
    $_SESSION['role']= null;

header("Location: ../index.php");
?>