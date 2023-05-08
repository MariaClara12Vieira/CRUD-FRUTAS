<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro cliente</title>
</head>
<body>
<div class="form label">
        <h1>Pedido Produto</h1>
     <?php
        if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $tamanho = $_POST['tamanho'];
        $peso = $_POST['peso'];
        $quantidade = $_POST['quantidade'];
        $preco = $_POST['preco'];


        $stmt = $pdo->prepare('SELECT COUNT(*) FROM produto WHERE quantidade = ? ');
        $stmt->execute([$quantidade]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            $error = '<h2>A fruta ja foi pedida<h2> </br>';
        } else {

            $stmt = $pdo->prepare('INSERT INTO produto (nome, tamanho, peso, quantidade, preco)
            VALUES(:nome, :tamanho, :peso, :quantidade, :preco)');
            $stmt->execute(['nome' => $nome,'tamanho' => $tamanho,
            'peso' => $peso, 'quantidade' => $quantidade, 'preco' => $preco]);

            if ($stmt->rowCount()) {
                echo '<h2><span>produto pedido com sucesso!</span></h2>';
            } else {
                echo '<h2><span>Erro ao pedir o produto, tente novamente mais tarde.</span></h2>';
            }
        }

        if (isset($error)) {
            echo '<span>' . $error . '</span';
        }
     }
     ?>
       <div class="form label">
      
       <form method="post">
        
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="tamanho">Tamanho:</label>
        <input type="text" name="tamanho" required><br>

        <label for="peso">Peso:</label>
        <input type="text" name="peso" required><br>

        <label for="quantidade">Quantidade:</label>
        <input type="text" name="quantidade" required><br>

        <label for="preco">preco:</label>
        <input type="text" name="preco" required><br>

        <div>
            <input type= "submit" name="submit" value="CADASTRAR">
            <button><a href="listar2.php">Listar</a></button>
        </div>
      </form>

    </div>
</body>
</html>