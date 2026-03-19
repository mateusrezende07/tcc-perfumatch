<?php
include(__DIR__ . "/../includes/conexao.php");

// define o perfume atual
$perfume_nome = "Dior Sauvage"; // muda dinamicamente depois
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<title>Perfumes Importados</title>

<link rel="stylesheet" href="../includes/style.css">

<style>

/* HEADER FIXO */
.header{
position:fixed;
top:0;
left:0;
width:100%;
z-index:999;
background:#021c34;
display:flex;
align-items:center;
justify-content:space-between;
padding:10px 20px;
box-shadow:0 2px 10px rgba(0,0,0,0.5);
}

/* ESPAÇO DO HEADER */
body{
padding-top:80px;
}

/* GRID DOS PERFUMES */
.perfume-grid{
display:grid;
grid-template-columns:repeat(auto-fill, 200px);
gap:25px;
margin:40px;
padding-left:40px;
}

/* CARD PERFUME */
.perfume-box{
background:#021c34;
border-radius:10px;
overflow:hidden;
text-decoration:none;
border:1px solid #043a63;
transition:0.3s;
width:200px;
}

/* HOVER */
.perfume-box:hover{
transform:scale(1.05);
box-shadow:0 0 10px #00bfff;
}

/* IMAGEM */
.perfume-box img{
width:100%;
height:220px;
object-fit:contain;
background:#031d36;
padding:10px;
}

/* NOME */
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

<h2 class="titulo-centro">Perfumes Importados</h2>

<div class="perfume-grid">

<?php

$sql = "SELECT * FROM perfumes WHERE tipo='importado'";
$resultado = mysqli_query($conexao,$sql);

while($perfume = mysqli_fetch_assoc($resultado)){

// 🔥 melhora o link (remove espaços e deixa seguro)
$pagina = strtolower(str_replace(" ","",$perfume['nome']));
$pagina = preg_replace('/[^a-z0-9]/', '', $pagina);

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