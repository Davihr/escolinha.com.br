<?php
require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__ . "/../../include/functions.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados enviados pelo formulário. 
    $nome = trim($_POST["nome"]);
    $cpf = trim($_POST["cpf"]);
    $curso = trim($_POST["curso"]);
    $login = trim($_POST["login"]);
    $senha = $_POST["senha"];
    // Executa a função de cadastro do professor. 
    if (gravar_professor($conexao, $nome, $cpf, $curso, $login, $senha)) {
        $foto = enviar_foto($_FILES["foto"], __DIR__ . "/uploads");
        if ($foto !== false) {
            atualizar_foto_professor($conexao, md5($cpf), $foto);
            echo "Professor cadastrado com foto!";
        } else {
            echo "Professor cadastrado, mas houve erro ao enviar a foto.";
        }
    } else {
        echo "Erro ao cadastrar professor.";
    }
}
?>
<h1>Cadastro de professor</h1>
<form method="POST" enctype="multipart/form-data">
    Nome: <input type="text" name="nome" required><br><br>
    CPF: <input type="text" name="cpf" required><br><br>
    Curso: <input type="text" name="curso" required><br><br>
    Login: <input type="text" name="login" required><br><br>
    Senha: <input type="password" name="senha" required><br><br>
    Foto: <input type="file" name="foto"
        accept="image/jpeg,image/png,image/webp" required><br><br>
    <button type="submit">Gravar professor</button>
</form>
<a href="../../index.php">Voltar ao início</a>