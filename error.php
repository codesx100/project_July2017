<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Error Page</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <header><h1>Error</h1></header>

    <main>
        <h2 class="top">Error</h2>
        <p><?php echo $error; ?></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?>Oliver Howarth</p>
    </footer>
</body>
</html>