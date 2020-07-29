<?php

namespace Rafwell\CronoexNotas;

use Rafwell\CronoexNotas\Endpoints\Empresa;

class Client{

    protected $token, $secret;
    protected $url = 'https://notas.cronoex.com.br/api';

    public function __construct($token, $secret){
        $this->token = $token;
        $this->secret = $secret;
    }

    protected function getCurl(string $uri){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "{$this->url}{$uri}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "token: $this->token",
            "secret: $this->secret",
            "Content-Type: application/json"
        ),
        ));

        return $curl;
    }

    public function empresa(){
        return new Empresa($this);
    }
}