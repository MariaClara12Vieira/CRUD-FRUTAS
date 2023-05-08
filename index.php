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
        <h1>Cadastro Cliente</h1>
     <?php
        if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data = $_POST['data'];

        $stmt = $pdo->prepare('SELECT COUNT(*) FROM cliente WHERE data = ? ');
        $stmt->execute([$data]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            $error = '<h2>Já existe um cadastro com essas informações.<h2> </br>';
        } else {

            $stmt = $pdo->prepare('INSERT INTO cliente (nome, email, telefone, data)
            VALUES(:nome, :email, :telefone, :data)');
            $stmt->execute(['nome' => $nome,'email' => $email,
            'telefone' => $telefone, 'data' => $data]);

            if ($stmt->rowCount()) {
                echo '<h2><span>Cadastro realizado com sucesso!</span></h2>';
            } else {
                echo '<h2><span>Erro ao realizar o cadastro, tente novamente mais tarde.</span></h2>';
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

        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" required><br>

        <label for="data">Data de Nascimento:</label>
        <input type="date" name="data" required><br>

        <div>
            <input type= "submit" name="submit" value="CADASTRAR">
            <button><a href="listar.php">Listar</a></button>
        </div>
      </form>

    </div>
</body>
</html>