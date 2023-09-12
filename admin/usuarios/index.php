<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";
?>

    <main class="container mt-3 mb-3">
        <h1>Lista de Usuários
            <a href="cadastrar.php" class ="btn btn-primary float-end">Cadastrar</a>
        </h1>

        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/alerta.php";?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Perfil</th>
                    <th style="width: 200px;">Ação</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                $usuarioController = new UsuarioController(); 
                $usuarios = $usuarioController->listarUsuarios(); 
                
                foreach($usuarios as $user): 
            ?>
                <tr>
                    <td><?=$user->id_usuario?></td>
                    <td><?=$user->nome?></td>
                    <td><?=$user->email?></td>
                    <td><?=$user->perfil?></td>
                    <td>
                            <!-- o ponto de interrogação significa URL ? Arquivo -->
                            <a href="editar.php?id=<?=$user->id_usuario?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    
    </main>
    
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php" ?>
