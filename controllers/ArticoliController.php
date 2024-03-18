<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class ArticoliController
{
    function articoli(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $response->getBody()->write(json_encode($negozio->getArticoli(), JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    function articolo(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $articolo = $negozio->getArticolo($args['id']);
        if (is_null($articolo)) {
            $response->getBody()->write(json_encode(['StatusCode' => 404, 'Error' => 'Risorsa inesistente'], JSON_PRETTY_PRINT));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }

        $response->getBody()->write(json_encode($articolo, JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }
}
