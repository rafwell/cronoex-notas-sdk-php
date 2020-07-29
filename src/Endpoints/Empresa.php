<?php

namespace Rafwell\CronoexNotas\Endpoints;

class Empresa{
    
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function consultar(array $data){
        $curl = $this->client->getCurl('/v1/empresa', 'GET');

        $response = curl_exec($curl);

        curl_close($curl);
        dd($response);
    }
}