<?php include "db.php";?>

<?php session_start();
if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    echo 'Set and not empty, and no undefined index error!';
 }
?>

<?php
if(isset($_POST['login'])){
    $username= $_POST['username'];
    $password=$_POST['password'];
}

$username=mysqli_real_escape_string($conn, $username);
$password=mysqli_real_escape_string($conn, $password);

$query= "SELECT * FROM users WHERE username= '{$username}'";
$select_user_query= mysqli_query($conn, $query);
if(!$select_user_query){
    die('Query Failed '.mysqli_error($conn));
}

while($row= mysqli_fetch_array($select_user_query)){
    $db_id= $row['user_id'];
    $db_username= $row['username'];
    $db_password= $row['user_password'];
    $db_firstname= $row['user_firstname'];
    $db_lastname= $row['user_lastname'];
    $db_role= $row['user_role'];


}
if($username=== $db_username && $password===$db_password){
    $_SESSION['username']= $db_username;
    // $_SESSION['password']= $db_password;
    $_SESSION['firstname']= $db_firstname;
    $_SESSION['lastname']= $db_lastname;
    $_SESSION['role']= $db_role;

    if($_SESSION['role']!=='subscriber'){
        header("Location: ../admin");
    }else{
        header("Location: ../index.php");
    }
}else{
    header("Location: ../index.php");
}


?>