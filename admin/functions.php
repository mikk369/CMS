<?php 
function insert_categories() {
    global $connection;
    if(isset($_POST["submit"])) {
        if(isset($_POST["cat_title"]) && !empty($_POST["cat_title"])) {
            $cat_title = $_POST["cat_title"];

            $query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";
            $create_category_query = mysqli_query($connection,$query);
            if(!$create_category_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        } else {
            echo '<span style="color: red;">Enter category</span>';
        }
    }
}

function findAllCategories() {
    global $connection;
    $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($select_categories)){
             $cat_id =  $row['cat_id'];
             $cat_title =  $row['cat_title'];
            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
             echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Update</a></td>";
            echo "<tr>";
        }
}

function deleteCategorie() {
    global $connection;
    if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        mysqli_query($connection,$query);
          header("Location: categories.php");
    }
}

?>