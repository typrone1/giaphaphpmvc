<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h1>Xin chào</h1>
    <?php
    echo $name;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            echo $_POST['name'];
        }
    ?>
    <form method="post">
        <input type="text" name="name">
        <input type="submit" value="Submit">
    </form>
</body>
</html>