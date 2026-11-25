<?php
require_once __DIR__ . "/../../config/conexao.php";
require_once __DIR__ . "/../../include/functions.php";
// Chama a função que consulta os alunos. 
// Nova consulta: traz os alunos e o campo foto.
$resultado = listar_alunos_com_foto($conexao);
?>
<h1>Alunos cadastrados</h1>
<a href="gravar_aluno.php">Cadastrar novo aluno</a>
<table border="1" cellpadding="8">
    <tr>
        <th>Foto</th>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF (MD5)</th>
        <th>Curso</th>
        <th>Login</th>
    </tr>
    <?php while ($aluno = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td>
                <?php if (!empty($aluno["foto"])) { ?>
                    <img src="uploads/<?= htmlspecialchars($aluno["foto"]) ?>"
                        width="70" height="70" style="object-fit:cover;"
                        alt="Foto do aluno">
                <?php } else { ?>
                    Sem foto
                <?php } ?>
            </td>
            <td><?= $aluno["id_aluno"] ?></td>
            <td><?= htmlspecialchars($aluno["nome"]) ?></td>
            <td><?= htmlspecialchars($aluno["cpf"]) ?></td>
            <td><?= htmlspecialchars($aluno["curso"]) ?></td>
            <td><?= htmlspecialchars($aluno["login"]) ?></td>
        </tr>
            <a href="editar_aluno.php?id=<?= $aluno["id_aluno"] ?>">Editar</a>
            |
            <a href="excluir_aluno.php?id=<?= $aluno["id_aluno"] ?>"
                onclick="return confirm('Deseja excluir este aluno?')">
                Excluir
            </a>
        </td>
    </tr>
<?php } ?>
</table>
<a href="../../index.php">Voltar ao início</a>