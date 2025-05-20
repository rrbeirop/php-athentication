<?php 
session_start();


// limpar infos sessão atual //
session_unset();

// invalidar sessão atual no php //
session_destroy();

echo 'Logout realizado com sucesso';

header('Location: index.php');

?>