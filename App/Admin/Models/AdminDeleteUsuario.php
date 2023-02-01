<?php

namespace Admin\Models;

/**
 * Classe responsável em deletar usuários no banco de dados
 */
class AdminDeleteUsuario
{
    /** @var bool $result Recebe o resultado da operação de delete*/
    private bool $result = true;

    /** @var int|string|null $idUsuario Recebe o id do usuário que deve ser deletado no banco de dados*/
    private int|string|null $idUsuario;

    /** @var string|null $tipoUsuario Recebe o tipo do usuário*/
    private string|null $tipoUsuario;

    /** @var string|int|null $idEndereco Recebe o id do endereço do usuário*/
    private string|null $idEndereco;


    /**
     * Retorna a situação do cadastro para quem o instanciar.
     * Caso execute com sucesso retorna true, caso de algum problema, retorna false
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Deleta o usuário
     *
     * @param mixed $idUsuario ID do usuário que deve ser deletado
     *
     * @return void
    */
    public function deleteUsuario($idUsuario): void
    {
        $this->idUsuario = $idUsuario;

        $this->deleteRegister();

        $this->verifyUserType();

        if ($this->tipoUsuario == 'aluno') {
            $this->deleteAluno();
        } else if ($this->tipoUsuario == 'professor') {
            $this->deleteProfessor();
        } else {
            $this->result = false;
        }
    }

    /**
     * Deletas os registros do usuario em cursos
     *
     * @return void
     */
    private function deleteRegister()
    {
        $deleteRegister = new \Admin\Models\helper\crud\AdminDelete();
        $deleteRegister->fullDelete("DELETE FROM usuario_has_curso WHERE usuario_idUsuario = {$this->idUsuario}");
    }

    /**
     * Método responsável por verificar o tipo do usuário
     *
     * @return void
     */
    private function verifyUserType(): void
    {
        $getType = new \Admin\Models\helper\crud\AdminRead();
        $getType->fullRead("SELECT tipoUsuario FROM usuario WHERE idUsuario =:idUsuario", "idUsuario={$this->idUsuario}");
        $this->tipoUsuario = $getType->getResult()[0]['tipoUsuario'];
    }

    /**
     * Função responsável por verificar o tipo do usuário
     *
     * @return void
     */
    private function deleteAluno(): void
    {
        $deleteAluno = new \Admin\Models\helper\crud\AdminDelete();
        $deleteAluno->executeDelete("usuario", $this->idUsuario);

        $this->result = $deleteAluno->getResult();
    }

    /**
     * Função responsável por deletar o usuario do tipo professor
     *
     * @return void
     */
    private function deleteProfessor(): void
    {
        if ($this->deleteEndereco()) {
            echo "deletar professor";
            $deleteProfessor = new \Admin\Models\helper\crud\AdminDelete();
            $deleteProfessor->executeDelete("usuario", $this->idUsuario);

            var_dump($deleteProfessor->getResult());
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Ocorreu um erro ao deletar o endereço do usuario!</p>";
            $this->result = false;
        }
    }

    /**
     * Função responsável em deletar o endereçõ do usuario, quando existir.
     * 
     * Verifica o id do endereço ligado ao usuario em questão, e em seguida deleta a ligação entre as duas tabelas.
     * Após isso deleta o endereço.
     */
    private function deleteEndereco()
    {
        $getEndereco = new \Admin\Models\helper\crud\AdminRead();
        $getEndereco->fullRead("SELECT endereco FROM usuario WHERE idUsuario =:idUsuario", "idUsuario={$this->idUsuario}");
        $this->idEndereco = $getEndereco->getResult()[0]['endereco'];

        $user_data = array(
            'endereco' => null
        );

        $updateUser = new \Admin\Models\helper\crud\AdminUpdate();
        $updateUser->executeUpdate("usuario", $user_data, "WHERE idUsuario =:idUsuario", "idUsuario={$this->idUsuario}");

        if ($updateUser->getResult()) {
            $deleteEndereco = new \Admin\Models\helper\crud\AdminDelete();
            $deleteEndereco->executeDelete("endereco", $this->idEndereco);

            if ($deleteEndereco->getResult()) {
                return true;
            } else {
                return false;
            }
        } else {
            echo "Ocorreu um erro ao deletar o endereco";
            return false;
        }
    }
}
