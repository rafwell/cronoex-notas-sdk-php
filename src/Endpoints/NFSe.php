<?php

namespace Rafwell\CronoexNotas\Endpoints;

use Rafwell\CronoexNotas\Client;
use Rafwell\CronoexNotas\Response;
use Exception;

class NFSe{
    
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function listar():Response{
        $response = $this->client->request('/v1/nfses', 'GET');

        return $response;
    }

    public function consultar($nfse_id):Response{
        if(!$nfse_id){
            throw new Exception("Parametro nfse_id não pode ser nulo para consulta.");
        }
        $response = $this->client->request("/v1/nfses/$nfse_id", 'GET');

        return $response;
    }

    public function criar(array $array):Response{
        $response = $this->client->request('/v1/nfses', 'POST', $array);

        return $response;
    }

    public function cancelar($nfse_id, array $array):Response{
        $response = $this->client->request("/v1/nfses/$nfse_id/cancelar", 'PATCH', $array);

        return $response;
    }

}