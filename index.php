<?php

$conexao =  mysqli_connect("127.0.0.1", "root", "", "review");
$targetDir = "uploads/";

if (isset($_POST["submit"])) {

  if (!empty($_FILES["cover"]["name"])) {
    $fileName = basename($_FILES["cover"]["name"]);

    $fileNameModified = date("YmdHis") . $fileName;

    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $targetFilePath = $targetDir . $fileNameModified;

    // permite formatos de imagens abaixo
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
      // Upload file to server 
      if (move_uploaded_file($_FILES["cover"]["tmp_name"], $targetFilePath)) {
        // Insert image file name into database 
        $query = "INSERT INTO movie (cover) VALUES ('$fileNameModified')";
        $insert = mysqli_query($conexao, $query);
        if ($insert) {
          $statusMsg = " O nome e o arquivo " . $fileName . " foram inseridos com sucesso!<br>";
        } else {
          $statusMsg = "Erro ao realizar o upload do arquivo";
        }
      } else {
        $statusMsg = "Erro ao realizar o upload do arquivo";
      }
    } else {
      $statusMsg = 'Formato inválido.';
    }
  } else {
    $statusMsg = 'Please select a file to upload.';
  }
}



if (!empty($_POST['id_edited'])) {
  $title_edit = $_POST['title_edit'];
  $director_edit = $_POST['director_edit'];
  $rating_edit = $_POST['rating_edit'];
  $cover_edit = $_POST['cover_edit'];
  $id_edited = $_POST['id_edited'];

  $query_edit = "UPDATE movie SET title='$title_edit', director='$director_edit', cover='$cover_edit' WHERE id=$id_edited";
  mysqli_query($conexao, $query_edit);
}

if (!empty($_POST["id_remove"])) {
  $id_remove = $_POST["id_remove"];
  $query_remove = "DELETE FROM movie WHERE id=$id_remove";
  mysqli_query($conexao, $query_remove);
}

$query = "SELECT id, title, director, rating, cover FROM movie";
$resultado = mysqli_query($conexao, $query);
?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Director</th>
      <th scope="col">Rating</th>
      <th scope="col">Cover</th>
    </tr>
  </thead>

  <tbody>
    <?php
    while ($linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
      echo
      "<tr>" .
        "<td>" . $linha['id'] . "</td>" .
        "<td>" . $linha['title'] . "</td>" .
        "<td>" . $linha['director'] . "</td>" .
        "<td>" . $linha['rating'] . "</td>" .
        "<td> <img src='./uploads/" . $linha['cover'] . "' width='100' height='100'></td>"
    ?>
      <td>
        <form action="index.php" method="POST">
          <button type="submit" name="id_remove" value="<?= $linha['id'] ?>">Delete</button>
        </form>
      </td>

      <td>
        <form action="edit.php" method="POST">
          <button type="submit" name="id_edit" value="<?= $linha['id'] ?>">Edit</button>
        </form>
      </td>
      </tr>


    <?php
    }
    ?>

    <a href="insert_page.php"> Add more entries. </a>

  </tbody>
</table>