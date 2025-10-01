<?php include_once(__DIR__ . '/config/conexao.php');?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Classificados</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="/index.php" class="logo">Classificados SENAI</a>
            <ul class="nav-links">
                <?php if (isset($_SESSION['usuario_id'])):?>
                <!--Links para usuário logado-->
                <li><a href="">Meus Anúncios</a></li>
                <li><a href="">Criar Anúncio</a></li>
                <li><a href="">Sair</a></li>
                <?php else: ?>
                <!--Links para visitante-->
                <li><a href="">Login</a></li>
                <li><a href="">Cadastre-se</a></li>
                <?php endif;?>
            </ul>
        </nav>
    </header>
    <main class="container">