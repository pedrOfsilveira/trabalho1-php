<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu sistema</title>
</head>
<body>

    <h1> Formulário de UPLOAD </h1>

    <form action="listar_dados_imagens.php"  method="post" enctype="multipart/form-data" >
        <label> Nome: </label>
        <input type="text" name="nome"  >
        <label> Imagem: </label>
        <input name="arquivo" type="file" />
        <button type="submit" name="submit">Enviar</button>
    </form>
    
</body>
</html>