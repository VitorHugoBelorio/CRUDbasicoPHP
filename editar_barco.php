<?php
include 'Database.php';

$dbBarcos = new DBBarcos();

if (isset($_GET['id'])) {
    $barco = $dbBarcos->recoveryById($_GET['id']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $modelo = $_POST['modelo'];
    $fabricante = $_POST['fabricante'];
    $opcionais = $_POST['opcionais'];
    $cor = $_POST['cor'];

    if ($dbBarcos->update($id, $modelo, $fabricante, $opcionais, $cor)) {
        echo "<script>alert('Barco atualizado com sucesso!'); window.location.href='listar_barcos.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar barco!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Barco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Barco</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $barco['id']; ?>">
            <div class="mb-3">
                <label class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control" value="<?php echo $barco['bar_modelo']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fabricante</label>
                <input type="text" name="fabricante" class="form-control" value="<?php echo $barco['bar_fabricante']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Opcionais</label>
                <input type="text" name="opcionais" class="form-control" value="<?php echo $barco['bar_opcionais']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Cor</label>
                <input type="text" name="cor" class="form-control" value="<?php echo $barco['bar_cor']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="listar_barcos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
