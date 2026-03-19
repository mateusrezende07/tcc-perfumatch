<?php
include("includes/conexao.php");

$pesquisa = $_GET['pesquisa'];

$sql = "SELECT * FROM perfumes WHERE nome LIKE '%$pesquisa%'";
$resultado = mysqli_query($conexao,$sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<title>Resultado da Pesquisa</title>

<link rel="stylesheet" href="includes/style.css">

</head>

<body>

<h2 style="text-align:center;margin-top:40px;">
Resultados para "<?php echo $pesquisa ?>"
</h2>

<div style="width:80%;margin:auto;margin-top:40px;">

<?php

if(mysqli_num_rows($resultado) > 0){

while($perfume = mysqli_fetch_assoc($resultado)){

echo "

<div class='card' style='display:inline-block;margin:10px;text-align:center;'>

<img src='uploads/".$perfume['imagem']."' style='width:150px;'>

<p>".$perfume['nome']."</p>

</div>

";

}

}else{

echo "

<h3 style='text-align:center;color:red;'>
Nenhum perfume encontrado 😢
</h3>

";

}

?>

</div>

</body>

</html>