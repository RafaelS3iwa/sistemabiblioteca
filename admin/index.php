<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Biblioteca</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    
    <style>
            :root{
                --bs-primary-rgb: 247, 148, 30;
                --bs-secondary-rgb: 0, 74, 141;
            }
        </style>

</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="#">Biblioteca</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#">Emprestimos</a>
                        <a class="nav-link" href="#">Livros</a>
                        <a class="nav-link" href="#">Alunos</a>
                        <a class="nav-link" href="#">Usuários</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class = "container mt-3 mb-3">
        <h1>Área Administrativa da Biblioteca do Senac</h1>
        <img src = "https://st2.depositphotos.com/1518767/6553/i/450/depositphotos_65537561-stock-photo-happy-students-working-together-on.jpg" class = "img-fluid">
    </main>
    

<footer class="bg-secondary text-white text-center p-2 mt-auto">
    <p>Copyright &copy; <?=date("Y")?> Todos os direitos são reservados</p>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>