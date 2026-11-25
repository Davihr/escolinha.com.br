<?php
// Inclui a conexão e as funções. 
require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__ . "/../../include/functions.php";
// Verifica se o formulário foi enviado. 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados enviados pelo formulário. 
    $nome = trim($_POST["nome"]);
    $cpf = trim($_POST["cpf"]);
    $curso = trim($_POST["curso"]);
    $login = trim($_POST["login"]);
    $senha = $_POST["senha"];
    // Chama a função que está em functions.php. 
    // A chamada original de cadastro permanece igual.
    if (gravar_aluno($conexao, $nome, $cpf, $curso, $login, $senha)) {
        // Salva a imagem na pasta uploads.
        $foto = enviar_foto($_FILES["foto"], __DIR__ . "/../../uploads");
        if ($foto !== false) {
            // Associa o nome do arquivo ao aluno cadastrado.
            atualizar_foto_aluno($conexao, md5($cpf), $foto);
            echo "Aluno cadastrado com foto!";
        } else {
            echo "Aluno cadastrado, mas houve erro ao enviar a foto.";
        }
    } else {
        echo "Erro ao cadastrar aluno.";
    }
}
?>
<h1>Cadastro de aluno</h1>
<form method="POST" enctype="multipart/form-data">
    Nome: <input type="text" name="nome" required><br><br>
    CPF: <input type="text" name="cpf" required><br><br>
    Curso: <input type="text" name="curso" required><br><br>
    Login: <input type="text" name="login" required><br><br>
    Senha: <input type="password" name="senha" required><br><br>
    Foto: <input type="file" name="foto"
        accept="image/jpeg,image/png,image/webp" required><br><br>
    <button type="submit">Gravar aluno</button>
</form>
<a href="../../index.php">Voltar ao início</a>