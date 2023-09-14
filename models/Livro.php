<?php 

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php"; 
class Livro{
    
    protected $db;
    protected $table = "livros";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    /**
    *Buscar registro único  
    *@param int $id
    *@return Livro|null
    */
    public function buscar($id){
        try{
            $query = ("SELECT * FROM {$this->table} WHERE id_livro = :id"); 
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ); 
        }catch(PDOException $e){
            echo "Erro na inserção: " . $e->getMessage(); 
            return null; 
        }
    }
    
    /** 
     * Busca o Livro pelo Título
     * @param string $titulo 
     * @return Livro|null
     */
    public function buscarTitulo($titulo){
        try{
            $query = ("SELECT * FROM {$this->table} WHERE titulo LIKE '%:titulo%");
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':%titulo%', $titulo, PDO::PARAM_STR);
            
            $stmt->execute(); 

            return $stmt->fetch(PDO::FETCH_OBJ); 
        }catch(PDOException $e){
            echo 'Erro na inserção: ' .$e->getMessage(); 
            return null; 
        }
    }

    /** 
     * Busca o Livro pelo Autor
     * @param string $autor
     * @return Livro|null 
     */
    public function buscarAutor($autor){
        try{
            $query = "SELECT * FROM {$this->table} WHERE autor LIKE %:autor%"; 
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam('%:autor%', $autor, PDO::PARAM_STR); 
            
            $stmt->execute(); 

            return $stmt->fetch(PDO::FETCH_OBJ); 
        }catch(PDOException $e){
            echo 'Erro na inserção: ' .$e->getMessage(); 
            return null; 
        }
    }

    /**
     * Listar todos os registros da tabela
     */
    public function listar(){
        try{
            $query = ("SELECT * FROM {$this->table}"); 
            $stmt = $this->db->query($query); 
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $e){
            echo "Erro na inserção: " . $e->getMessage(); 
            return null; 
        }
    }

    /**
     * Cadastrar Livro 
     * @param array $dados 
     * @return bool 
     */
    public function cadastrar($dados){
        try{
            $query = "INSERT INTO {$this->table} (titulo, autor, numero_pagina, preco, ano_publicacao, isbn)
            VALUES (:titulo, :autor, :numero_pagina, :preco, :ano_publicacao, :preco)"; 
            $stmt = $this->db->prepare($query);  

            $stmt->bindParam(':titulo', $dados['titulo']);  
            $stmt->bindParam(':autor', $dados['autor']);  
            $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);  
            $stmt->bindParam(':preco', $dados['preco']);  
            $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);  
            $stmt->bindParam(':isbn', $dados['isbn']);  

            $stmt->execute();
            $_SESSION['sucesso'] = "Cadastro realizado com sucesso 	....φ(︶▽︶)φ....	"; 
            return true; 
        }catch(PDOException $e){
            echo 'Erro na inserção: ' . $e->getMessage(); 
            return false; 
        }
    }
    
    /**
     * Editar Livro 
     * @param int $id
     * @param array $dados 
     * @return bool 
     */
    public function editar($id, $dados){
        try{
            $query = "UPDATE {$this->table} SET titulo = :titulo, autor = :autor, numero_pagina = :numero_pagina, preco = :preco, ano_publicacao = :ano_publicacao, isbn = :isbn WHERE id_livro = :id"; 
            $stmt = $this->db->prepare($query); 

            $stmt->bindParam(':titulo', $dados['titulo']);  
            $stmt->bindParam(':autor', $dados['autor']);  
            $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);  
            $stmt->bindParam(':preco', $dados['preco']);  
            $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);  
            $stmt->bindParam(':isbn', $dados['isbn']);  
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 

            $stmt->execute();
            return true; 
        }catch(PDOException $e){
            echo 'Erro na inserção: ' .$e->getMessage(); 
            return false;
        }
    }

    /**
     * Exclui o Livro por id
     * @param int $id
     */
    public function excluir($id){
        try{
            $query = "DELETE FROM {$this->table} WHERE id_livro = :id"; 
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute(); 
        }catch(PDOException $e){
            echo 'Erro na preparação da exclusao: ' .$e->getMessage(); 
        }
    }
}