<?php 

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
    *@return Livro
    */
    public function buscar($id){
        try{
            $query = ("SELECT * FROM {$this->table} WHERE id_livro = :id"); 
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute();

            $livro = $stmt->fetch(PDO::FETCH_ASSOC);    
            if($livro){
                echo "ID: " . $livro['id_livro'] . "<br>"; 
                echo "Título" . $livro['titulo'] . "<br>"; 
                echo "Autor" . $livro['autor'] . "<br>"; 
                echo "Número de Páginas: " . $livro['numero_pagina'] . "<br>"; 
                echo "Preço: " . $livro['preco'] . "<br>"; 
                echo "Ano de Publicação: " . $livro['ano_publicacao'] . "<br>"; 
                echo "ISBN" . $livro['isbn'] . "<br>"; 
            }
        }catch(PDOException $e){
            echo "Erro na inserção: " . $e->getMessage(); 
        }
    }
    
    /** 
     * Busca o Livro pelo Título
     * @param string $titulo 
     */
    public function buscarTitulo($titulo){
        try{
            $query = ("SELECT * FROM {$this->table} WHERE titulo LIKE '%:titulo%");
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':%titulo%', $titulo, PDO::PARAM_STR);
            $stmt->execute(); 

            $livro = $stmt->fetch(PDO::FETCH_ASSOC);    
            if($livro){
                echo "ID: " . $livro['id_livro'] . "<br>"; 
                echo "Título" . $livro['titulo'] . "<br>"; 
                echo "Autor" . $livro['autor'] . "<br>"; 
                echo "Número de Páginas: " . $livro['numero_pagina'] . "<br>"; 
                echo "Preço: " . $livro['preco'] . "<br>"; 
                echo "Ano de Publicação: " . $livro['ano_publicacao'] . "<br>"; 
                echo "ISBN" . $livro['isbn'] . "<br>"; 
            }
        }catch(PDOException $e){
            echo 'Erro na inserção: ' .$e->getMessage(); 
        }
    }

    /** 
     * Busca o Livro pelo Autor
     * @param string $autor
     */
    public function buscarAutor($autor){
        try{
            $query = "SELECT * FROM {$this->table} WHERE autor LIKE %:autor%"; 
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam('%:autor%', $autor, PDO::PARAM_STR); 
            
            $stmt->execute(); 

            $livro = $stmt->fetch(PDO::FETCH_ASSOC);    
            if($livro){
                echo "ID: " . $livro['id_livro'] . "<br>"; 
                echo "Título" . $livro['titulo'] . "<br>"; 
                echo "Autor" . $livro['autor'] . "<br>"; 
                echo "Número de Páginas: " . $livro['numero_pagina'] . "<br>"; 
                echo "Preço: " . $livro['preco'] . "<br>"; 
                echo "Ano de Publicação: " . $livro['ano_publicacao'] . "<br>"; 
                echo "ISBN" . $livro['isbn'] . "<br>"; 
            }
        }catch(PDOException $e){
            echo 'Erro na inserção: ' .$e->getMessage(); 
        }
    }

    /**
     * Listar todos os registros da tabela
     * @return Livro
     */
    public function listar(){
        try{
            $query = ("SELECT * FROM {$this->table}"); 
            $stmt = $this->db->prepare($query); 
            $stmt->execute(); 

            $livro = $stmt->fetch(PDO::FETCH_ASSOC); 
            if($livro){
                echo "ID: " . $livro['id_livro'] . "<br>"; 
                echo "Título" . $livro['titulo'] . "<br>"; 
                echo "Autor" . $livro['autor'] . "<br>"; 
                echo "Número de Páginas: " . $livro['numero_pagina'] . "<br>"; 
                echo "Preço: " . $livro['preco'] . "<br>"; 
                echo "Ano de Publicação: " . $livro['ano_publicacao'] . "<br>"; 
                echo "ISBN" . $livro['isbn'] . "<br>"; 
            }
        }catch(PDOException $e){
            echo "Erro na inserção: " . $e->getMessage(); 
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
        }catch(PDOException $e){
            echo 'Erro na inserção: ' . $e->getMessage(); 
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

            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->bindParam(':titulo', $dados['titulo']);  
            $stmt->bindParam(':autor', $dados['autor']);  
            $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);  
            $stmt->bindParam(':preco', $dados['preco']);  
            $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);  
            $stmt->bindParam(':isbn', $dados['isbn']);  

            $stmt->execute();
        }catch(PDOException $e){
            echo 'Erro na inserção: ' .$e->getMessage(); 
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