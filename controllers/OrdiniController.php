<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class OrdiniController
{
    function ordini(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $ordini = $negozio->getOrdini();
        if (is_null($ordini)) {
            $response->getBody()->write(json_encode(['StatusCode' => 404, 'Error' => 'Risorsa inesistente'], JSON_PRETTY_PRINT));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }

        $response->getBody()->write(json_encode($ordini, JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    function ordine(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $ordine = $negozio->getOrdine($args['numero_ordine']);
        if (is_null($ordine)) {
            $response->getBody()->write(json_encode(['StatusCode' => 404, 'Error' => 'Risorsa inesistente'], JSON_PRETTY_PRINT));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }

        $response->getBody()->write(json_encode($ordine, JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    function articoli_venduti(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $articoli_venduti = $negozio->getOrdine($args['numero_ordine']);
        if (is_null($articoli_venduti)) {
            $response->getBody()->write(json_encode(['StatusCode' => 404, 'Error' => 'Risorsa inesistente'], JSON_PRETTY_PRINT));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }

        $articoli_venduti = $articoli_venduti->getArticoli_venduti();
        if (is_null($articoli_venduti)) {
            $response->getBody()->write(json_encode(['StatusCode' => 404, 'Error' => 'Risorsa inesistente'], JSON_PRETTY_PRINT));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }

        $response->getBody()->write(json_encode($articoli_venduti, JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    function articolo_venduto(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $articolo_venduto = $negozio->getOrdine($args['numero_ordine']);
        if (is_null($articolo_venduto)) {
            $response->getBody()->write(json_encode(['StatusCode' => 404, 'Error' => 'Risorsa inesistente'], JSON_PRETTY_PRINT));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }

        $articolo_venduto = $articolo_venduto->getArticolo_venduto($args['id']);


        $response->getBody()->write(json_encode($articolo_venduto, JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    function verifica(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();

        $verifica = $negozio->verifica($args['numero_ordine']);
        if (is_null($verifica)) {
            $response->getBody()->write(json_encode(['StatusCode' => 404, 'Error' => 'Risorsa inesistente'], JSON_PRETTY_PRINT));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }

        $response->getBody()->write(json_encode($verifica, JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    function sconto(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();
        $sconto = $negozio->sconto($args['numero_ordine']);
        if (is_null($sconto)) {
            $response->getBody()->write(json_encode(['StatusCode' => 404, 'Error' => 'Risorsa inesistente'], JSON_PRETTY_PRINT));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write(json_encode($sconto, JSON_PRETTY_PRINT));
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }
}
