<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

class Livro
{

    protected $db;
    protected $table = "livros";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    /**
     * Buscar registro único
     * @param int $id_livro
     */
    public function buscar($id_livro)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id_livro=:id_livro";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_livro", $id_livro, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro ao Buscar: " . $e->getMessage();
            return null;
        }
    }

    /**
     * Listar todos os registros da tabela livro
     */
    public function listar()
    {
        try {
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro ao listar: " . $e->getMessage();
            return null;
        }
    }

    /**
     * Cadastrar Livro
     * @param array $dados
     * @return bool
     */
    public function cadastrar($dados)
    {
        try {
            $query = "INSERT INTO {$this->table} (titulo, autor, numero_pagina, preco, ano_publicacao, isbn, capa) VALUES (:titulo, :autor, :numero_pagina, :preco, :ano_publicacao, :isbn, :capa)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':titulo', $dados['titulo']);
            $stmt->bindParam(':autor', $dados['autor']);
            $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);
            $stmt->bindParam(':preco', $dados['preco']);
            $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);
            $stmt->bindParam(':isbn', $dados['isbn']);
            $stmt->bindParam(':capa', $dados['capa']); 
            $stmt->execute();

            $_SESSION['sucesso'] = "Cadastro realizado com sucesso!";

            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
            exit();
            $_SESSION['erro'] = "Erro ao cadastrar o livro";
            return false;
        }
    }

    /**
     * Editar Livro
     * @param int $id_livro
     * @param array $dados
     * @return bool
     */
    public function editar($id_livro, $dados)
    {
        try {
            $sql = "UPDATE {$this->table} SET titulo = :titulo, autor = :autor, numero_pagina = :numero_pagina, preco = :preco, ano_publicacao = :ano_publicacao, isbn = :isbn, capa = :capa WHERE id_livro = :id_livro";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':titulo', $dados['titulo']);
            $stmt->bindParam(':autor', $dados['autor']);
            $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);
            $stmt->bindParam(':preco', $dados['preco']);
            $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);
            $stmt->bindParam(':isbn', $dados['isbn']);
            $stmt->bindParam(':capa', $dados['capa']);
            $stmt->bindParam(':id_livro', $id_livro, PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['sucesso'] = "Livro editado com sucesso!";
            return true;
        } catch (PDOException $e) {
            echo "Erro ao editar: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Excluir Livro
     * @param int $id_livro
     * @return bool
     */
    public function excluir($id_livro)
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id_livro = :id_livro";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_livro', $id_livro, PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['sucesso'] = "Livro excluído com sucesso!";
            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir: " . $e->getMessage();
            return false;
        }
    }
}
