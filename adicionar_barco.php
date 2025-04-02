<?php
include 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbBarcos = new DBBarcos();

    $modelo = $_POST['modelo'];
    $fabricante = $_POST['fabricante'];
    $opcionais = $_POST['opcionais'];
    $cor = $_POST['cor'];

    if ($dbBarcos->create($modelo, $fabricante, $opcionais, $cor)) {
        echo "<script>alert('Barco cadastrado com sucesso!'); window.location.href='listar_barcos.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar barco!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Barco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Adicionar Barco</h2>
        <form method="POST" class="mt-4">
            <div class="mb-3">
                <label class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fabricante</label>
                <input type="text" name="fabricante" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Opcionais</label>
                <input type="text" name="opcionais" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Cor</label>
                <input type="text" name="cor" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</body>
</html>
