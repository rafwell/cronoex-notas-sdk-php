<?php

namespace Rafwell\CronoexNotas;

use Rafwell\CronoexNotas\Endpoints\Empresa;

class Response{

    protected $body, $curl, $info;
    protected $hasError;
    protected $error;

    public function __construct($body, $curl){
        $this->body = $body;
        $this->curl = $curl;
        $this->info = curl_getinfo($this->curl);

        if($this->info['http_code'] !== 200){
            $this->hasError = true;
            $this->setError();
        }else{
            $this->hasError = false;
        }
    }

    protected function setError(){
        $error = '';

        switch($this->info['http_code']){
            case 401:
                $error = 'Não autorizado. Confira o token e o secret.';
            break;
            case 404:
                $error = 'Endpoint não encontrado.';
            break;
            case 422:
                $error = 'Informações inválidas. Confira os dados enviados.';
            break;
            case 429:
                $error = 'Limite de requisições alcançado. Você fez muitas requisições ao servidor.';
            break;
            case 500:
                $error = 'Erro interno no servidor.';
            break;
            default:
                $error = 'Erro não mapeado. O servidor retornou um status code '.$this->info['http_code'];
            break;
        }

        $this->error = $error;
        
        return $this;
    }

    public function toArray(){
        $array = [];
        $data =  json_decode($this->body, true);
        $array['success'] = !$this->hasError;
        $array['error'] = $this->error;
        $array['data'] = $data ? $data : [];
        return $array;
    }
}