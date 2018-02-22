<div class="col-lg-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php
                     
    $query = "SELECT * FROM users";
    $select_users= mysqli_query($conn, $query);
    while($row= mysqli_fetch_assoc($select_users)){

        $user_id=$row['user_id'];
        $user_password=$row['user_password'];
        $firstname=$row['user_firstname'];
        $lastname=$row['user_lastname'];
        $username=$row['username'];
        $user_email=$row['user_email'];
        $user_image =$row['user_image'];
        $user_role= $row['user_role'];

        echo "<tr>";

        echo "<td>{$user_id}</td>";
        echo "<td>{$firstname}</td>";
        echo "<td>{$lastname}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$user_email}</td>";
        // echo "<td>{$user_image}</td>";
        echo "<td>{$user_role}</td>";

        

        // $query = "SELECT * FROM categories WHERE cat_id = $post_category";
        // $select_categories_id= mysqli_query($conn, $query);
    
        // while($row= mysqli_fetch_assoc($select_categories_id)){
        //     $cat_id=$row['cat_id'];
        //     $cat_title=$row['cat_title'];
        // echo "<td>{$comment_email}</td>";
        // echo "<td>{$comment_status}</td>";

        // $query= "SELECT * from posts where post_id= $comment_post_id";
        // $select_post_id_query= mysqli_query($conn, $query);
        // while($row=mysqli_fetch_assoc($select_post_id_query)){
        //     $post_id= $row['post_id'];
        //     $post_title=$row['post_title'];

        //     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

        // }


        echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
        echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
        echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
        echo "</tr>";
        }

?>
        </table>
<?php 


if(isset($_GET['change_to_admin'])){
    $user_id= $_GET['change_to_admin'];
    $query= "UPDATE users SET user_role ='admin' WHERE user_id= $user_id";
    $approve_comment_query= mysqli_query($conn, $query);
    header("Location: users.php");   
}


if(isset($_GET['change_to_subscriber'])){
    $user_id= $_GET['change_to_subscriber'];
    $query= "UPDATE users SET user_role ='subscriber' WHERE user_id= $user_id";
    $approve_comment_query= mysqli_query($conn, $query);
    header("Location: users.php");   
}



if(isset($_GET['delete'])){
    $user_id= $_GET['delete'];
    $query= "DELETE FROM users WHERE user_id = {$user_id}";
    $delete_user_query= mysqli_query($conn, $query);
    header("Location: users.php");
}


?>