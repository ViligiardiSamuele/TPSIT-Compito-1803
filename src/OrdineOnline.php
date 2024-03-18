<?php

class OrdineOnline extends Ordine implements JsonSerializable
{
    protected $indirizzo_ip;
    protected $codice_di_autorizzazione;

    public function __construct($numero_ordine, $data, $importo_totale, $articoli_venduti, $indirizzo_ip, $codice_di_autorizzazione)
    {
        parent::__construct($numero_ordine, $data, $importo_totale, $articoli_venduti);
        $this->indirizzo_ip = $indirizzo_ip;
        $this->codice_di_autorizzazione = $codice_di_autorizzazione;
    }

    public function getIndirizzo_ip()
    {
        return $this->indirizzo_ip;
    }

    public function getCodice_di_autorizzazione()
    {
        return $this->codice_di_autorizzazione;
    }

    public function jsonSerialize()
    {
        $array = [];
        foreach (get_class_vars(get_class($this)) as $key => $value)
            $array[$key] = $this->{$key};
        return $array;
    }
}
