<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>

<head>
 <link rel="stylesheet" href="style.css"> 
 <title>Cadastro Cliente</title>
</head>

<body class="listar">
<h1>Cadastro cliente</h1>

<?php
$stmt =$pdo->query('SELECT * FROM cliente ORDER BY data'); 
$cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($cliente) == 0) {
    echo '<p>Nenhum cadastro realizada.</p>';

} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Data</th>
    <th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

foreach ($cliente as $cliente) {


echo '<tr>';
echo '<td>' . $cliente['nome'] . '</td>';
echo '<td>' . $cliente['email'] . '</td>';
echo '<td>' . $cliente ['telefone'] .'</td>';
echo '<td>' . date('d/m/Y', strtotime($cliente['data'])) . '</td>'; 
echo '<td><a style="color:violet;" href="atualizar.php?id=' . $cliente['id'] . '">Atualizar</a></td>'; 
echo '<td><a style="color:violet;" href="deletar.php?id=' . $cliente['id'] . '">Deletar</a></td>';
echo '</tr>';
}

echo '</tbody>';
echo '</table>';
}
?>

<form method="post" action="index.php">
    <button>Voltar</button>
</form>

</body>
</html>