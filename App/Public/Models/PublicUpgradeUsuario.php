<?php

namespace Public\Models;

/**
 * Model responsável pelo upgrade do usuários
 */
class PublicUpgradeUsuario
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    /** @var array|null $dataEndereco Recebe os dados referemde à tabela endereco*/
    private array|null $dataEndereco;

    /** @var array|null $dataUser Recebe os dados referentes à tabela usuario*/
    private array $dataUser;

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
     * Undocumented function
     *
     * @param array|null $data
     * @return void
     */
    public function create(array $data = null)
    {
        $this->data = $data;

        $valEmptyField = new \Public\Models\helper\val\PublicValEmptyField();
        $valEmptyField->valField($this->data);

        $this->organizeArrays();

        if ($valEmptyField->getResult()) {
            $this->add();
        } else {
            $this->result = false;
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function organizeArrays(): void
    {
        $this->dataUser['cpf'] = $this->data['cpf'];
        $this->dataUser['telefone'] = $this->data['telefone'];

        unset($this->data['cpf'], $this->data['telefone']);

        $this->dataEndereco = $this->data;
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    public function add(): void
    {

        $user_sits = array(
            'adms_user_sits' => 4
        );

        $createEndereco = new \Public\Models\helper\crud\PublicCreate();
        $createEndereco->executeCreate("endereco", $this->dataEndereco);

        $this->dataUser['endereco'] = $createEndereco->getResult();

        $updateUser = new \Public\Models\helper\crud\PublicUpdate();
        $updateUser->executeUpdate("usuario", $this->dataUser, "WHERE idUsuario=:idUsuario", "idUsuario={$_SESSION['user_idUsuario']}");

        $changeSit = new \Public\Models\helper\crud\PublicUpdate();
        $changeSit->executeUpdate("usuario", $user_sits, "WHERE idUsuario=:idUsuario", "idUsuario={$_SESSION['user_idUsuario']}");

        if($createEndereco->getResult() && $updateUser->getResult()){
            $_SESSION['user_adms_user_sits'] = 4;
            $this->result = true;
        }
    }
}
