<?php
set_include_path(
    get_include_path() . PATH_SEPARATOR .
    __DIR__ . '/../'
);

function __autoload($classe){

    include_once $classe . '.php';
}




$nome = $_POST["jogador"];


$jogador = new Model\Jogador;
$jogador->setNome($nome);


$jogadorDao = new persistence\JogadorDao;
$cartelaDao = new persistence\CartelaDao;


if($ultimoIdCartela = $cartelaDao->gerar($jogadorDao->adicionar($jogador))){

     $numero = rand(0,60);

     $cartela = new Model\Cartela;
     $cartela->setId($ultimoIdCartela);

     $numeroCartela = new Model\NumeroCartela;
     $numeroCartela->setIdCartela($cartela->getId());

     $numCartelaDao = new persistence\NumeroCartelaDao;

     if($numCartelaDao->buscarNumero($numero) != ""){

        for($h=1; $h < 6; $h++){
            for($v=1; $v < 6; $v++){

                $numeroNovo = rand(0,60);
                $posHorizontal = $h;
                $posVertical = $v;

                $numeroCartela->setNumero($numeroNovo);
                $numeroCartela->setPosicaoHorizontal($posHorizontal);
                $numeroCartela->setPosicaoVertical($posVertical);

                $numCartelaDao->inserir($numeroCartela);


            }
        }
     }

     print_r($numCartelaDao->getAllCartela());

}











