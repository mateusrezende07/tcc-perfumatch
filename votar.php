<?php
session_start();
include("includes/conexao.php");

if(!isset($_SESSION['usuario_id'])){
    die("Você precisa estar logado.");
}

$id_usuario = $_SESSION['usuario_id'];
$perfume = $_POST['perfume'];
$nota = $_POST['nota'];

// impedir voto duplicado
$sql = "SELECT * FROM votos WHERE id_usuario='$id_usuario' AND nome_perfume='$perfume'";
$res = mysqli_query($conexao,$sql);

if(mysqli_num_rows($res) > 0){
    die("Você já votou nesse perfume!");
}

// inserir voto
$sql = "INSERT INTO votos (id_usuario, nome_perfume, nota)
VALUES ('$id_usuario','$perfume','$nota')";

mysqli_query($conexao,$sql);

// voltar para página correta
$pagina = strtolower(str_replace(" ", "_", $perfume)) . ".php";

header("Location: /perfumatch/pessoal/".$pagina);
exit;