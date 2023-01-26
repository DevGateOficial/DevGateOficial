<?php

namespace Public\Controllers;

/**
 * Controller da página de perf
 */
class PerfilUsuario
{
    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

    /** @var array|null $resultBd Recebe os registro do banco de dados*/
    private array|null $resultBd;

    /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
    private array|string|null $data = [];

    private bool $result;

    /**
     * Retorna os registro do banco de dados
     *
     * @return array|null
     */
    public function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    public function index(): void{
        $this->id = $_SESSION['user_idUsuario'];

        $viewCurso = new \Public\Models\helper\crud\PublicRead();
        $viewCurso->fullRead("SELECT * FROM usuario WHERE idUsuario =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewCurso->getResult();

        if ($this->resultBd) {
            $this->data['viewUser'] = $this->resultBd;
            $this->viewUser();
        } else {
            $urlRedirect = URL;
            header("Location: $urlRedirect");
        }
    }
    /**
     * Faz a leitura do usuário correspondente ao id que é recebido através da controller
     *
     * @param integer $id
     * @return void
     */
    public function viewUser(): void
    {
        $loadView = new \Core\ConfigView("Views/usuario/viewUser", $this->data);
        $loadView->loadViewLog();
    }
}
