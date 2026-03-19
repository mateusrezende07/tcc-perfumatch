<?php

include("../includes/conexao.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

$nome = $_POST['nome'];
$tipo = $_POST['tipo'];

/* OCASIÕES */

if(isset($_POST['ocasiao'])){
    $ocasiao = implode(",", $_POST['ocasiao']);
}else{
    $ocasiao = "";
}

/* IMAGEM */

$imagem = $_FILES['imagem']['name'];
$tmp = $_FILES['imagem']['tmp_name'];

move_uploaded_file($tmp,"../uploads/".$imagem);

/* INSERT */

$sql = "INSERT INTO perfumes (nome,tipo,ocasiao,imagem)
VALUES ('$nome','$tipo','$ocasiao','$imagem')";

mysqli_query($conexao,$sql);

echo "<p style='color:lightgreen;text-align:center;'>Perfume adicionado com sucesso!</p>";

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<title>Adicionar Perfume</title>

<link rel="stylesheet" href="../includes/style.css">

</head>

<body>

<header class="header">

<div class="logo-area">

<a href="../index.php">
<img src="../imagens/logo.png" class="logo">
</a>

<h1 class="logo-text">PERFUMATCH</h1>

</div>

</header>

<h2 style="text-align:center;margin-top:40px;">
Adicionar Perfume
</h2>

<form method="POST" enctype="multipart/form-data"
style="width:400px;margin:auto;margin-top:40px;">

<label>Nome do perfume</label><br>
<input type="text" name="nome" required
style="width:100%;padding:10px;margin-bottom:15px;"><br>


<label>Tipo de Perfumaria</label><br>

<select name="tipo" required
style="width:100%;padding:10px;margin-bottom:15px;">

<option value="importado">Importado</option>
<option value="nacional">Nacional</option>
<option value="arabe">Árabe</option>
<option value="nicho">Nicho</option>

</select>


<label>Ocasiões</label><br>

<input type="checkbox" name="ocasiao[]" value="encontro"> Encontro<br>
<input type="checkbox" name="ocasiao[]" value="escola"> Escola<br>
<input type="checkbox" name="ocasiao[]" value="trabalho"> Trabalho<br>
<input type="checkbox" name="ocasiao[]" value="balada"> Balada<br>
<input type="checkbox" name="ocasiao[]" value="academia"> Academia<br>
<input type="checkbox" name="ocasiao[]" value="reuniao"> Reunião<br><br>


<label>Imagem do perfume</label><br>

<input type="file" name="imagem" required
style="margin-bottom:20px;"><br>


<button type="submit"
style="padding:10px 20px;background:#00bfff;border:none;border-radius:5px;cursor:pointer;">

Adicionar Perfume

</button>

</form>

</body>
</html>