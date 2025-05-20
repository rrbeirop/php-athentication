<?php if (!empty($_SESSION['usuario'])) :?>
        <p> Bem Vindo <?= $_SESSION['usuario']?> </p>
        <p> Seu Perfil no Sistema é <?= $_SESSION['perfil'] ?></p>

        <?php if ($_SESSION['perfil'] === 'Funcionario') :?>
        <button>Exclusivo Para Funcionarios</button>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['usuario'])) :?>
        <p> Bem Vindo <?= $_SESSION['usuario']?> </p>
        <p> Seu Perfil no Sistema é <?= $_SESSION['perfil'] ?></p>

        <?php if ($_SESSION['perfil'] === 'Gestor') :?>
        <button>Exclusivo Para Gestores</button>
        <?php endif; ?>
    <?php endif; ?>
