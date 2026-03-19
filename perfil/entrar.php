<?php
session_start();
include("../includes/conexao.php");

if(isset($_POST['email'])){

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$sql = "SELECT * FROM usuarios
WHERE email='$email' AND senha='$senha'";

$resultado = mysqli_query($conexao,$sql);

if(mysqli_num_rows($resultado) == 1){

$usuario = mysqli_fetch_assoc($resultado);

$_SESSION['nome'] = $usuario['nome'];

header("Location: ../index.php");

}else{

$erro = "Email ou senha incorretos";

}

}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<title>Entrar</title>

<link rel="stylesheet" href="../includes/style.css">

</head>

<body>

<div style="width:400px;margin:auto;margin-top:100px;">

<h2>Entrar</h2>

<form method="POST">

<input type="email" name="email" placeholder="Email" required style="width:100%;padding:10px;margin-top:10px;">

<input type="password" name="senha" placeholder="Senha" required style="width:100%;padding:10px;margin-top:10px;">

<button type="submit" style="margin-top:20px;padding:10px 20px;">Entrar</button>

</form>

<?php
if(isset($erro)){
echo "<p style='color:red'>$erro</p>";
}
?>

</div>

</body>
</html>