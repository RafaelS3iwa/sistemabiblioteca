<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>

    <header id="cabecalho" class="container">
        <div id="logotipo">
            <h1><img src="assets/img/logotipo.png" alt="BookMeNow" height="30"></h1>
        </div>

        <nav id="menu">
            <ul>
                <li><a href="#">Categorias</a></li>
                <li><a href="#">Sobre Nós</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </nav>

        <div id="botaoTopo">
            <a href="#" class="btn-secundario">Login</a>
            <a href="#" class="btn-secundario">Registrar</a>
        </div>
    </header>

    <div id="banner">
        <div class="container">
            <h2>Explorando Mundos Literários</h2>
            <p>Descubra os tesouros de conhecimentos e Imaginação em nossa Biblioteca</p>

            <div id="formProcurar">
                <form action="buscar.php" method="get">
                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input type="search" name="q" placeholder="O que você está procurando?">

                    <button type="submit">Procurar</button>
                </form>
            </div>
        </div>
    </div>

    <main class="container">
        <section id="livrosPopulares">
            <div class="bloco-titulo">
                <div class="titulo">
                    <h2>Livros Populares</h2>
                    <a href="#">Ver todos ></a>
                </div>

                <p>Descubra nossos Livros Mais Populares</p>
            </div>

            <div class="lista-livros">

            <?php for($count = 1; $count <=6; $count++): ?>
                <div class="card-livro">
                    <div class="capa">
                        <img src="/assets/img/livro-css.png" alt="CSS">
                        <span class="legenda">Lançamento</span>
                    </div>
                    <h3>CSS Grid Layout: Criando Layouts Profissionais</h3>
                </div>

                <div class="card-livro">
                    <div class="capa">
                        <img src="/assets/img/livro-html.png" alt="CSS">
                        <span class="black-friday">Black Friday</span>
                    </div>
                    <h3>HTML e CSS: Guia Prático</h3>
                </div>
    
            <?php endfor;?>

            </div>
        </section>
    </main>

    <footer id="rodape">
        <div class="container">
            <div class="bloco-rodape">
                <h2>BookMeNow</h2>
                <ul>
                    <li><a href="#">Sobre nós</a></li>
                    <li><a href="#">Contato</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Política de Privacidade</a></li>
                </ul>
            </div>

            <div class="bloco-rodape">
                <h2>Contatos</h2>
                <ul>
                    <li>Paraíba, 125</li>
                    <li>(14) 99999-9999</li>
                    <li>contato@bookmenow.com.br</li>
                </ul>
            </div>

            <div class="bloco-rodape">
                <h2>Rede Sociais</h2>
                <ul>
                    <li>Ícone Facebook</li>
                    <li>Ícone Instagram</li>
                </ul>
            </div>

        </div>

        <div id="copyright">
            &copy; 2023 - Todos os direitos são reservados - Desenvolvido por Rafael
        </div>
    </footer>
    <script src="assets/js/main.js"></script>
</body>

</html>