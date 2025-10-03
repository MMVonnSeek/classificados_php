<?php
include_once(__DIR__ . '/../config/proteger.php');
include_once(__DIR__ . '/../header.php');


//Lógica de edição: preencher o formulário
$modo_edicao = false;
$id_anuncio = '';
$titulo = '';
$descricao = '';
$preco = '';
$id_categoria_selecionada = '';

//Verifica se um ID foi passado pela URL(modo ediçao)
if (isset($_GET['id'])) {
    $modo_edicao = true;
    $id_anuncio = intval($_GET['id']);
    $id_usuario_logado = $_SESSION['usuario_id'];

    //Busca os dados do anúncio no banco, garantindo que ele pertence ao usuário logado
    $stmt = $conexao->prepare("SELECT * FROM anuncios WHERE id = ? AND id_usuario = ?");
    $stmt->bind_param("ii", $id_anuncio, $id_usuario_logado);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $anuncio = $resultado->fetch_assoc();
        $titulo = $anuncio['titulo'];
        $descricao = $anuncio['descricao'];
        $preco = $anuncio['preco'];
        $id_categoria_selecionada = $anuncio['id_categoria'];
    } else {
        //Se o anúncio não for encontrado ou não pertencer ao usuário, exibe um erro
        echo "<p class='error'>Anúncio não encontrado ou você não tem permissão para editá-lo.</p>";
        include_once(__DIR__ . '/../footer.php');
        exit();
    }
    $stmt->close();
}
?>

<div class="form-wrapper">
    <h2><?php echo $modo_edicao ? 'Editar Anúncio' : 'Criar Novo Anúncio'; ?></h2>

    <form action="salvar_anuncio.php" method="$_POST">
        <!--Campo oculto para enviar o ID do aúncio-->
        <input type="hidden" name="id_anuncio" value="<?php echo $id_anuncio; ?>">

        <div class="form-group">
            <label for="titulo">Título do Anúncio:</label>
            <input type="text" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>" required>
        </div>

        <div class="form-group">
            <label for="id_categoria">Categoria</label>
            <select name="id_categoria" required>
                <option value="">-- Selecione uma categoria --</option>
                <?php
                $sql_categorias = "SELECT id, nome FROM cateforias ORDER BY nome ASC";
                $resultado_categorias = $conexao->query($sql_categorias);
                
                while ($categoria = $resultado_categorias->fetch_assoc()){
                    $select = ($categoria['id'] == $id_categoria_selecionada) ? 'selected' : '';
                    echo "<option value='" . $categoria['id'] . "'$selected>" . htmlspecialchars($categoria['nome']) . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="preco">Preço (R$):</label>
            <input type="number" name="preco" step="0.01" min="0" value="<?php echo htmlspecialchars($preco); ?>" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao"><?php echo htmlspecialchars($descricao); ?></textarea>
        </div>

        <button type="submit">Salvar Anúncio</button>
    </form>
</div>

<?php include_once(__DIR__ . '/../footer.php'); ?>