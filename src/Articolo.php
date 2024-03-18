<?php

class Articolo implements JsonSerializable
{
    protected $id;
    protected $nome;
    protected $descrizione;
    protected $prezzo_di_listino;

    public function __construct($id, $nome, $descrizione, $prezzo_di_listino)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descrizione = $descrizione;
        $this->prezzo_di_listino = $prezzo_di_listino;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescrizione()
    {
        return $this->descrizione;
    }

    public function getPrezzo_di_listino()
    {
        return $this->prezzo_di_listino;
    }

    public function jsonSerialize()
    {
        $array = [];
        foreach (get_class_vars(get_class($this)) as $key => $value)
            $array[$key] = $this->{$key};
        return $array;
    }
}
