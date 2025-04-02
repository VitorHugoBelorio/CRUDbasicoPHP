<?php
include 'Database.php';

if (isset($_GET['id'])) {
    $dbBarcos = new DBBarcos();
    if ($dbBarcos->delete($_GET['id'])) {
        echo "<script>alert('Barco excluído com sucesso!'); window.location.href='listar_barcos.php';</script>";
    } else {
        echo "<script>alert('Erro ao excluir barco!');</script>";
    }
} else {
    echo "<script>alert('ID inválido!'); window.location.href='listar_barcos.php';</script>";
}
?>
