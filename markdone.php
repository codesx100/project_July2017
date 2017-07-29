<?php
require_once 'database.php';

$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$word = 'yes':

if ($product_id != false && $category_id != false) {
 $query ="UPDATE Events 
          SET Done=:word 
          WHERE itemID = :product_id";
  $statement = $db->prepare($query);
  $statement->bindValue(':word', $word);
  $success = $statement->execute();
  $statement->closeCursor();    
}

// Display the Product List page
include('index.php');