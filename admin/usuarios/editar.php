<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

    $usuarioController = new UsuarioController(); 
    $usuario = $usuarioController->editarUsuario();
?>

<main class="container mt-3 mb-3">
    <h1>Editar Usuário</h1>

    <form action="editar.php?id=<?=$usuario->id_usuario?>" method="post" class="row g-3">
        <div class="col-md-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required value="<?=$usuario->nome?>">
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required value="<?=$usuario->email?>">
        </div>

        <div class="col-md-6">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" required>
        </div>

        <div class="col-md-8">
            <label for="pefil" class="form-label">Perfil</label>
            <select name="perfil" id="perfil" class="form-select" required>
                <option>Selecione o Perfil</option>
                <option value="usuario">Usuário</option>
                <option value="administrador">Administrador</option>
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Confirmar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>

</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php" ?>