<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class ArticoliController
{
    function articoli(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $response->getBody()->write(json_encode($negozio->getArticoli(), JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type','application/json');
    }

    function articolo(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $response->getBody()->write(json_encode($negozio->getArticolo($args['id']), JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type','application/json');
    }
}