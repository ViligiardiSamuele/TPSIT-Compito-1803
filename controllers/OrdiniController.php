<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class OrdiniController
{
    function ordini(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $response->getBody()->write(json_encode($negozio->getOrdini(), JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    function ordine(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $response->getBody()->write(json_encode($negozio->getOrdine($args['numero_ordine']), JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    function articoli_venduti(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $response->getBody()->write(json_encode($negozio->getOrdine($args['numero_ordine'])->getArticoli_venduti(), JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    function articolo_venduto(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $response->getBody()->write(json_encode($negozio->getOrdine($args['numero_ordine'])->getArticolo_venduto($args['id']), JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    function verifica(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();
        
        $response->getBody()->write(json_encode($negozio->verifica($args['numero_ordine']), JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    function sconto(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $response->getBody()->write(json_encode($negozio->sconto($args['numero_ordine']), JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }
}
