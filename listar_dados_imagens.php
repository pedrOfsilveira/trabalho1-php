<?php

$targetDir = "uploads/"; 
 
if(isset($_POST["submit"])){ 

    $conexao =  mysqli_connect("127.0.0.1","root","","IMAGENS");
    $nome = $_POST["nome"];

    if(!empty($_FILES["arquivo"]["name"])){ 
        $fileName = basename($_FILES["arquivo"]["name"]);

        $fileNameModified = date("YmdHis").$fileName;

        $targetFilePath = $targetDir . $fileName ; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
        $targetFilePath = $targetDir.$fileNameModified; 
     
        // permite formatos de imagens abaixo
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to server 
            if(move_uploaded_file($_FILES["arquivo"]["tmp_name"], $targetFilePath)){ 
                // Insert image file name into database 
                $query = "INSERT INTO imagem_funcionarios (nome,caminho) VALUES ('$nome','$fileNameModified')";
                $insert = mysqli_query($conexao,$query); 
                if($insert){ 
                    $statusMsg = " O nome e o arquivo ".$fileName. " foram inseridos com sucesso!<br>"; 
                }else{ 
                    $statusMsg = "Erro ao realizar o upload do arquivo"; 
                }  
            }else{ 
                $statusMsg = "Erro ao realizar o upload do arquivo"; 
            } 
        }else{ 
            $statusMsg = 'Formato inválido.'; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
} 

echo $statusMsg;



$conexao =  mysqli_connect("127.0.0.1","root","","IMAGENS");
$query = "SELECT id,nome,caminho FROM imagem_funcionarios";
$resultado = mysqli_query($conexao,$query);

?>


<table class="table">
  <thead>
    <tr>
    <th >id<th>
    <th >Nome</th>
    <th >Caminho</th>
    <th> Imagem </th>


    </tr>
  </thead>
  <tbody>


<?php

while($linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
    echo "<tr> <td>".$linha['id']."</td> <td>".$linha['nome']."</td>
    <td>".$linha['caminho']."</td>
    <td> <img src='./uploads/".$linha['caminho']."' width='100' height='100'></td>
    
    </tr>";
?>


<?php    
}
?>

<a href="formulario_upload.php"> clique aqui para voltar </a>

</tbody>
</table>




