# cronoex-notas-sdk-php
Cronoex Notas SDK para PHP

# Instalação

composer require rafwell/cronoex-notas-sdk-php

# Documentação

Os métodos e os dados que você precisa saber estão aqui: [Documentação Oficial](https://documenter.getpostman.com/view/767873/T1DsBGJD)

# Exemplos Básicos

```php
$token = 'Seu token';
$secret = 'Seu secret';
$cronoexNotas = new Client($token, $secret);

//$res = $cronoexNotas->empresa()->consultar();
//$res = $cronoexNotas->empresa()->alterar([]);
//$res = $cronoexNotas->empresa()->alterarCertificado([]);
//$res = $cronoexNotas->empresa()->alterarLogo([]);

//$res = $cronoexNotas->nfse()->listar();
//$res = $cronoexNotas->nfse()->consultar('nfse_id');
//$res = $cronoexNotas->nfse()->criar([]);

$res = $cronoexNotas->nfse()->cancelar('nfse_id', []);

die(print_r($res->toArray()));
```