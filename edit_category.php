<?php
// Get the category ID and name
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'newname');


// Validate inputs
if ($name == null || $category_id == null) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Edit the product to the database  
    $query = 'UPDATE Lists 
             SET ListName = :name
             WHERE ListID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':newname', $newname);
    $statement->execute();
    $statement->closeCursor();

    // Display the Category List page
    include('category_list.php');
}
?>