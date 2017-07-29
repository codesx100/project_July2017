<?php
require('database.php');
$query = 'SELECT *
          FROM Lists
          ORDER BY ListID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
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
    <header><h1>Item Adding Manager</h1></header>

    <main>
        <h1></h1>
        <form action="add_product.php" method="post"
              id="add_product_form">

            <label>List:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['ListID']; ?>">
                    <?php echo $category['ListName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Name:</label>
            <input type="text" name="code"><br>

            <label>Description:</label>
            <input type="text" name="name"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Item/Event"><br>
        </form>
        <p><a href="index.php">View Event List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Oliver Howarth.</p>
    </footer>
</body>
</html>