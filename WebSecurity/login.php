<!DOCTYPE html>
<html>
<head>
    <title> Tela de login </title>
    <link rel="stylesheet" type="text/css" href="styles/login.css">
</head>
<body>
    <form method="POST">
        <h2> Autentique-se </h2>
        <hr>
        <br>
        <div>
            <input type="text" class="user" name="user" required placeholder="Usuário">
            <br> <br>
            <input type="password" class="password" name="password" required placeholder="Senha">
            <br> <br>
        </div>
        <button type="submit" name="login"> Login </button> 
        <a href="cadastrar.php" class="cadastrar"> Cadastre-se </a>
    </form>
</body>
</html>
<?php

include 'usuario.class.php';

$user = new Usuario();

if (isset($_POST['login'])) {
    $username = isset($_POST['user']) ? $_POST['user'] : "";
    $password = isset($_POST['password']) ? md5(addslashes($_POST['password'])) : "";

    if ($user->verificarCredenciais($username, $password)) {
        echo '<script> alert("' . htmlspecialchars("Login bem-sucedido!") . '") </script>';
    } else {
        echo '<script> alert("' . htmlspecialchars("Usuário ou senha incorretos!") . '") </script>';
    }
}

?>
