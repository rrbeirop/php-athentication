<?php
session_start();

$usuarios = [
    [
        'email' => 'vitor@organizer.com',
        'senha' => password_hash('123', PASSWORD_BCRYPT),
        'perfil' => 'Gestor'
    ],
    [
        'email' => 'joao@organizer.com',
        'senha' => password_hash('abc123', PASSWORD_BCRYPT),
        'perfil' => 'Funcionario'
    ],
    [
        'email' => 'ana@organizer.com',
        'senha' => password_hash('senhaSegura', PASSWORD_BCRYPT),
        'perfil' => 'Administrador'
    ]
];

if (!isset($_SESSION['tentativas'])) {
    $_SESSION['tentativas'] = 0;
}
if (!isset($_SESSION['bloqueio'])) {
    $_SESSION['bloqueio'] = null;
}

// Verifica se está bloqueado
$agora = time();
if ($_SESSION['bloqueio'] && $agora < $_SESSION['bloqueio']) {
    $espera = $_SESSION['bloqueio'] - $agora;
    echo "Você excedeu o número de tentativas. Tente novamente em $espera segundos.";
    exit;
}

// Processa o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailForm = $_POST['email'] ?? '';
    $senhaForm = $_POST['senha'] ?? '';

    if (!empty($emailForm) && !empty($senhaForm)) {
        $autenticado = false;

        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $emailForm && password_verify($senhaForm, $usuario['senha'])) {
                // ✅ Login bem-sucedido
                session_regenerate_id(true); // Regenera o ID da sessão
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['perfil'] = $usuario['perfil'];
                $_SESSION['tentativas'] = 0; // Resetar tentativas
                $_SESSION['bloqueio'] = null;
                header('Location: privado.php');
                exit;
            }
        }

    
        $_SESSION['tentativas']++;

        if ($_SESSION['tentativas'] >= 3) {
            $_SESSION['bloqueio'] = time() + 120; // Bloqueia por 2 minutos
            echo "Você excedeu o número de tentativas. Tente novamente em 2 minutos.";
        } else {
            echo "Credenciais inválidas. Tente novamente.";
        }
    } else {
        echo "Preencha todos os campos.";
    }
}
?>



<!-- 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailForm = $_POST['email'] ?? '';
    $senhaForm = $_POST['senha'] ?? '';

    if (!empty($emailForm) && !empty($senhaForm)) {
        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $emailForm && password_verify($senhaForm, $usuario['senha'])) {
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['perfil'] = $usuario['perfil'];
                header('Location: privado.php');
                exit;
            }
        }
        echo "Email ou senha incorretos!";
    } else {
        echo "Preencha todos os campos.";
    }
} -->




<!-- ?> -->

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