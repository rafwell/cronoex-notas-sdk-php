<?php

namespace Rafwell\CronoexNotas\Endpoints;

use Rafwell\CronoexNotas\Client;
use Rafwell\CronoexNotas\Response;

class Empresa{
    
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function consultar():Response{
        $response = $this->client->request('/v1/empresa', 'GET');

        return $response;
    }

    public function alterar(array $array):Response{
        $response = $this->client->request('/v1/empresa', 'PATCH', $array);

        return $response;
    }

    public function alterarCertificado(array $array):Response{
        $response = $this->client->request('/v1/empresa/certificado', 'PATCH', $array);

        return $response;
    }

    public function alterarLogo(array $array):Response{
        $response = $this->client->request('/v1/empresa/logo', 'PATCH', $array);

        return $response;
    }
}