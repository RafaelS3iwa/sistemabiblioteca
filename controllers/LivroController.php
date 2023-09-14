<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Livro.php";
class LivroController
{
    private $livroModel; 

    public function __construct()
    {
        $this->livroModel = new Livro(); 
    }

    public function listarLivros(){
        return $this->livroModel->listar(); 
    }

    public function cadastrarLivro(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dados =[
                'titulo'  => $_POST['titulo'],
                'autor'  => $_POST['autor'],
                'numero_pagina' => $_POST['numero_pagina'],
                'preco' => $_POST['preco'], 
                'ano_publicacao' => $_POST['ano_publicacao'],
                'isbn' => $_POST['isbn']
            ];

            $this->livroModel->cadastrar($dados);
            header('Location: index.php');
            exit;
        }
    }
}
