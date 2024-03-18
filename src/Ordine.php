<?php

abstract class Ordine
{
    protected $numero_ordine;
    protected $data;
    protected $importo_totale;
    protected $articoli_venduti = [];

    public function __construct($numero_ordine, $data, $importo_totale, $articoli_venduti) {
        $this->numero_ordine = $numero_ordine;
        $this->data = $data;
        $this->importo_totale = $importo_totale;
        $this->articoli_venduti = $articoli_venduti;
    }
    
    public function getNumero_ordine()
    {
        return $this->numero_ordine;
    }
    
    public function getData()
    {
        return $this->data;
    }
    
    public function getImporto_totale()
    {
        return $this->importo_totale;
    }
    
    public function getArticoli_venduti()
    {
        return $this->articoli_venduti;
    }
    
    public function getArticolo_venduto($id_vendita)
    {
        foreach ($this->articoli_venduti as $a)
            if ($a->getId_vendita() == $id_vendita)
                return $a;
        return null;
    }
}
