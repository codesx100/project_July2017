<?php
// Get the product data
$product_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code', FILTER_VALIDATE_INT););
$name = filter_input(INPUT_POST, 'name', FILTER_VALIDATE_INT););

// Validate inputs
if ($category_id == null || $category_id == false || $product_id == null || $product_id == false || 
        $code == null || $name == null) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');
    
      // Update the product to the database  
    $query = 'UPDATE Events
                 (EventCode, EventName)
             Set
                 (:code, :name)
             WHERE itemID = :productID';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>