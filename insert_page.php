<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ReView - Insert</title>
</head>

<body>

  <h1> Tell us about the movie! </h1>

  <form action="insert.php" method="post">

    <label for="title"> Title: </label>
    <input type="text" name="title">

    <label> Director: </label>
    <input type="text" name="director">

    <label for="rating"> Rating: </label>
    <input type="number" name="rating">

    <label for="cover"> Cover: </label>
    <input type="file" name="cover">

    <button type="submit" name="submit">Add</button>

  </form>

  <a href="index.php">Done adding movies? Let's see them all... </a>

</body>

</html>