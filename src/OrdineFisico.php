<?php

class OrdineFisico extends Ordine implements JsonSerializable
{
    protected $pagamento;

    public function __construct($numero_ordine, $data, $importo_totale, $articoli_venduti, $pagamento)
    {
        parent::__construct($numero_ordine, $data, $importo_totale, $articoli_venduti);
        $this->pagamento = $pagamento;
    }

    public function getPagamento()
    {
        return $this->pagamento;
    }

    public function jsonSerialize()
    {
        $array = [];
        foreach (get_class_vars(get_class($this)) as $key => $value)
            $array[$key] = $this->{$key};
        return $array;
    }
}
