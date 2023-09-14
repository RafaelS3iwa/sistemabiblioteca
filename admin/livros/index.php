<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LivroController.php"; 
?>

    <main class="container mt-3 mb-3">
        <h1>Lista de Livros
            <a href="cadastrar.php" class ="btn btn-primary float-end">Cadastrar</a>
        </h1>

        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/alerta.php";?>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Número de Páginas</th>
                    <th>Preço</th>
                    <th>Ano de Publicação</th>
                    <th>ISBN</th>
                    <th style="width: 200px;">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $livroController = new LivroController();
                    $livros = $livroController->listarLivros(); 

                    foreach($livros as $livro): 
                ?>
                <tr>
                    <td><?=$livro->id_livro?></td>
                    <td><?=$livro->titulo?></td>
                    <td><?=$livro->autor?></td>
                    <td><?=$livro->numero_pagina?></td>
                    <td><?=$livro->preco?></td>
                    <td><?=$livro->ano_publicacao?></td>
                    <td><?=$livro->isbn?></td>
                    <td>
                            <a href="editar.php?id=<?=$livro->id_livro?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            
            </tbody>
        </table>
    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";?>