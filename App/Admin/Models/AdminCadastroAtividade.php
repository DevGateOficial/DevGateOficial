<?php

namespace Admin\Models;

/**
 * Model responsável no cadastro de atividades no sistema
 */
class AdminCadastroAtividade
{
    /** @var array $data Recebe os dados que devem ser inseridos no banco de dados*/
    private array|null $data;

    /** @var int|string|null $data Recebe o id do registro*/
    private int|string|null $id;

    /** @var int|string|null $idAtividade Recebe o id da atividade*/
    private array|string|null $idAtividade;

    /** @var bool $result Recebe os dados que devem ser inseridos no banco de dados*/
    private bool $result = false;

    /** @var array|null $resultBd Recebe os registro do banco de dados*/
    private array|null $resultBd;

    /** @var array|null $fileInfo Recebe o array de informações sobre o arquivo da atividade*/
    private array|null $fileInfo;

    /** @var array|null $directory Recebe o caminho do diretório que o arquivo deve ser salvo*/
    private string|null $directory;

    /** @var array|null $fileName Recebe o nome do arquivo da atividade*/
    private string|null $fileName;

    /** @var array|null $tmpName Recebe o caminho temporário de onde o arquivo está localizado*/
    private string|null $tmpName;

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
    public function viewAula(int $id): bool
    {
        $this->id = $id;

        $viewCurso = new \Admin\Models\helper\crud\AdminRead();
        $viewCurso->fullRead("SELECT idAula
                                FROM aula
                                WHERE idAula =:id LIMIT :limit", "id={$this->id}&limit=1");

        $this->resultBd = $viewCurso->getResult();

        if ($this->resultBd) {
            $this->result = true;
            return true;
        } else {
            $_SESSION['msg'] = "<p style='color: red;'> Aula não encontrado!</p>";
            $this->result = false;
            return false;
        }
    }

    /**
     * Recebe os dados da controller e instancia os métodos de verificação dos dados.
     *
     * @param array|null $data
     * @return void
     */
    public function create(array $data = null): void
    {
        $this->data = $data;

        // $valEmptyField = new \Admin\Models\helper\AdminValEmptyField();
        // $valEmptyField->valField($this->data);

        if (true) {
            $this->validateInput();
        } else {
            $this->result = false;
        }
    }

    /**
     * Instancia os Models responsáveis em verificar o nomeCurso e idResponsável do curso a ser cadastrado.
     *
     * @return void
     */
    private function validateInput(): void
    {
        $validadeCurso = new \Admin\Models\helper\AdminValCurso();
        $validadeCurso->validadeCurso($this->data['nomeAtividade']);

        if ($validadeCurso->getResult()) {
            $this->verifyType();
        } else {
            $this->result = false;
        }
    }

    /**
     * Verifica o tipo da atividade, fazendo o devido tratamento com a URL de acordo com seu tipo.
     *
     * @return void
     */
    private function verifyType(): void
    {
        if ($this->data['tipoAtividade'] == 'videoAula') {
            $this->data['url'] = str_replace("watch?v=", "embed/", $this->data['url']);
            $this->verifyAtividade();
        } else {
            $this->verifyAtividade();
        }
    }

    /**
     * Verifica se o nome dado à Atividade que será cadastrada é unico no banco de dados.
     * Caso seja, continua com o cadastro.
     * Caso não seja, retorna um erro, não prosseguindo com o cadastro.
     *
     * @return void
     */
    private function verifyAtividade(): void
    {
        $verifyAtiv = new \Admin\Models\helper\crud\AdminRead();
        $verifyAtiv->fullRead(
            "SELECT * FROM atividade WHERE nomeAtividade =:nomeAtividade AND idAula =:idAula",
            "nomeAtividade={$this->data['nomeAtividade']}&idAula={$this->data['idAula']}"
        );

        if ($verifyAtiv->getResult()) {
            $this->result = false;
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: O nome da atividade já está em uso!</p>";
        } else {
            $this->add();
        }
    }

    /**
     * Instancia o método genérico de criação de registros no banco de dados, passandos os dados referentes ao curso a ser cadastrado.
     * Caso execute com sucesso, atrubiu uma mensagem de sucesso e retorna true.
     * Caso a execução encontre algum erro, atribui uma mensagem de errro e retorna false.
     *
     * @return void
     */
    private function add(): void
    {
        if ($this->data['tipoAtividade'] != 'videoAula') {
            var_dump($this->data);
            $this->fileInfo = $this->data['url'];
            $slug =  new \Admin\Models\helper\AdminSlug();
            $this->data['url'] = $slug->slug($this->data['url']['name']);
        }

        $cadastrarAtividade = new \Admin\Models\helper\crud\AdminCreate();
        $cadastrarAtividade->executeCreate("atividade", $this->data);


        if ($this->data['tipoAtividade'] != 'videoAula') {
            if ($cadastrarAtividade->getResult()) {
                $this->idAtividade = $cadastrarAtividade->getResult();
                echo "daniel";
                $this->uploadFile();
            } else {
                $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Atividade não cadastrada!</p>";
                $this->result = false;
            }
        } else {
            if ($cadastrarAtividade->getResult()) {
                $_SESSION['msg'] = "<p style='color: #green;'>Atividade cadastrada com sucesso!</p>";
                $this->result = true;
            } else {
                $_SESSION['msg'] = "<p style='color: #red;'>Erro: Atividade não cadastrada!</p>";
                $this->result = false;
            }
        }
    }

    /**
     * Instancia a classe genérica responsável em fazer upload de arquivos.
     * Verifica se o upload ocorreu corrtamente:
     * caso sim, retorna true;
     * caso contrário, instancia a função responsável em deletar as informações da atividade do sistema.
     *
     * @return void
     */
    private function uploadFile(): void
    {
        var_dump($this->fileInfo);
        $this->fileName = $this->data['url'];
        $this->tmpName = $this->fileInfo['tmp_name'];
        $this->directory = "app/assets/data/atividades/" . $this->idAtividade . "/";

        echo "upload file";

        var_dump($this->directory);
        var_dump($this->tmpName);
        var_dump($this->fileName);

        $uploadFile = new \Admin\Models\helper\AdminUpload();
        $uploadFile->upload($this->directory, $this->tmpName, $this->fileName);

        var_dump($uploadFile->getResult());

        if ($uploadFile->getResult()) {
            $_SESSION['msg'] = "<p style='color: #green;'>Curso cadastrado com sucesso!</p>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<p style='color: #red;'>Erro: Ocorreu um erro no upload do arquivo!</p>";
            $this->deleteAtiv();
        }
    }

    /**
     * Instancia a classe genérica para deletar os registros da atividade no banco de dados.
     *
     * @return void
     */
    private function deleteAtiv()
    {
        $deleteAtiv = new \Admin\Models\helper\crud\AdminDelete();
        $deleteAtiv->executeDelete("atividade", $this->idAtividade);
        $this->result = false;
    }
}
