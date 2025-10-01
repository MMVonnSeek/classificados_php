<?php 
session_start(); //Inicia a sessão para poder destruí-la
session_unset(); // Remove todas as variáveis da sessão
session_destroy(); // Destrói a sessão

header("Location: /mini_classificados/index.php");
exit();
?>