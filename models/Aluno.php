<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";
class Aluno{

    protected $db;
    protected $table = "alunos";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    /**
    *Buscar registro único  de Aluno
    *@param int $id
    *@return Aluno|null 
    */
    public function buscar($id){
        try{
            $query = "SELECT * FROM {$this->table} WHERE id_aluno = :id"; 
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute(); 

            return $stmt->fetch(PDO::FETCH_OBJ);
            
        }catch(PDOException $e){
            echo 'Erro na inserção: ' . $e->getMessage(); 
            return null; 
        }
    }
    
    /**
     * Listar todos os registros da tabela Alunos
     */
    public function listar(){
        try{
            $query = "SELECT * FROM {$this->table}"; 
            $stmt = $this->db->query($query); 
            return $stmt->fetchAll(PDO::FETCH_OBJ); 

        }catch(PDOException $e){
            echo 'Erro na inserção: ' . $e->getMessage(); 
            return null;
        }
    }

       /**
     * Cadastrar Aluno
     * @param array $dados 
     * @return bool 
     */
    public function cadastrar($dados){
        try{
            $query = "INSERT INTO {$this->table} (nome, cpf, email, telefone, celular, data_nascimento) VALUES (:nome, :cpf, :email, :telefone, :celular, :data_nascimento)"; 
            $stmt = $this->db->prepare($query); 

            $stmt->bindParam(':nome' , $dados['nome']); 
            $stmt->bindParam(':cpf' , $dados['cpf']); 
            $stmt->bindParam(':email' , $dados['email']); 
            $stmt->bindParam(':telefone' , $dados['telefone']); 
            $stmt->bindParam(':celular' , $dados['celular']); 
            $stmt->bindParam(':data_nascimento' , $dados['data_nascimento']); 

            $stmt->execute(); 
            return true; 
        }catch(PDOException $e){
            echo 'Erro na inserção: ' . $e->getMessage(); 
            return false; 
        }
    }

    
    /**
     * Editar Aluno
     * @param int $id
     * @param array $dados 
     * @return bool 
     */
    public function editar($id, $dados){
        try{
            $query = "UPDATE {$this->table} SET nome = :nome, email = :email, telefone = :telefone, celular = :celular, data_nascimento = :data_nascimento WHERE id_aluno = :id"; 
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->bindParam(':nome' , $dados['nome']); 
            $stmt->bindParam(':cpf' , $dados['cpf']); 
            $stmt->bindParam(':email' , $dados['email']); 
            $stmt->bindParam(':telefone' , $dados['telefone']); 
            $stmt->bindParam(':celular' , $dados['celular']); 
            $stmt->bindParam(':data_nascimento' , $dados['data_nascimento']); 

            $stmt->execute(); 
            return true; 
        }catch(PDOException $e){
            echo 'Erro na inserção: ' . $e->getMessage(); 
            return false; 
        }
    }

    /**
     * Exclui o Aluno por id
     * @param int $id
     */
    public function excluir($id){
        try{
            $query = "DELETE FROM {$this->table} WHERE id_aluno = :id"; 
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute();
        }catch(PDOException $e){
            echo 'Erro na prepação da exclusão: ' . $e->getMessage();
        }
    }
}