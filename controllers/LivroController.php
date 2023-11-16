<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Livro.php";

class LivroController
{

    private $livroModel;

    public function __construct()
    {
        $this->livroModel = new Livro();
    }

    public function listarLivros()
    {
        return $this->livroModel->listar();
    }

    public function cadastrarLivro()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'numero_pagina' => $_POST['numero_pagina'],
                'preco' => $_POST['preco'],
                'ano_publicacao' => $_POST['ano_publicacao'],
                'isbn' => $_POST['isbn']
            ];

            if(isset($_FILES['capa']['name']) && !empty($_FILES['capa']['name'])){
                $fileInfo = pathinfo($_FILES['capa']['name']);

                //Gera um novo nome aleatório
                $nomeArquivo = md5(uniqid()); 

                //Diretorio do Destino 
                $uploadDir = __dir__."/../uploads/";

                // Garante que a pasta existe
                if(!is_dir($uploadDir)){
                    mkdir($uploadDir,0777, true);
                }

                //Renomeia o arquivo original para o nome aleatório 
                $novoNomeArquivo = $nomeArquivo . "." . $fileInfo['extension']; 

                //Configura a pasta de destino, onde o arquivo será salvo
                $pastaDestino = $uploadDir . $novoNomeArquivo;

                //Salva o arquivo na pasta
                move_uploaded_file($_FILES['capa']['tmp_name'], $pastaDestino); 

                //Grava o caminho do arquivo no banco de dados
                $dados['capa'] = $novoNomeArquivo;

            }
            $this->livroModel->cadastrar($dados);
            header('Location: index.php');
            exit;
        }
    }

    public function editarLivro()
    {
        $id_livro = $_GET['id_livro'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $dados = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'numero_pagina' => $_POST['numero_pagina'],
                'preco' => $_POST['preco'],
                'ano_publicacao' => $_POST['ano_publicacao'],
                'isbn' => $_POST['isbn']
            ];

            $this->livroModel->editar($id_livro, $dados);
            header('Location: index.php');
            exit;
        }

        return $this->livroModel->buscar($id_livro);
    }

    public function excluirLivro()
    {
        $this->livroModel->excluir($_GET['id_livro']);
        header('Location: index.php');
        exit;
    }
}
