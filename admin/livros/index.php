<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LivroController.php";
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";  

    if(isset($_GET["del"]) && !empty($_GET['id_livro'])){

        $livroController->excluirLivro();

    }
      
?>

    <main class="container mt-3 mb-3">
        <h1>Lista de Livro
            <a href="cadastrar.php" class="btn btn-primary float-end">Cadastrar</a>
        </h1>

        <?php include_once $_SERVER['DOCUMENT_ROOT'] ."/includes/alerta.php" ?>

        <table class="table table-striped">
            <thead>
                <tr>
                   <th>#</th> 
                   <th>capa</th> 
                   <th>Titulo</th> 
                   <th>Autor</th> 
                
                   <th style="width: 200px;">Ação</th> 
                </tr>
            </thead>
            <tbody>

            <?php

                $livroController = new LivroController();
                $livros = $livroController->listarLivros();
                //var_dump($usuarios);

                foreach($livros as $livro):
            ?>

                <tr>
                    <td><?=$livro->id_livro ?></td>
                    <td><?=$livro->capa ?></td>
                    <td><?=$livro->titulo ?></td>
                    <td><?=$livro->autor ?></td>
                    <td>
                        <a href="editar.php?id_livro=<?=$livro->id_livro ?>" class="btn btn-primary">Editar</a>

                        <a href="index.php?id_livro=<?=$livro->id_livro ?>&del" class="btn btn-danger">Excluir</a>
                       
                    </td>
                </tr>

                <?php 
                    endforeach;
                ?>

            </tbody>
        </table>


    </main>


<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";  
?>
