<?php
$conect = new mysqli("localhost", "root", "2305", "webline");
$conect->set_charset("utf8mb4");

$nome = $conect->real_escape_string($_POST['nome']);
$placa = $conect->real_escape_string($_POST['placa']);
$chassi = $conect->real_escape_string($_POST['chassi']);
$montadora = (int) $_POST['montadora'];

$sql = "INSERT INTO carros (nome, placa, chassi, montadora) VALUES ('$nome', '$placa', '$chassi', $montadora)";
$situacao = $conect->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado do Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<?php if ($situacao) { ?>
    <div class="alert alert-success">Cadastrado concluído!</div>
<?php } else { ?>
    <div class="alert alert-danger">Erro ao cadastrar!</div>
<?php } ?>

<a href="index.php" class="btn btn-primary mt-3">Voltar</a>
<a href="listaautomoveis.php" class="btn btn-secondary mt-3">Ver Lista</a>

</body>
</html>
