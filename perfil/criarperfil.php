<?php
session_start();
include("../includes/conexao.php");

if(isset($_POST['nome'])){

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);

$verificar = "SELECT * FROM usuarios WHERE email='$email'";
$resultado = mysqli_query($conexao,$verificar);

if(mysqli_num_rows($resultado) > 0){

$erro = "Este email já possui conta.";

}else{

$sql = "INSERT INTO usuarios (nome,email,senha)
VALUES ('$nome','$email','$senha')";

mysqli_query($conexao,$sql);

$_SESSION['nome'] = $nome;

header("Location: ../index.php");
exit();

}

}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<title>Criar Conta</title>

<link rel="stylesheet" href="../includes/style.css">

<style>

.form-container{

width:420px;
margin:auto;
margin-top:120px;

background:#051937;

padding:40px;

border-radius:15px;

box-shadow:0 0 15px #00bfff;

}

.form-container h2{

text-align:center;
color:#00bfff;
margin-bottom:25px;

}

.form-container input{

width:100%;
padding:12px;

margin-top:10px;

border:none;
outline:none;

border-radius:8px;

background:#020b1c;

border:1px solid #00bfff;

color:white;

}

.form-container button{

width:100%;
padding:12px;

margin-top:20px;

border:none;

background:#00bfff;

color:black;

font-size:16px;

border-radius:8px;

cursor:pointer;

}

.form-container button:hover{

background:#0099cc;

}

.erro{

color:red;
text-align:center;
margin-top:15px;

}

.link-login{

text-align:center;
margin-top:15px;

}

.link-login a{

color:#00bfff;
text-decoration:none;

}

</style>

</head>

<body>

<div class="form-container">

<h2>Criar Conta</h2>

<form method="POST">

<input type="text" name="nome" placeholder="Seu nome" required>

<input type="email" name="email" placeholder="Seu email" required>

<input type="password" name="senha" placeholder="Crie uma senha" required>

<button type="submit">Cadastrar</button>

</form>

<?php

if(isset($erro)){

echo "<p class='erro'>$erro</p>";
echo "<div class='link-login'><a href='entrar.php'>Já possui conta? Entrar</a></div>";

}

?>

</div>

</body>

</html>