<?php 

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
    *@return Aluno
    */
    public function buscar($id){
        try{
            $query = "SELECT * FROM {$this->table} WHERE id_aluno = :id"; 
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute(); 

            $aluno = $stmt->fetch(PDO::FETCH_ASSOC); 
            if($aluno){
                echo "ID: " . $aluno['id_aluno'] . "<br>";    
                echo "Nome: " . $aluno['nome']  . "<br>";    
                echo "CPF: " . $aluno['cpf']  . "<br>";    
                echo "E-mail: " . $aluno['email']  . "<br>";    
                echo "Telefone: " . $aluno['telefone']  . "<br>";    
                echo "Celular: " . $aluno['celular']  . "<br>";    
                echo "Data de Nascimento: " . $aluno['data_nascimento']  ; "<br>";    
        }
        }catch(PDOException $e){
            echo 'Erro na inserção: ' . $e->getMessage(); 
        }
    }
    
    /**
     * Listar todos os registros da tabela Alunos
     */
    public function listar(){
        try{
            $query = "SELECT * FROM {$this->table}"; 
            $stmt = $this->db->prepare($query); 
            $stmt->execute(); 
    
            $aluno = $stmt->fetch(PDO::FETCH_ASSOC); 
            if($aluno){
                echo "ID: " . $aluno['id_aluno'] . "<br>";    
                echo "Nome: " . $aluno['nome']  . "<br>";    
                echo "CPF: " . $aluno['cpf']  . "<br>";    
                echo "E-mail: " . $aluno['email']  . "<br>";    
                echo "Telefone: " . $aluno['telefone']  . "<br>";    
                echo "Celular: " . $aluno['celular']  . "<br>";    
                echo "Data de Nascimento: " . $aluno['data_nascimento']  ; "<br>";    
        }
        }catch(PDOException $e){
            echo 'Erro na inserção: ' . $e->getMessage(); 
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
        }catch(PDOException $e){
            echo 'Erro na inserção: ' . $e->getMessage(); 
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
        }catch(PDOException $e){
            echo 'Erro na inserção: ' . $e->getMessage(); 
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