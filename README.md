# cronoex-notas-sdk-php
Cronoex Notas SDK para PHP

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
//$res = $cronoexNotas->nfse()->consultar('db255687-41c5-4611-a278-d84f9f32011c');
//$res = $cronoexNotas->nfse()->criar([]);

$res = $cronoexNotas->nfse()->cancelar('db255687-41c5-4611-a278-d84f9f32011c', []);

die(print_r($res->toArray()));
```