<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>

<head>
 <link rel="stylesheet" href="style.css"> 
 <title>Cadastro Pedido</title>
</head>

<body class="listar">
<h1>Cadastro pedidos</h1>

<?php
$stmt =$pdo->query('SELECT * FROM produto ORDER BY nome'); 
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($produtos) == 0) {
    echo '<p>Nenhum produto pedido.</p>';

} else {
    echo '<table border="1">';
    echo '<thead><tr>
    <th>nome</th>
    <th>tamanho</th>
    <th>peso</th>
    <th>quantidade</th>
    <th>preco</th>
    <th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

foreach ($produtos as $produto) {


echo '<tr>';
echo '<td>' . $produto['nome'] . '</td>';
echo '<td>' . $produto['tamanho'] . '</td>';
echo '<td>' . $produto['peso'] .'</td>';
echo '<td>' . $produto['quantidade'] .'</td>';
echo '<td>' . $produto['preco'] .'</td>';
echo '<td><a style="color:black;" href="atualizar2.php?id=' . $produto['id'] . '">Atualizar</a></td>'; 
echo '<td><a style="color:black;" href="deletar2.php?id=' . $produto['id'] . '">Deletar</a></td>';
echo '</tr>';
}

echo '</tbody>';
echo '</table>';
}
?>

<form method="post" action="index2.php">
    <button>Voltar</button>
</form>

</body>
</html>