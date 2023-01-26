<?php

namespace Public\Models\helper;

class PublicSlug
{
    /** @var string $text Recebe o texto que deve ser convertido no SLug */
    private string $text;

    /** @var string $urlSlugController Recebe o controller tratada */
    private string $urlSlugController;

    /** @var string $urlSlugMetodo Recebe o metodo tratado */
    private string $urlSlugMetodo;

    /** @var string $format Recebe o array de caracteres especiais que devem ser substituídos */
    private array $format;

    /**
     * Converter o valor obtido da URL "view-users" e converter no formato da classe "ViewUsers".
     * Utilizado as funções para converter tudo para minúsculo, converter o traço pelo espaço, converter cada letra da primeira palavra para maiúsculo, retirar os espaços em branco
     *
     * @param string $slugController Nome da classe
     * @return string Retorna a controller "view-users" convertido para o nome da Classe "ViewUsers"
     */
    public function slugController($slugController): string
    {
        $this->urlSlugController = $slugController;
        // Converter para minusculo
        $this->urlSlugController = strtolower($this->urlSlugController);
        // Converter o traco para espaco em braco
        $this->urlSlugController = str_replace("-", " ", $this->urlSlugController);
        // Converter a primeira letra de cada palavra para maiusculo
        $this->urlSlugController = ucwords($this->urlSlugController);
        // Retirar espaco em branco        
        $this->urlSlugController = str_replace(" ", "", $this->urlSlugController);
        //var_dump($this->urlSlugController);
        return $this->urlSlugController;
    }

    /**
     * Tratar o método
     * Instanciar o método que trata a controller
     * Converter a primeira letra para minusculo
     *
     * @param string $urlSlugMetodo
     * @return string
     */
    public function slugMetodo($urlSlugMetodo): string
    {
        $this->urlSlugMetodo = $this->slugController($urlSlugMetodo);
        //Converter para minusculo a primeira letra
        $this->urlSlugMetodo = lcfirst($this->urlSlugMetodo);
        //var_dump($this->urlSlugMetodo);
        return $this->urlSlugMetodo;
    }

    public function slug(string $text): string|null
    {
        $this->text = $text;

        $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:,\\\'<>°ºª';
        $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr-----------------------------------------------------------------------------------------------';

        $this->text = strtr(utf8_decode($this->text), utf8_decode($this->format['a']), $this->format['b']);
        $this->text = str_replace(" ", "-", $this->text);
        $this->text = str_replace(array("-----", "----", "---", "--"), "-", $this->text);
        $this->text = strtolower($this->text);

        return $this->text;
    }
}
