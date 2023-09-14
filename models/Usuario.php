<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php"; 
class Usuario
{

    protected $db;
    protected $table = "usuarios";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

   /**
    *Buscar registro único  
    *@param int $id_usuario
    *@return Usuario|null  
    */
    public function buscar($id_usuario)
    {
        try{
            $query = "SELECT * FROM {$this->table} WHERE id_usuario = :id_usuario";
            $stmt = $this->db->prepare($query);  
            $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT); 
            $stmt->execute();
           
            return $stmt->fetch(PDO::FETCH_OBJ); 

        }catch(PDOException $e ){
            echo 'Erro na inserção: ' . $e->getMessage(); 
            return null; 
        }
    }

    /**
     * Listar todos os registros da tabela
     */
    public function listar()
    {
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
     * Cadastrar Usuário 
     * @param array $dados 
     * @return bool 
     */
    public function cadastrar($dados)
    {
        try{
            $query = "INSERT INTO {$this->table} (nome, email, senha, perfil) VALUES(:nome, :email, :senha, :perfil)";
            $stmt = $this->db->prepare($query);  

            $stmt->bindParam(':nome', $dados['nome']); 
            $stmt->bindParam(':email', $dados['email']); 
            $stmt->bindParam(':senha', $dados['senha']); 
            $stmt->bindParam(':perfil', $dados['perfil']); 
            
            $stmt->execute(); 
            $_SESSION['sucesso'] = "Cadastro realizado com sucesso 	(ﾉ◕ヮ◕)ﾉ*:･ﾟ✧"; 
            return true;
        }catch(PDOException $e){
            echo 'Erro ao cadastrar: ' . $e->getMessage(); 
            $_SESSION['erro'] = "Erro ao cadastrar o usuário (っ´ω`)ﾉ(╥ω╥)"; 
            return false;
        }
    }

    /**
     * Editar Usuário 
     * @param int $id_usuario
     * @param array $dados 
     * @return bool 
     */
    public function editar($id_usuario, $dados)
    {
        try{
            $query = "UPDATE {$this->table} SET nome = :nome, email = :email, senha = :senha, perfil = :perfil WHERE id_usuario = :id_usuario";
            $stmt = $this->db->prepare($query); 

            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':senha', $dados['senha']);
            $stmt->bindParam(':perfil', $dados['perfil']);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT); 

            $stmt->execute();
            $_SESSION['sucesso'] = "Usuário editado com sucesso!  ٩(◕‿◕)۶";
            return true; 
        }catch(PDOException $e){
            echo 'Erro ao editar: ' . $e->getMessage(); 
            $_SESSION['erro'] = "Erro ao editar o usuário (凸ಠ益ಠ)凸";
            return false; 
        }
    }

    /**
     * Exclui Usuário por id
     * @param int $id_usuario
     */
    
    public function excluir($id_usuario)
    {
        try{
            $query = "DELETE FROM {$this->table} WHERE id_usuario = :id_usuario"; 
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT); 
            $stmt->execute();
            return true; 
        }catch(PDOException $e){
            echo 'Erro na preparação da exclusão: ' . $e->getMessage(); 
            return false;   
        }
    }
}
