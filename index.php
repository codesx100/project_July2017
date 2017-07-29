<?php
require_once('database.php');

//Insert Session
$lifetime = 60*60*24*14; //2 weeks
session_set_cookie_params($lifetime, '/');
session_start();



// Get category ID
if (!isset($category_id)) {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
}
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
    <title>My ToDo</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>ToDo List Manager</h1></header>
<main>
    <h1>Event List</h1>

    <section>
        <!-- display a lists -->
        <h2>Lists</h2>
        <nav>
        <ul>
            <?php foreach ($categories as $category) : ?>
            <li><a href=".?category_id=<?php echo $category['ListID']; ?>">
                    <?php echo $category['ListName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
            <td><form action="category_list.php" method="post">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['itemID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['ListID']; ?>">
                    <input type="submit" value="Add/Delete/Edit Lists">
                </form>
                </td>   
        </ul>
        </nav>          
    </section>
    
   <section>
        <h2><?php echo $category_name; ?></h2>
        <h1>List Items</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Information</th>
                <th>Completed</>
                <th>&nbsp;</th> 
                <th>&nbsp;</th> 
            </tr>
         
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['EventCode']; ?></td>
                <td><?php echo $product['EventName']; ?></td>
                <td><?php echo $product['Done']; ?></td>
                <td><form action="delete_product.php" method="post">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['itemID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['ListID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
                
                <td><form action="markdone.php" method="post">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['itemID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['ListID']; ?>">
                    <input type="submit" value="Completed">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_product_form.php">Add To List</a></p>
        <p><a href="category_list.php">ToDo Lists</a></p>        
  </section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Oliver Howarth.</p>
</footer>
</body>
</html>