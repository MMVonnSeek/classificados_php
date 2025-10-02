<?php 
include_once(__DIR__ . '/../config/proteger.php');
include_once(__DIR__ . '/../header.php');
$usuario_id = $_SESSION['usuario_id'];
?>

<h1>Meus Anúncios</h1>
<a href="novo_anuncio.php" class="btn-anunciar" style="display:inline-block; margin-bottom: 20px;">Criar Novo Anúncio</a>

<div class="anuncios-grid">
    <?php 
    $sql = "SELECT a.id, a.titulo, a.preco, c.nome AS categoria_nome
    FROM anuncios a
    JOIN categorias c ON a.id_categoria = c.id
    WHERE a.id_usuario = ?
    ORDER BY a.data_publicacao DESC";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        while ($anuncio = $resultado->fetch_assoc()) {
            echo "<div class='anuncio-card manage'>";
            echo "<h3>" . htmlspecialchars($anuncio['titulo']) . "</h3>";
            echo "<p class='preco'>R$ " . number_format($anuncio['preco'], 2,',','.'). "</p>";
            echo "<div class='actions'>";
            
            echo "<a href='novo_anuncio.php?id=" . $anuncio['id']. "' class='edit'>Editar</a>";
            
            echo "<a href='excluir_anuncio.php?id=" . $anuncio['id']. "' class='delete' onclick='return confirm(\"Tem certeza\")'>Excluir</a>";
            
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>Você ainda não tem nenhum anúncio. Que tal criar um?</p>";
    }
    $stmt->close();
    ?>
</div>

<?php include_once(__DIR__. '/../footer.php');?>