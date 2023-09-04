<?php

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
    *@param int $id
    *@return Usuario
    */
    public function buscar($id)
    {
        try{
            $query = ("SELECT * FROM {$this->table} WHERE id_usuario = :id");
            $stmt = $this->db->prepare($query);  
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC); 

            if($usuario){ 
                echo "ID: " .$usuario['id_usuario'] . "<br>"; 
                echo "Nome: " .$usuario['nome'] . "<br>"; 
                echo "E-mail: " .$usuario['email'] . "<br>"; 
                echo "Perfil: " .$usuario['perfil'] . "<br>"; 
            } //isso tudo aqui é temporário
        }catch(PDOException $e ){
            echo 'Erro na inserção: ' . $e->getMessage(); 
        }
    }

    /**
     * Listar todos os registros da tabela
     */
    public function listar()
    {
        try{
            $query = ("SELECT * FROM {$this->table}"); 
            $stmt = $this->db->prepare($query); 
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC); 

            if($usuario){
                echo "ID: " .$usuario['id_usuario'] . "<br>"; 
                echo "Nome: " .$usuario['nome'] . "<br>"; 
                echo "E-mail: " .$usuario['email'] . "<br>"; 
                echo "Perfil: " .$usuario['perfil'] . "<br>"; 
            }
        }catch(PDOException $e){
            echo 'Erro na inserção: ' . $e->getMessage(); 
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
        }catch(PDOException $e){
            echo 'Erro na preparação da consulta: ' . $e->getMessage(); 
        }

        $stmt->bindParam(':nome', $dados['nome']); 
        $stmt->bindParam(':email', $dados['email']); 
        $stmt->bindParam(':senha', $dados['senha']); 
        $stmt->bindParam(':perfil', $dados['perfil']); 

        try{
            $stmt->execute(); 
            echo 'Inserção bem-sucedida!'; 
        }catch(PDOException $e){
            echo 'Erro na inserção: ' . $e->getMessage(); 
        }
    }

    /**
     * Editar Usuário 
     * @param int $id
     * @param array $dados 
     * @return bool 
     */
    public function editar($id, $dados)
    {
        try{
            $query = ("UPDATE {$this->table} SET nome = :nome, email = :email, senha = :senha WHERE id_usuario = :id");
            $stmt = $this->db->prepare($query); 
        }catch(PDOException $e){
            echo 'Erro na preparação da consulta: ' . $e->getMessage(); 
        }

        $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':senha', $dados['senha']);
        $stmt->bindParam(':perfil', $dados['perfil']);

        try{
            $stmt->execute();
            echo 'Seus dados foram atualizados com sucesso!'; 
        }catch(PDOException $e){
            echo 'Erro na inserção: ' . $e->getMessage(); 
        }
    }

    /**
     * Exclui Usuário por id
     * @param int $id
     */
    
    public function excluir($id)
    {
        try{
            $query = ("DELETE FROM {$this->table} WHERE id_usuario = :id"); 
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute();
        }catch(PDOException $e){
            echo 'Erro na preparação da exclusão: ' . $e->getMessage(); 
        }
    }
}
