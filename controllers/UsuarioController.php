<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Usuario.php";

class UsuarioController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

    public function listarUsuarios(){
        return $this->usuarioModel->listar();
    }

    public function cadastrarUsuario(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $dados = [
                'nome' => $_POST['nome'], //o $_POST['nome'] está associado ao <input name="nome">, ou seja, ao nome atribuído ao input
                'email' => $_POST['email'], //e o 'nome' está sendo associado ao bindParam
                'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT), //criptografa a senha, criando um hash, essa é a mais forte
                'perfil' => $_POST['perfil']
            ];

            $this->usuarioModel->cadastrar($dados);
            header('Location: index.php'); 
            exit;
        }
    }

    public function editarUsuario(){
        $id_usuario = $_GET['id_usuario'];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            if(isset($_POST['senha']) && !empty($_POST['senha'])){
                //nova senha
                $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            }else{
                 //manter senha antiga
                $usuario = $this->usuarioModel->buscar($id_usuario); 
                $senha = $usuario->senha;
            }

            $dados = [
                'nome' => $_POST['nome'],      
                'email' => $_POST['email'], 
                'senha' => $senha,
                'perfil' => $_POST['perfil']
            ];

            $this->usuarioModel->editar($id_usuario, $dados);
            header('Location: index.php'); 
            exit;
        }
        return $this->usuarioModel->buscar($id_usuario); 
    }

    public function excluirUsuario(){
        $this->usuarioModel->excluir($_GET['id_usuario']); 
        $_SESSION['sucesso'] = "Usuário foi mandado pra puta que o pariu ε===(っ≧ω≦)っ";
        header('Location: index.php'); 
        exit;
    }
}
