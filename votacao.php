<?php

if(!isset($conexao)){
    die("Erro: conexão com banco não encontrada.");
}

if(!isset($perfume_nome)){
    die("Erro: nome do perfume não definido.");
}

$ip = $_SERVER['REMOTE_ADDR'];
$mensagem = "";

// VOTAR
if(isset($_POST['nota'])){

    $nota = intval($_POST['nota']);

    $sql = "SELECT id FROM votos WHERE nome_perfume = '$perfume_nome' AND ip = '$ip'";
    $res = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($res) == 0){

        $sql = "INSERT INTO votos (nome_perfume, nota, ip) VALUES ('$perfume_nome', $nota, '$ip')";
        mysqli_query($conexao, $sql);

        $mensagem = "Voto registrado!";
    } else {
        $mensagem = "Você já votou!";
    }
}

// MÉDIA
$sql = "SELECT AVG(nota) as media FROM votos WHERE nome_perfume = '$perfume_nome'";
$res = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($res);

$media = round($row['media'], 1);
?>

<div class="votacao">
    <h3>Nota média: <?php echo $media; ?> ⭐</h3>

    <form method="POST">
        <input type="hidden" name="nota" id="nota">

        <span onclick="votar(1)">★</span>
        <span onclick="votar(2)">★</span>
        <span onclick="votar(3)">★</span>
        <span onclick="votar(4)">★</span>
        <span onclick="votar(5)">★</span>

        <br><br>
        <button type="submit">Enviar</button>
    </form>

    <p><?php echo $mensagem; ?></p>
</div>

<script>
function votar(n){
    document.getElementById("nota").value = n;
}
</script>