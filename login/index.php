<?php 
    if(isset($_POST['login'])){
        login::logar($_POST['usuario'],$_POST['senha']);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Controle de estoque</title>
    <link rel="stylesheet" href="login/login.css">
</head>
<body>
    <main>
        <h1>Login | Controle de estoque</h1>
        <form action="" method="post" class="formLogin">
            <input type="text" placeholder="Usuário" name="usuario">
            <input type="password" placeholder="Senha" name="senha">
            <input type="submit" value="Login" name="login">
        </form>
        <a href="./cadastro">Cadastrar novo usuário</a>
    </main>
</body>
</html>