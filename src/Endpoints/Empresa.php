<?php

namespace Rafwell\CronoexNotas\Endpoints;

class Empresa{
    
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function consultar(){
        $curl = $this->client->getCurl('/v1/empresa');

        $response = curl_exec($curl);

        curl_close($curl);
        dd($response);
    }
}