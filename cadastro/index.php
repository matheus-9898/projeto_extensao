<?php
    include('../config.php');
    if(isset($_POST['cadastrar'])){
        cadastro::cadastrarUsuario($_POST['usuario'],$_POST['senha']);
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Controle de estoque</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <main>
        <h1>Cadastro | Controle de estoque</h1>
        <form action="" method="post" class="formCadastro">
            <input type="text" placeholder="Usuário" name="usuario">
            <input type="password" placeholder="Senha" name="senha">
            <input type="submit" value="Cadastrar" name="cadastrar">
        </form>
        <a href="../">Login</a>
    </main>
</body>
</html>