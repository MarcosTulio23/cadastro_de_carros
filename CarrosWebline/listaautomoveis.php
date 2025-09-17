<?php
$conn = new mysqli("localhost", "root", "2305", "webline");
$conect->set_charset("utf8mb4");

$busca = "";
if (isset($_GET['busca'])) {
    $busca = $conect->real_escape_string($_GET['busca']);
}

$sql = "SELECT c.nome, c.placa, c.chassi, m.nome AS montadora
        FROM carros c
        LEFT JOIN montadoras m ON c.montadora = m.codigo
        WHERE c.nome LIKE '%$busca%'";

$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Carros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2>Lista de Carros</h2>

    <form method="get" class="mt-4 mb-4">
        <input type="text" name="busca" placeholder="Buscar por nome" value="<?= htmlspecialchars($busca) ?>" class="form-control">
        <button type="submit" class="btn btn-outline-primary mt-2">Buscar</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Placa</th>
                <th>Chassi</th>
                <th>Montadora</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($resultado->num_rows > 0) {
                while ($carro = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($carro['nome']) ?></td>
                        <td><?= htmlspecialchars($carro['placa']) ?></td>
                        <td><?= htmlspecialchars($carro['chassi']) ?></td>
                        <td><?= htmlspecialchars($carro['montadora']) ?></td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="4" class="text-center">Nenhum carro encontrado.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-primary">Cadastrar Novo</a>

</body>
</html>

