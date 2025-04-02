<?php
include 'Database.php';

$dbBarcos = new DBBarcos();
$barcos = $dbBarcos->recovery();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termo = $_POST['search'];
    $barcos = array_filter($barcos, function ($barco) use ($termo) {
        return stripos($barco['bar_modelo'], $termo) !== false || 
               stripos($barco['bar_fabricante'], $termo) !== false || 
               stripos($barco['bar_cor'], $termo) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Barcos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Lista de Barcos</h2>
        <a href="index.php" class="btn btn-secondary mb-3">Voltar</a>
        
    
        <form method="POST" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar barco pelo modelo">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>
                    <th>Fabricante</th>
                    <th>Opcionais</th>
                    <th>Cor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barcos as $barco) { ?>
                <tr>
                    <td><?php echo $barco['id']; ?></td>
                    <td><?php echo $barco['bar_modelo']; ?></td>
                    <td><?php echo $barco['bar_fabricante']; ?></td>
                    <td><?php echo $barco['bar_opcionais']; ?></td>
                    <td><?php echo $barco['bar_cor']; ?></td>
                    <td>
                        <a href="editar_barco.php?id=<?php echo $barco['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="excluir_barco.php?id=<?php echo $barco['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
