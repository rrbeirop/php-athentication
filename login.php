<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailForm = $_POST['email'];
    $senhaForm = $_POST['senha'];

    if (!empty($emailForm) && !empty($senhaForm)) {
        $emailCorreto = 'vitor@organizer.com';
        $senhaCorreta = password_hash('123', PASSWORD_BCRYPT);

    // perfil ou funcao usuario do sistema adm / gestor / funcionario //

        $perfil = 'admin';
        
        if ($emailForm === $emailCorreto && password_verify($senhaForm, $senhaCorreta)) {
            $_SESSION['usuario'] = $emailForm;
            $_SESSION['perfil'] = $perfil;

            header('Location: privado.php');
        }
        else {
            echo 'Email ou Senha incorretas';
            
        }
    }
    // $_SESSION['usuario'] = $email;
    // return header('Location: index.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Login; todos podem acessar</h1>
        <form action="login.php" method="post">
            <label for="email">email</label>
            <input type="text" name="email" id="">

            <label for="senha">senha</label>
            <input type="password" name="senha" id="">

             <button type="submit">Entrar</button>   

        </form>
</body>

</html>