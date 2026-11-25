<?php
// Inclui a conexão e as funções. 
require_once "config/conexao.php";
require_once "include/functions.php";
// Verifica se o formulário foi enviado. 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados enviados pelo formulário. 
    $nome = trim($_POST["nome"]);
    $cpf = trim($_POST["cpf"]);
    $curso = trim($_POST["curso"]);
    $login = trim($_POST["login"]);
    $senha = $_POST["senha"];
    // Chama a função que está em functions.php. 
    if (gravar_aluno($conexao, $nome, $cpf, $curso, $login, $senha)) {
        echo "Aluno cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar aluno. Verifique os dados.";
    }
}
?>
<h1>Cadastro de aluno</h1>
<form method="POST">
    Nome: <input type="text" name="nome" required><br><br>
    CPF: <input type="text" name="cpf" required><br><br>
    Curso: <input type="text" name="curso" required><br><br>
    Login: <input type="text" name="login" required><br><br>
    Senha: <input type="password" name="senha" required><br><br>
    <button type="submit">Gravar aluno</button>
</form>
<a href="index.php">Voltar ao início</a>