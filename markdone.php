<?php

require_once ('database.php');

$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$done = 'yes';

if ($product_id != false && $category_id != false) {
 $query ='UPDATE Events 
          SET Done = "yes"
          WHERE Events.itemID = :product_id';
  $statement = $db->prepare($query);
//  $statement->bindValue(':done', $done);
  $statement->execute();
  $statement->closeCursor();    
}

// Display the Product List page
include('index.php');
?>
