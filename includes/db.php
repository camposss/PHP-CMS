<?php 

$db['db_host']= 'localhost';
$db['db_user']= 'root';
$db['db_pass']= 'root';
$db['db_name']= 'cms';
// $db['db_name']= 3306;


foreach($db as $key => $value){
    //upper case it to make it a constant
    define(strtoupper($key), $value);
}



$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($conn){
echo "We are connected";
}

?>