<form action="" method= "post">
    <div class="form-group">
        <label for="cat-title">Edit Categories</label>
        <?php

        if(isset($_GET['edit'])){
            $cat_id= $_GET['edit'];

        
            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $select_categories_id= mysqli_query($conn, $query);
        
            while($row= mysqli_fetch_assoc($select_categories_id)){
                $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];
                ?> 
                <input class= "form-control" type="text" value=<?php if(isset($cat_title)){echo $cat_title;} ?> name="cat_title">

                <?php
                }
            }
    ?>
    <? 
    //UPDATE CATEGORY
        $query = "SELECT * FROM categories";
        $select_categories= mysqli_query($conn, $query);
    
        if(isset($_POST['update'])){
            $the_cat_title= $_POST['cat_title'];
            $query= "UPDATE categories SET cat_title= '{$the_cat_title}' WHERE cat_id= {$cat_id}";
            $update_query= mysqli_query($conn, $query);
            if(!$update_query){
                die('Query failed '. mysqli_error($conn));
            }
        
            header("Location: categories.php");
        }
?>
                            </div>
                            <div class="form-group">
                                <input class= "btn btn-primary" name = "update" type="submit" value="Update">
                            </div>
                        </form>