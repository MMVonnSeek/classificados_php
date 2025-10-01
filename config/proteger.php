<?php
//Inclui a conexão que por sua vez inicia a sessão
include_once(__DIR__ . '/conexao.php');

// Verifica se a sessão NÃO existe
if (!isset($_SESSION['usuario_id'])) {
    //Se usuario não existe, redireciona para o login
    header("Location: /mini_classificados/auth/login.php?erro=acesso_negado");
    exit();
}
?>