<?php

namespace Core;

/**
 * Verifica se existe a Classe
 * Carregar a CONTROLLER
 */
class CarregarPg
{
    /** @var string $urlController Recebe da URL o nome da controller */
    private string $urlController;

    /** @var string $urlMetodo Recebe da URL o nome do método */
    private string $urlMetodo;

    /** @var string $urlParameter Recebe da URL o parâmetro */
    private string $urlParameter;

    /** @var string $classLoad Controller que deve ser carregada */
    private string|null $classLoad;

    /** @var array $listPgPublica Recebe a lista de páginas publicas do site */
    private array $listPgPublica;

    /** @var array $listPgPrivate Recebe a lista de páginas privadas do site */
    private array $listPgPrivate;

    /** @var array $listPgPrivate Recebe a lista de páginas privadas do site */
    private array $listPgAdmin;

    /** @var array $lisgPgAdminPrivate Recebe a lista de páginas privadas do site */
    private array $lisgPgAdminPrivate;

    public function loadPage(string|null $urlController, string|null $urlMetodo, string|null $urlParameter): void
    {
        $this->urlController = $urlController;
        $this->urlMetodo = $urlMetodo;
        $this->urlParameter = $urlParameter;

        $this->pgPublic();

        if (class_exists($this->classLoad)) {
            $this->loadMetodo();
        } else {
            //die('Ocorreu um erro ao encontrar a classe! Por gentileza tente novamente. Caso o problema persista, entre em contato com o suporte: ' . EMAILADM);
            $slug = new \Public\Models\helper\PublicSlug();
            $this->urlController = $slug->slugController(CONTROLLER);
            $this->urlMetodo = $slug->slugMetodo(METODO);
            $this->urlParameter = "";

            $this->loadPage($this->urlController, $this->urlMetodo, $this->urlParameter);
        }
    }

    private function loadMetodo(): void
    {
        $classLoad = new $this->classLoad;
        if (method_exists($classLoad, $this->urlMetodo)) {
            $classLoad->{$this->urlMetodo}($this->urlParameter);
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Ocorreu um erro ao encontrar o método ! Por gentileza tente novamente. Caso o problema persista, entre em contato com o suporte: " . EMAILADM . "</p>";
            $urlRedirect = URLADM . "erro/index/";
            header("Location: $urlRedirect");
        }
    }

    /**
     * Função responsável em carregar as páginas públicas do site.
     * Caso a págiga a qual está tentando ser acessada, mão está na lista de páginas publicas, instancia a função de páginas privadas.
     *
     * @return void
     */
    private function pgPublic(): void
    {
        $this->listPgPublica = ["Login", "CadastroUsuario", "ConfEmail", "RecoverPass", "UpdatePass", "Erro", "AulaAssistida"];

        if (in_array($this->urlController, $this->listPgPublica)) {
            $this->classLoad = "Public\\Controllers\\" . $this->urlController;
        } else {
            $this->pgPrivate();
        }
    }


    private function verifyLogin(): bool
    {
        if ((isset($_SESSION['user_idUsuario'])) and (isset($_SESSION['user_nomeCompleto'])) and (isset($_SESSION['user_email']))) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Função responsável em carregar as páginas privadas do site.
     * Primeiramente instancia o método para verificar se o usuário está logado no sistema:
     * 
     *      Caso sim, verifica se a página requisitada está na lista correspondende às páginas publicas.
     *          Estando, redireciona para a página;
     *          Caso contrária, instancia a função das páginas administrativas.
     * 
     *      Caso não esteja, redireciona para a página de Login e imprime uma mensagem de erro.
     *
     * @return void
     */
    private function pgPrivate(): void
    {
        $this->listPgPrivate = [
            "Home", "UpgradeUsuario", "Logout", "AcessoAdm",
            "ListCursos", "ListAulas", "ListAtividades", "MeusCursos",
            "ViewCurso", "ViewAula", "ViewAtividade", "PerfilUsuario", "EditUsuario", "RegisterCurso"
        ];

        if ($this->verifyLogin()) {
            if (in_array($this->urlController, $this->listPgPrivate)) {
                $this->classLoad = "Public\\Controllers\\" . $this->urlController;
            } else {
                $this->pgAdmin();
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Para acessar a página, realize o login</p>";
            $urlRedirect = URL . "login/index";
            header("Location: $urlRedirect");
        }
    }

    /**
     * 
     * 
     * @return void
     */
    private function pgAdmin(): void
    {
        $this->listPgAdmin = [
            "AdminDashboard",
            "AdminCadastroCurso", "AdminCadastroAula", "AdminCadastroAtividade",
            "AdminListCursos", "AdminListAulas", "AdminListAtividades",
            "AdminViewCurso", "AdminViewAula", "AdminViewAtividade",
            "AdminDeleteCurso", "AdminDeleteAula", "AdminDeleteAtividade",
            "AdminEditCurso", "AdminEditAula", "AdminEditAtividade", "AdminEditImageCurso","AdminUpgradeUsuario"
        ];


        if ($_SESSION['user_tipoUsuario'] != 'aluno') {
            if (in_array($this->urlController, $this->listPgAdmin)) {
                unset($_SESSION['msg']);
                $this->classLoad = "Admin\\Controllers\\" . $this->urlController;
            } else {
                $this->pgAdminPrivate();
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Você não tem permissão para acessar esta página</p>";
            $urlRedirect = URL . "erro/index";
            header("Location: $urlRedirect");
        }
    }

    private function pgAdminPrivate(): void
    {
        $this->lisgPgAdminPrivate = ["AdminListUsuarios", "AdminViewUsuario", "AdminDeleteUsuario", "AdminEditEmailInfo", "AdminListSolicitacoes"];

        if ($_SESSION['user_tipoUsuario'] == 'administrador') {
            if (in_array($this->urlController, $this->lisgPgAdminPrivate)) {
                unset($_SESSION['msg']);
                $this->classLoad = "Admin\\Controllers\\" . $this->urlController;                
            } else {
                $_SESSION['msg'] = "<p style='color: red'>Erro: Página não encontrada</p>";
                $urlRedirect = URL . "erro/index/";
                header("Location: $urlRedirect");
            }
        } else {
            $_SESSION['msg'] = "<p style='color: red'>Erro: Você não tem permissão para acessar esta página</p>";
            $urlRedirect = URL . "erro/index/";
            header("Location: $urlRedirect");
        }
    }
}
