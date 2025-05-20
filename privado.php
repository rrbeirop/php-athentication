<?php 
session_start();
$userlog = $_SESSION ['usuario'] ?? null;


if (empty($userlog)) {
    return header('Location: login.php');
}

$_SESSION['login_time'] = time(); 

$loginTime = $_SESSION['login_time'];

if (time() - $loginTime > 10) {
    session_unset();
    echo 'Você foi desconectado por inatividade';
    session_destroy();
    return header('Location: login.php');
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
    <h1>Privado; Voce esta logado</h1>
    <p>
    <a href="index.php">Home</a><br>
    <a href="privado.php">Privado</a><br>
    <a href="logout.php">Logout</a>
    </p>

    <?php if (!empty($_SESSION['usuario'])) :?>
        <p> Bem Vindo <?= $_SESSION['usuario']?> </p>
        <p> Seu Perfil no Sistema é <?= $_SESSION['perfil'] ?></p>

        <?php if ($_SESSION['perfil'] === 'Administrador') :?>
        <button>Exclusivo Adm</button>
        <?php endif; ?>
    <?php endif; ?>


</body>
</html>