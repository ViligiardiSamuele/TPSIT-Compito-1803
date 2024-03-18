<?php

class ArticoloVenduto implements JsonSerializable
{
    protected $id_vendita;
    protected $prezzo_di_vendita;
    protected $quantita_acquistata;

    public function __construct($id_vendita, $prezzo_di_vendita, $quantita_acquistata)
    {
        $this->id_vendita = $id_vendita;
        $this->prezzo_di_vendita = $prezzo_di_vendita;
        $this->quantita_acquistata = $quantita_acquistata;
    }

    public function getId_vendita()
    {
        return $this->id_vendita;
    }

    public function getPrezzo_di_vendita()
    {
        return $this->prezzo_di_vendita;
    }

    public function getQuantita_acquistata()
    {
        return $this->quantita_acquistata;
    }

    public function jsonSerialize()
    {
        $array = [];
        foreach (get_class_vars(get_class($this)) as $key => $value)
            $array[$key] = $this->{$key};
        return $array;
    }
}
