<?php

include 'db.php';

if (!isset($_GET['id'])) { 
    header('Location: listar2.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM produto WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
 header('Location: listar2.php');
 exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$stmt = $pdo->prepare('DELETE FROM produto WHERE id = ?');
$stmt->execute([$id]);
header('Location: listar2.php');
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
  <title>Deletar Pedido</title>
</head>
<body>
  <h1>Deletar Pedido</h1>
  <p>Tem certeza que deseja deletar o pedido de
    <?php echo $appointment['nome']; ?>
    <?php echo $appointment['nome']; ?>
    <?php echo $appointment['nome']; ?>
    <?php echo $appointment['nome']; ?>
    <?php echo $appointment['nome']; ?>
    </p>
    
<form method="post">
<button type="submit">Sim</button>
<a href="listar.php">Não</a>
</form></body></html>