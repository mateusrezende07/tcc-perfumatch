<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<title>PerfumeMatch</title>

<link rel="stylesheet" href="includes/style.css">

</head>

<body>

<header class="header">

<div class="logo-area">

<img src="imagens/logo.png" class="logo">

<h1 class="logo-text">PERFUMATCH</h1>

</div>


<div class="search-area">

<form action="buscar.php" method="GET">

<input type="text" name="pesquisa" placeholder="Pesquisar perfume..." required>

<button type="submit">🔍</button>

</form>

</div>


<div class="perfil-area">

<?php

if(isset($_SESSION['nome'])){

echo "<a href='perfil/perfil.php' class='btn-perfil'>".$_SESSION['nome']."</a>";

}else{

echo "

<a href='perfil/criarperfil.php' class='btn-perfil'>Cadastrar</a>
<a href='perfil/entrar.php' class='btn-perfil'>Entrar</a>

";

}

?>

</div>

</header>


<div class="linha"></div>


<section class="filtros">

<div class="dropdown">

<button class="btn-filtro">Tipos de Perfumaria ▾</button>

<div class="dropdown-conteudo">

<a href="tipos/importado.php">Importado</a>
<a href="tipos/nacional.php">Nacional</a>
<a href="tipos/arabe.php">Árabe</a>
<a href="tipos/nicho.php">Nicho</a>

</div>

</div>


<div class="dropdown">

<button class="btn-filtro">Ocasião ▾</button>

<div class="dropdown-conteudo">

<a href="ocasiao/encontro.php">Encontro</a>
<a href="ocasiao/escola.php">Escola</a>
<a href="ocasiao/trabalho.php">Trabalho</a>
<a href="ocasiao/balada.php">Balada</a>
<a href="ocasiao/academia.php">Academia</a>
<a href="ocasiao/reuniao.php">Reunião</a>

</div>

</div>

</section>


<section class="hero">

<h2>Descubra sua assinatura olfativa</h2>

<p>Encontre o perfume ideal para cada momento.</p>

</section>


<section class="formulario-area">

<a href="formulario.php" class="btn-formulario">
Responder Formulário de Preferências
</a>

</section>


<section class="lancamentos">

<h2 class="titulo-lancamento">Novos Lançamentos</h2>


<div class="carrossel-container">

<button class="seta esquerda" onclick="rolar(-1)">❮</button>


<div class="carrossel">

<div class="card"><img src="imagens/lebeaunarcisse.jpg"></div>
<div class="card"><img src="imagens/lemaleinblue.webp"></div>
<div class="card"><img src="imagens/phantomred.png"></div>
<div class="card"><img src="imagens/adgedpintense.jfif"></div>
<div class="card"><img src="imagens/purplemelancolia.png"></div>
<div class="card"><img src="imagens/scandalelixir.jfif"></div>
<div class="card"><img src="imagens/swuspices.webp"></div>
<div class="card"><img src="imagens/swyporwerfully.png"></div>

</div>


<button class="seta direita" onclick="rolar(1)">❯</button>

</div>

</section>


<script src="includes/script.js"></script>

</body>

</html>