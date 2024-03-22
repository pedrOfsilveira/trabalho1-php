<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit form</title>
</head>

<body>

    <h1> Mistakes were made... no problem, just do it again (but do it right)!</h1>

    <?php
    $id_show = $_POST['id_edit'];

    $conexao =  mysqli_connect("127.0.0.1", "root", "", "review");
    $query = "SELECT title, director, rating FROM movie WHERE id=$id_show";

    $resultado = mysqli_query($conexao, $query);
    $linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    ?>

    <form action="index.php" method="POST">

        <label for="title_edit"> Title: </label>
        <input type="text" name="title_edit" value="<?= $linha['title'] ?>">

        <label for="director_edit"> Director: </label>
        <input type="text" name="director_edit" value="<?= $linha['director'] ?>">

        <label for="rating_edit"> Rating: </label>
        <input type="number" name="rating_edit" value="<?= $linha['rating'] ?>">

        <button type="submit" name="id_edited" value="<?= $id_show ?>">Add</button>

    </form>

    <a href="index.php">Done adding movies? Let's see them all... </a>


</body>

</html>