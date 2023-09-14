<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/AlunoController.php"; 
?>

    <main class="container mt-3 mb-3">
        <h1>Lista de Alunos
            <a href="cadastrar.php" class ="btn btn-primary float-end">Cadastrar</a>           
        </h1>

        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/alerta.php";?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Data de Nascimento</th>
                    <th style="width: 200px;">Ação</
                </tr>
            </thead>
            <tbody>
                <?php
                    $alunoController = new AlunoController(); 
                    $alunos = $alunoController->listarAlunos(); 

                    foreach($alunos as $aluno): 
                ?>
                <tr>
                    <td><?=$aluno->id_aluno?></td>
                    <td><?=$aluno->nome?></td>
                    <td><?=$aluno->cpf?></td>
                    <td><?=$aluno->email?></td>
                    <td><?=$aluno->telefone?></td>
                    <td><?=$aluno->celular?></td>
                    <td><?=$aluno->data_nascimento?></td>
                    <td>
                            <a href="editar.php?id=<?=$aluno->id_aluno?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </main>
    
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php" ?>
