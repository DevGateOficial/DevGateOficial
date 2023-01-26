<?php

namespace App\adms\Models;

/**
 * Classe responsável na edição da imagem de cursos do banco de dados
 */
class AdmsEditCursosImage
{
    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    /** @var array|null $resultBd Recebe os registro do banco de dados*/
    private array|null $resultBd;

    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /** @var array $dataImage Recebe os dados da imagem que devem ser inseridos no banco de dados*/
    private array|null $dataImage;

    /** @var array $delImage Recebe o endereco da imagem que deve ser excluida*/
    private string $delImage;

    /** @var array $nameImg Recebe o slug/nome da imagem*/
    private string $nameImg;

    /** @var string $diretorio Recebe o endereço de upload da imagem*/
    private string $directory;

    /**
     * Retorna true qwuando executar o processo com sucesso, retorna false quando ocorrer algum erro
     *
     * @return boolean
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * Retorna os registro do banco de dados
     *
     * @return array|null
     */
    public function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    /**
     * Função responsável em verificar se o curso em questão realmente existe no banco de dados.
     * Caso exista continua o processamente, caso contrário informa o erro.
     *
     * @param integer $id
     * @return boolean
     */
    public function viewCurso(int $id): bool
    {
        $this->id = $id;

        $viewCurso = new \App\adms\Models\helper\AdmsRead();
        $viewCurso->fullRead("SELECT idCurso, imagem
                                FROM curso
                                WHERE idCurso =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewCurso->getResult();

        if ($this->resultBd) {
            $this->result = true;
            return true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Curso não encontrado!</p>";
            $this->result = false;
            return false;
        }
    }

    /**
     * Função responsável em verificar se todos os campos estão preenchidos.
     * Instancia o método genérico de verificação, e retornar um erro caso algum campo não tenha sido preenchido.
     *
     * @param array|null $data
     * @return void
     */
    public function update(array $data = null): void
    {
        $this->data = $data;
        $this->dataImage = $this->data['imagem'];
        unset($this->data['imagem']);

        $valEmptyField = new \App\adms\Models\helper\AdmsValEmptyField();
        $valEmptyField->valField($this->data);

        if ($valEmptyField->getResult()) {
            if (!empty($this->dataImage['name'])) {
                $this->valInput();
            } else {
                $_SESSION['msg'] = "<p style='color: red;'> Erro: Necessário selecionar uma imagem!</p>";
                $this->result = false;
            }
        } else {
            $this->result = false;
        }
    }

    /**
     * Verifica se existe o curso com o Id recebido
     * Caso encontre algum erro, retorna false.
     *
     * @return void
     */
    private function valInput(): void
    {
        $valImage = new \App\adms\Models\helper\AdmsValImg();
        $valImage->validadeImg($this->dataImage['type']);

        if (($this->viewCurso($this->data['idCurso'])) and ($valImage->getResult())) {
            $this->result = false;
            $this->upload();
        } else {
            $this->result = false;
        }
    }

    /**
     * Função responsável em instanciar o SLug do nome da imagem e atribuir o diretorio.
     * Instancia também a classe responsável no upload de arquivos, executando o upload da imagem enviada.
     *
     * @return void
     */
    private function upload(): void
    {
        $slugImg = new \App\adms\models\helper\AdmsSlug();
        $this->nameImg = $slugImg->slug($this->dataImage['name']);

        $this->directory = "app/adms/assets/img/cursos/" . $this->data['idCurso'] . "/";

        $uploadImg = new \App\adms\models\helper\AdmsUpload();
        $uploadImg->upload($this->directory, $this->dataImage['tmp_name'], $this->nameImg);

        if ($uploadImg->getResult()) {
            $this->edit();
        } else {
            $this->result = false;
        }

        // if ((!file_exists($this->diretorio)) and (!is_dir($this->diretorio))) {
        //     mkdir($this->diretorio, 0755);
        // }

        // if (move_uploaded_file($this->dataImage['tmp_name'], $this->diretorio . $this->nameImg)) {
        //     $this->edit();
        // } else {
        //     $_SESSION['msg'] = "<p style='color: red;'> Erro: Não foi possível realizar o upload da imagem!</p>";
        //     $this->result = false;
        // }
    }

    /**
     * Funcão responsável em executar a edição do nome da imagem no bando de dados.
     * Colocando o nome da ultima imagem adicionada no curso.
     *
     * @return void
     */
    private function edit(): void
    {
        $this->data['imagem'] = $this->nameImg;

        $updateCurso = new \App\adms\Models\helper\AdmsUpdate();
        $updateCurso->executeUpdate("curso", $this->data, "WHERE idCurso=:idCurso", "idCurso={$this->data['idCurso']}");

        if ($updateCurso->getResult()) {
            $this->deleteImage();
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Erro: Não foi possível atualizar o curso!</p>";
            $this->result = false;
        }
    }

    /**
     * Funcão responsável em deletar a imagem antiga no diretório do curso.
     * Mantendo apenas a ultima imagem a ser enviada ao banco de dados.
     * 
     * @return void
     */
    private function deleteImage(): void
    {
        if ((!empty($this->resultBd[0]['imagem']) or ($this->resultBd[0]['imagem'] != null)) and ($this->resultBd[0]['imagem'] != $this->nameImg)) {
            $this->delImage = "app/adms/assets/img/cursos/" . $this->data['idCurso'] . "/" . $this->resultBd[0]['imagem'];

            if (file_exists($this->delImage)) {
                unlink($this->delImage);
            }
        }

        $_SESSION['msg'] = "<p style='color: green;'> Imagem atualizada com sucesso! </p>";
        $this->result = true;
    }
}
