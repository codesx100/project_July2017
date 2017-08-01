<!--//This page is the form you would see after clicking Update on any list items
//
//Here you are to change the list's items, but using this form and edit_product.php
-->
<?php
require('database.php');

$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$product_id_2 = $product_id;
//echo $product_id_2;
?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My ToDo Lists</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Item Editing Manager</h1></header> 
    <main>
         <form action="edit_product.php" method="post"> 
            <input type="hidden" name="product_id" value="<?php echo "$product_id_2"; ?>"> 
             
            <label>New Name:</label>
            <input type="text" name="newcode"><br>

            <label>New Description:</label>
            <input type="text" name="newname"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Change Item/Event"><br>
        </form>
        <p><a href="index.php">View Event List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Oliver Howarth.</p>
    </footer>
</body>
</html>