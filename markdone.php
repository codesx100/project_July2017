<?php
//this file will create a button that when clicked puts a yes under the completed column
require_once ('database.php');

$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$done = 'yes';

if (category_id == null || $product_id == null ) {
    $error = "Invalid List ID.";
    include('error.php');
}else{

 $query = "UPDATE `oah5`.`Events` SET `Done` = 'yes' WHERE `Events`.`itemID` = '$product_id';";
  $statement = $db->prepare($query);
//  $statement->bindValue(':done', $done);
  $statement->execute();
  $statement->closeCursor();    


// Display the Product List page
include('index.php');
}
?>
