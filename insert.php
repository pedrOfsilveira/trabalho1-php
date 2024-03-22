<?php
$title = $_POST['title'];
$director = $_POST['director'];
$rating = $_POST['rating'];
$cover = $_POST['cover'];

$conexao =  mysqli_connect("127.0.0.1", "root", "", "review");
$query = "INSERT INTO movie (title, director, rating, cover) VALUES ('$title', '$director', $rating, '$cover')";

$resultado = mysqli_query($conexao, $query);

if ($resultado) {
    echo '<br>Movie added succesfully!<br>
        <a href="index.php">See them all.</a> <br>
        <a href="insert_page.php">Add more.</a>';
} else {
    echo "<br>Oops... something's wrong.";
}
