<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM Lists
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
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>ToDo Event Manager</h1></header>
<main>
    <h1>Lists List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
            <th>Change List Name</th>
        </tr>        
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['ListName']; ?></td>
            <td>
                <form action="delete_category.php" method="post">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['ListID']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
            <td>
            <form>
                  <form action="edit_category.php" method="post">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['ListID']; ?>"/>
                    <label>New Name:</label>
                    <input type="text" name="newname"/>
                    <input id="edit_category_button" type="submit" value="Update"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>  
    </table>
    <h2 class="margin_top_increase">Add Category</h2>
    <form action="add_category.php" method="post"
          id="add_category_form">
        <label>Name:</label>
        <input type="text" name="name" />
        <input id="add_category_button" type="submit" value="Add"/>
    </form>
    
    <p><a href="index.php">List Events</a></p>

</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Oliver Howarth.</p>
</footer>
</body>
</html>