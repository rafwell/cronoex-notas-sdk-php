<?php

namespace Rafwell\CronoexNotas;

use Rafwell\CronoexNotas\Endpoints\Empresa;
use Rafwell\CronoexNotas\Endpoints\NFSe;

class Client{

    protected $token, $secret;
    protected $url = 'https://notas.cronoex.com.br/api';

    public function __construct($token, $secret){
        $this->token = $token;
        $this->secret = $secret;
    }

    protected function getCurl(string $uri, $method, array $data = []){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "{$this->url}{$uri}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => array(
            "token: $this->token",
            "secret: $this->secret",
            "Content-Type: application/json"
        ),
        ));

        if($method == 'POST' || $method == 'PATCH'){
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }

        return $curl;
    }

    public function request(string $uri, $method, array $data = []):Response{
        $curl = $this->getCurl($uri, $method, $data);
        
        $curlRes = curl_exec($curl);

        $response = new Response($curlRes, $curl);

        curl_close($curl);
        
        return $response;
    }

    public function empresa(){
        return new Empresa($this);
    }

    public function nfse(){
        return new NFSe($this);
    }
}