    <a href="login-form.html">Fazer login!____</a>
    <a href="register-form.html">Registrar-se na plataforma!</a>

    <header>
        <nav>
            <div class="logo-container">
                <h2 class="logo">DevGate</h2>
            </div>
            <input type="checkbox" id="check" />
            <label for="check" class="hamburger-btn">
                <i class="fas fa-bars"></i>
            </label>

            <ul class="nav-list mobile">
                <li><a href="">Home</a></li>
                <li><a href="">Html</a></li>
                <li><a href="">Java</a></li>
                <li><a href="">Css</a></li>
                <li><a href="">Sobre</a></li>

                <li class="login-mobile">
                    <a href="<?= URL;?>cadastro-user">
                        <img src="<?= URL;?>assets/img/user 1.svg" alt="Delineado de uma pessoa"> 
                        Login
                    </a>
                </li>
            </ul>

            <ul class="desktop-list">
                <li><a href="">Home</a></li>
                <li>
                    <a href="" class="bar"></a>
                    <a href="">Html</a>
                </li>
                <li><a href="">Java</a></li>
                <li><a href="">Css</a></li>
                <li><a href="">Sobre</a></li>
            </ul>

            <div class="login-btn">
                <a href="<?= URL;?>cadastro-user">
                    <img src="<?= URL;?>assets/img/user 1.svg" alt="Delineado de uma pessoa" />
                </a>
            </div>
        </nav>
    </header>

    <div class="section">
        <div class="cta">
            <h3>DevGate encontre seu caminho no mundo da programação</h3>
            <p>Os melhores cursos gratuitos da web em um só lugar</p>
            <button>Descobrir cursos!</button>
        </div>
    </div>

    <main>
        <div class="mobile-view">
            <div class="cursos-select-mobile">
                <img src="<?= URL;?>assets/img/html.png" alt="" />
                <img src="<?= URL;?>assets/img/java.png" alt="" />
                <img src="<?= URL;?>assets/img/css.png" alt="" />
            </div>
            <div class="curso1-content-mobile">
                <h4>HTML 5 Básico</h4>
                <p>
                    Descrição: Curso que vai do básico ao intermediario, para pessoas
                    que possuem nenhum ou pouco conhecimento na area. Ensino baseado em
                    projetos basicos e práticos
                </p>
                <hr />
            </div>
            <div class="curso2-content-mobile">
                <h4>Java e Orientação a Objeto</h4>
                <p>
                    Descrição: Curso que vai do básico ao avançado, para aprendizado do
                    paradigma de orientação a objetos Ensino baseado em projetos basicos
                    e práticos intermediario e avançados
                    <hr />
                </p>
            </div>
            <div class="curso3-content-mobile">
                <h4>CSS e Estilização de Páginas</h4>
                <p>
                    Descrição: Curso que vai do básico ao intermediario, para inicio do
                    aprendizado de estilização de páginas com introdução a boaspraticas
                    funções de reponsividade Ensino baseado em projetos práticos básicos
                    e intermediarios
                </p>
            </div>
        </div>

        <div class="desktop-view">
            <div class="curso">
                <img src="<?= URL;?>assets/img/html.png" alt="" />
                <div class="left-curso">

                    <h4>HTML 5 Básico</h4>
                    <p>
                        Descrição: Curso que vai do básico ao intermediario, para pessoas
                        que possuem nenhum ou pouco conhecimento na area. Ensino baseado em
                        projetos basicos e práticos
                    </p>
                </div>
            </div>

            <hr />

            <div class="curso">
                <img src="<?= URL;?>assets/img/java.png" alt="" />
                <div class="left-text">
                    <h4>Java e Orientação a Objeto</h4>
                    <p>
                        Descrição: Curso que vai do básico ao intermediario, para pessoas
                        que possuem nenhum ou pouco conhecimento na area. Ensino baseado em
                        projetos basicos e práticos
                    </p>
                </div>
            </div>

            <hr />

            <div class="curso">
                <img src="<?= URL;?>assets/img/css.png" alt="" />
                <div class="left-text">

                    <h4>CSS e Estilização de Páginas</h4>
                    <p>
                        Descrição: Curso que vai do básico ao intermediario, para pessoas
                        que possuem nenhum ou pouco conhecimento na area. Ensino baseado em
                        projetos basicos e práticos
                    </p>
                </div>
            </div>
        </div>

        <div class="metodo">
            <div class="metodo-text">

                <h2>Método focado no aprendizado prático</h2>
                <p>
                    professores qualificados e experientes na area de programação, com
                    experiencia de mercado
                </p>
            </div>

            <div class="card">
                <img src="<?= URL;?>assets/img/Icon-foco.png " alt="" />
                <h4>Foco de aprendizado</h4>
                <p>
                    O mundo da programação sofre de um grande overload de informações o
                    que faz com que muitos fiquem perdidos e desmotivados a estudar, por
                    isso nossos cursos tem como objetivo dar um ponto focal para os
                    estudantes
                </p>
            </div>
            <div class="card">
                <img src="<?= URL;?>assets/img/Icon-obj.png " alt="" />
                <h4>Objetivo</h4>
                <p>
                    O mundo da programação sofre de um grande overload de informações o
                    que faz com que muitos fiquem perdidos e desmotivados a estudar, por
                    isso nossos cursos tem como objetivo dar um ponto focal para os
                    estudantes
                </p>
            </div>
            <div class="card">
                <img src="<?= URL;?>assets/img/Icon-temp.png " alt="" />
                <h4>Economizar Tempo</h4>
                <p>
                    O mundo da programação sofre de um grande overload de informações o
                    que faz com que muitos fiquem perdidos e desmotivados a estudar, por
                    isso nossos cursos tem como objetivo dar um ponto focal para os
                    estudantes
                </p>
            </div>
        </div>
    </main>


    <footer>
        <div class="texto">
            <h2>
                DevGate
            </h2>
            <p>
                DevGate 2022
                <br>
                Todos os direitos reservados
            </p>
        </div>
        <div class="contato">
            <a target="_blank" href="https://www.gmail.com">
                <img src="<?= URL;?>assets/img/Gmail-Logo.svg" alt="">
            </a>
        </div>
    </footer>
</body>

</html>