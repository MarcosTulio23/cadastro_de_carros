<?php
$conect = new mysqli("localhost", "root", "2305", "webline");
$conect->set_charset("utf8mb4");

$montadoras = $conect->query("SELECT * FROM montadoras");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Carros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Cadastro de Carros</h2>

    <form method="post" action="insere_automovel.php" class="mt-4">

        <label>Nome do veículo:</label>
        <input type="text" name="nome" class="form-control" required>

        <label class="mt-3">Placa:</label>
        <input type="text" name="placa" class="form-control" required>

        <label class="mt-3">Chassi:</label>
        <input type="text" name="chassi" class="form-control" required>

        <label class="mt-3">Montadora:</label>
        <select name="montadora" class="form-control" required>
            <option value="">Escolha uma montadora</option>
            <?php while($m = $montadoras->fetch_assoc()) { ?>
                <option value="<?= $m['codigo'] ?>"><?= $m['nome'] ?></option>
            <?php } ?>
        </select>

        <button type="submit" class="btn btn-primary mt-4">Cadastrar</button>
        <a href="listaautomoveis.php" class="btn btn-secondary mt-4">Ver Lista</a>
    </form>
</body>
</html>

