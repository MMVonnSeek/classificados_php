    </main>
    <footer>
        <p>&copy; <?php echo date('Y');?> - Projeto de Classificados - SENAI</p>
    </footer>
</body>
</html>
<?php 
//Fecha a conexão com o banco de dados no final de cada página
if (isset($conexao)) {
    $conexao->close();
}
?>