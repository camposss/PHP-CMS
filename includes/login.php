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
    // echo $password;
}

$username=mysqli_real_escape_string($conn, $username);
$password=mysqli_real_escape_string($conn, $password);

$query= "SELECT * FROM users WHERE username= '{$username}'";
$select_user_query= mysqli_query($conn, $query);
if(!$select_user_query){
    die('Query Failed '.mysqli_error($conn));
}

// echo $password; 

while($row= mysqli_fetch_array($select_user_query)){
    $db_id= $row['user_id'];
    $db_username= $row['username'];
    $db_password= $row['user_password'];
    $db_firstname= $row['user_firstname'];
    $db_lastname= $row['user_lastname'];
    $db_role= $row['user_role'];

}

// $password= crypt($password, $db_password);
if(password_verify($password, $db_password)){
    echo "password is valid!";
}else{
    echo "something went wrong during the password verify";
};

// echo "password validated? ". $password_validated;

echo "Encrypted password " . $password . "<br/>";
echo "Database password ". $db_password;


if($username === $db_username){
    $_SESSION['username']= $db_username;
    // $_SESSION['password']= $db_password;
    $_SESSION['firstname']= $db_firstname;
    $_SESSION['lastname']= $db_lastname;
    $_SESSION['role']= $db_role;

    if($_SESSION['role']!=='subscriber'){
        header("Location: ../admin");
    }else{
        // header("Location: ../index.php");
        // echo "Login was successful";
    }
}else{
    echo "Something went wrong with the passsword";
    // header("Location: ../index.php");
}


?>