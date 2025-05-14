<?php 
session_start();


// limpar infos sessão atual //
session_unset();

// invalidar sessão atual no php //
session_destroy();
    $ultima_interacao = time();
        if (time() - $ultima_interacao > 2) {
            $ultima_interacao ='usuario';
            header ('Location: logout.php');
            }
            else {
                $perfil = 'funcionario';
            }


echo 'Logout realizado com sucesso';

header('Location: index.php');



?>