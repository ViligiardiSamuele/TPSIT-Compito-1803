<?php

class Negozio implements JsonSerializable
{
    protected $nome;
    protected $telefono;
    protected $indirizzo;
    protected $url;
    protected $p_iva;
    protected $ordini = [];
    protected $articoli = [];

    public function __construct()
    {
        $this->nome = 'pappaeciccia';
        $this->telefono = '333555';
        $this->indirizzo = 'Via Del Negozio 12';
        $this->url = 'www.pappaeciccia.com';
        $this->p_iva = '000123';
        $this->ordini = [
            new OrdineFisico(
                1,
                '01/01/1970',
                (5+7),
                [
                    new ArticoloVenduto(1, 5, 2),
                    new ArticoloVenduto(2, 7, 1),
                ],
                'carta'
            ),
            new OrdineFisico(
                2,
                '02/01/1970',
                12,
                [
                    new ArticoloVenduto(1, 3, 2),
                    new ArticoloVenduto(2, 6, 1),
                ],
                'conntanti'
            ),
            new OrdineOnline(
                3,
                '01/01/1970',
                48,
                [
                    new ArticoloVenduto(1, 24, 1),
                    new ArticoloVenduto(2, 24, 1),
                ],
                '10.0.0.1',
                'IC10'
            ),
            new OrdineOnline(
                4,
                '02/01/1970',
                12,
                [
                    new ArticoloVenduto(1, 3, 2),
                    new ArticoloVenduto(2, 6, 1),
                ],
                '10.0.0.2',
                'IC10'
            )
        ];
        $this->articoli = [
            new Articolo(1, 'pomodori', 'molto buoni', 5),
            new Articolo(2, 'pizza', 'margherita', 7)
        ];
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getP_iva()
    {
        return $this->p_iva;
    }

    public function getOrdini()
    {
        return $this->ordini;
    }

    public function getOrdine($numero_ordine)
    {
        foreach ($this->ordini as $o)
            if ($o->getNumero_ordine() == $numero_ordine)
                return $o;
        return null;
    }

    public function getArticoli()
    {
        return $this->articoli;
    }

    public function getArticolo($id)
    {
        foreach ($this->articoli as $a)
            if ($a->getId() == $id)
                return $a;
        return null;
    }

    public function jsonSerialize()
    {
        $array = [];
        foreach (get_class_vars(get_class($this)) as $key => $value)
            $array[$key] = $this->{$key};
        return $array;
    }

    public function verifica($numero_ordine)
    {
        $tot_calcolato = 0;
        foreach ($this->ordini as $o) {
            if ($o->getNumero_ordine() == $numero_ordine) {
                $o->getImporto_totale();

                foreach ($o->getArticoli_venduti() as $av)
                    $tot_calcolato += ($av->getPrezzo_di_vendita() * $av->getQuantita_acquistata());
                return $o->getImporto_totale() == $tot_calcolato;
            }
        }
        return null;
    }

    public function sconto($numero_ordine)
    {
        $listino = 0;
        $vendita = 0;
        foreach ($this->ordini as $o) {
            if ($o->getNumero_ordine() == $numero_ordine) {
                foreach ($o->getArticoli_venduti() as $av) {
                    $vendita += ($av->getPrezzo_di_vendita() * $av->getQuantita_acquistata());
                    $listino += $this->getArticolo($av->getId_vendita())->getPrezzo_di_listino();
                }
                return $listino - $vendita;
            }
        }
        return null;
    }
}
