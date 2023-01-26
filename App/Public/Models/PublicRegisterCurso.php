<?php

namespace Public\Models;

/**
 * Model responsável em registrar usuários em cursos, por meio de uma tabela associativa no banco de dados.
 */
class PublicRegisterCurso
{
    /** @var bool $result Recebe TRUE ou FALSE para indicar a situação dos processos*/
    private bool $result;

    /** @var array|string|null $idUsuario Recebe o ID do usuario que esta realizando o registro*/
    private int|string|null $idUsuario;

    /** @var array|string|null $idCurso Recebe o ID do Curso em que o usuário será registrdo*/
    private int|string|null $idCurso;

    /** @var array|null $data Rece os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /**
     * Retorna true qwuando executar o processo com sucesso, retorna false quando ocorrer algum erro
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    public function getInfo(int|string|null $idCurso): void
    {
        $this->idCurso = $idCurso;
        $this->idUsuario = $_SESSION['user_idUsuario'];

        if ($this->verifyRegister()) {
            //usuario já está registrado no curso
            $this->result = false;
        } else {
            $this->register();
        }
    }

    /**
     * Atribui à variável $data o array de dados que deve ser inserido no banco de dados.
     * Instancia a classe genérica responsável no cadastro de resgistros no banco de dados,
     * passando "usuaio_has_curso" como tabela e $data como os dados que devem ser inseridos.
     * Verifica se o CREATE foi executado com sucesso:
     *     Caso sim, altera o valor da variável $result para TRUE,
     *     Caso não, altera o valor da variável $result para FALSE.
     *
     * @return void
     */
    private function register(): void
    {
        $this->data = array(
            'usuario_idUsuario' => $this->idUsuario,
            'curso_idCurso' => $this->idCurso,
            'tipo_usuario_curso' => 'aluno',
            'data_inscricao' => date('Y-m-d'),
            'ultimo_acesso' => date('Y-m-d'),
        );

        $register = new \Public\Models\helper\crud\PublicCreate;
        $register->executeCreate("usuario_has_curso", $this->data);

        $this->result = $register->getResult() ? true : false;
    }

    /**
     * Instancia a classe génerica de buscar no banco de dados.
     * Verifica se a relação de Registro já existe entre o curso informado e o usuário logado no sistema.
     * Caso exista, retorna true, informando que o usuário já está cadastrado no curso.
     * Caso não, retorna false, informando que o usuário não está cadastrado no curso.
     *
     * @return boolean
     */
    private function verifyRegister(): bool
    {
        $verify = new \Public\Models\helper\crud\PublicRead();
        $verify->fullRead(
            "SELECT * FROM usuario_has_curso WHERE usuario_idUsuario =:idUsuario AND curso_idCurso =:idCurso",
            "idUsuario={$this->idUsuario}&idCurso={$this->idCurso}"
        );

        return $verify->getResult() ? true : false;
    }
}
