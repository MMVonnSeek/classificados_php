<?php 
include_once(__DIR__ . '/config/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($senha !== $confirmar_senha){
        $cadastro_error = "As senhas não coincidem!";
    } else {
        // Criptografa a senha antes de salvar
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $conexao->prepare("INSERT INTO usuarios(nome, email, senha) VALUES(?,?,?)");

        $stmt->bind_param("sss, $nome, $email, $senha_hash");

        if ($stmt->execute()) {
            // Redireciona para a página de login com uma mensagem de sucesso
            header("Location: login.php?
            sucesso=cadastro");
            exit();
        } else {
            //Verifica se o erro é de email duplicado
            if ($conexao->errno === 1062){
                $cadastro_error = "Este email já está cadastrado. Tente outro.";
            } else {
                $cadastro_error = "Erro ao cadastrar: ". $stmt->error;
            }
        }
        $stmt->close();
    }
}
include_once(__DIR__ .'/../header.php');

//Exibe a mensagem de erro de cadastro, se houver
if (isset($cadastro_error)){
    echo "<p class='error'>$cadastro_error</p>";
}
?>

<div class="form-wrapper">
    <h2>Crie sua Conta</h2>
    <form action="cadastro.php" method="POST">
        <div class="form-group">
            <label for="nome">Nome Completo:</label>
            <input type="text" name="nome" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>
        </div>
        <div class="form-group">
            <label for="confirmar_senha">Confirmar Senha:</label>
            <input type="password" name="confirmar_senha" required>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
</div>

<?php 
include_once(__DIR__ . '/../footer.php');
?>