<?php
// Get the product data
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$newcode = filter_input(INPUT_POST, 'newcode');
$newname = filter_input(INPUT_POST, 'newname');


//echo $product_id;
//echo $newcode;
//echo $newname;
// Validate inputs
if ($product_id == null || $product_id == false || 
        $newcode == null || $newname == null) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');
    
      // Update the product to the database  
    $query = ("UPDATE `oah5`.`Events` SET `EventCode` = '$newcode', `EventName` = '$newname' WHERE `Events`.`itemID` = '$product_id';");
    $statement = $db->prepare($query);
  //  $statement->bindValue(':code', $code);
  //  $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>