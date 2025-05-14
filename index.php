<?php 
session_start();
//inicio de sessão //

// if (empty($_SESSION['contador'])) {
//     $_SESSION ['contador'] = 0;
// }

// $_SESSION ['contador'] = $_SESSION ['contador'] + 1;

//Super Global que armazena dd de sessão //

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bem Vindo</h1>
    <p>
    <a href="index.php">Home</a><br>
    <a href="login.php">Login </a><br>
    <a href="privado.php">Privado</a><br>
    <a href="logout.php">Logout</a>
    </p>

    <?php if (!empty($_SESSION['usuario'])) :?>
        <p> Bem Vindo <?= $_SESSION['usuario']?> </p>
    <?php endif; ?>
   
</body>
</html>