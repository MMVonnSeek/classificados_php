<?php
// Habilita a exibição de todos os erros para depuração
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Inicia a sessão para todo o site
session_start();

// --- Configurações do Banco de Dados ---
$servidor = "localhost";
$usuario_db = "root";
$senha_db = ""; // A senha do root no XAMPP geralmente é vazia
$banco = "classificados_db";

// --- Cria a Conexão ---
// CORREÇÃO ESTÁ AQUI: Usando a variável correta $senha_db
$conexao = mysqli_connect($servidor, $usuario_db, $senha_db, $banco);

// --- Verifica a Conexão ---
if (!$conexao) {
    // Se a conexão falhar, o script para aqui e mostra o erro exato.
    // Ex: Nome do banco errado, senha incorreta, etc.
    die("FALHA NA CONEXÃO: " . mysqli_connect_error());
}

// Define o charset para UTF-8 para evitar problemas com acentuação
mysqli_set_charset($conexao, "utf8");
?>