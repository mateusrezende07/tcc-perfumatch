<?php
require_once("../includes/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Perfumes para Encontros</title>

<link rel="stylesheet" href="../includes/style.css">

<style>

.perfume-grid{
display:grid;
grid-template-columns:repeat(auto-fill,minmax(200px,1fr));
gap:25px;
max-width:1400px;
margin:40px auto;
padding:20px;
}

.perfume-box{
background:#021c34;
border-radius:10px;
overflow:hidden;
text-decoration:none;
border:1px solid #043a63;
transition:0.3s;
}

.perfume-box:hover{
transform:scale(1.05);
box-shadow:0 0 10px #00bfff;
}

.perfume-box img{
width:100%;
height:220px;
object-fit:contain;
background:#031d36;
padding:10px;
}

.perfume-title{
background:#05294a;
color:white;
text-align:center;
padding:12px;
font-weight:bold;
}

</style>

</head>

<body>

<?php require_once("../includes/header.php"); ?>

<h2 class="titulo-centro">Perfumes para Encontros</h2>

<div class="perfume-grid">

<?php

$sql = "SELECT * FROM perfumes WHERE FIND_IN_SET('encontro', ocasiao)";
$resultado = mysqli_query($conexao,$sql);

while($perfume = mysqli_fetch_assoc($resultado)){

$pagina = strtolower(str_replace(" ","",$perfume['nome']));

?>

<a class="perfume-box" href="../perfumes/<?php echo $pagina; ?>.php">

<img src="../uploads/<?php echo $perfume['imagem']; ?>">

<div class="perfume-title">
<?php echo $perfume['nome']; ?>
</div>

</a>

<?php } ?>

</div>

</body>
</html>