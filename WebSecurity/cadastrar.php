<!DOCTYPE html>
<html>
<head>
    <title> Tela de login </title>
    <link rel="stylesheet" type="text/css" href="styles/cadastrar.css">
</head>
<body>
    <form method="POST">
        <h2> Cadastre-se </h2>
        <hr>
        <br>
        <div>
            <input type="text" name="name" required placeholder="Usuário">
                <br> <br>
            <input type="email" name="email" required placeholder="E-mail">
                <br> <br>
            <input type="password" name="password" required placeholder="Senha">
                <br> <br>
            <input type="password" name="confirm" required placeholder="Confirmar senha">
                <br> <br>
        </div>
        <a href="login.php" class="voltar"> Voltar </a>
        <button type="submit" class="cadastrar" name="cadastrar"> Cadastrar </button>
    </form>
    </div>
</body>
</html>
<?php

require 'cadastrar.class.php';

$users = new Cadastrar();

if (isset($_POST['email'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? md5(addslashes($_POST['password'])) : "";
    $confirmPassword = isset($_POST['confirm']) ? md5(addslashes($_POST['confirm'])) : "";

    if ($password !== $confirmPassword) {
        echo '<script> alert("' . htmlspecialchars('As senhas não coincidem!') . '") </script>';
        exit;
    }

    $included = $users->inserirUsuarios($name, $email, $password);

    if ($included) {
        echo '<script> alert("' . htmlspecialchars("Cadastro realizado com sucesso!") . '") </script>';
    } else {
        echo '<script> alert("' . htmlspecialchars("Falha ao cadastrar!") . '") </script>';
    }
}

?>

