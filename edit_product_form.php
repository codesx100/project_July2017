<!--//This page is the form you would see after clicking Update on any list items
//
//Here you are to change the list's items, but using this form and edit_product.php
-->
<?php
require('database.php');


// Get name for selected category
$queryCategory = 'SELECT * FROM Lists
                  WHERE ListID = :category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['categoryName'];
$statement1->closeCursor();

// Get all categories
$query = 'SELECT * FROM Lists
                       ORDER BY ListID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

// Get products for selected category
$queryProducts = 'SELECT * FROM Events
                  WHERE ListID = :category_id
                  ORDER BY itemID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();

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
        <h1></h1>
        
<!-- call the controller for user inputs -->
   
         <form action="edit_product.php" method="post"
              id="edit_product_form"> 
        
<!-- gets item_id for controller-->

<!--this is for Updating the SQL database by itemID -->
            <input type="hidden" name="product_id"
                           value="<?php echo $product['itemID']; ?>"> 
            
<!-- make a dropbox for categories(Lists)-->

            <label>List:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['ListID']; ?>">
                    <?php echo $category['ListName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

<!-- dropbos for products (Events/Items)-->
            
<!-- Get old name -->

            <label>Old Name:</label>
            <select name="product_id">
            <?php foreach ($products as $product) : ?>
              <option value="<?php echo $product['EventID']; ?>">
                    <?php echo $product['EventName']; ?>
                </option> 
            <?php endforeach; ?>
            </select><br>
            
<!-- Get old names ItemID and ListID -->

              <?php echo $product['itemID']; ?>
              <?php echo $product['ListID']; ?>
            
<!-- Get new name for edit_product.php-->

            <label>New Name:</label>
            <input type="text" name="code"><br>
            
<!-- get new description which is the EventName in the SQL database-->

            <label>New Description:</label>
            <input type="text" name="name"><br>

<!-- submit button-->

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