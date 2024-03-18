<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class NegozioController
{
    function negozio(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $response->getBody()->write(json_encode($negozio, JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }
}
