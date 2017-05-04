<?php

namespace Model;

class NumeroCartela {

    private $id;
    private $id_cartela;
    private $posicao_horizontal;
    private $posicao_vertical;
    private $numero;
    private $marcado = 0;



    public function getIdCartela(){
        return $this->id_cartela;
    }

    public function setIdCartela($idCartela){
        $this->id_cartela = $idCartela;
    }

    public function getPosicaoHorizontal(){
        return $this->posicao_horizontal;
    }

    public function setPosicaoHorizontal($posHorizontal){
        $this->posicao_horizontal = $posHorizontal;
    }

    public function getPosicaoVertical(){
        return $this->posicao_vertical;
    }

    public function setPosicaoVertical($posVertical){
        $this->posicao_vertical = $posVertical;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getMarcado(){
        return $this->marcado;
    }

    public function setMarcado($marcado){
        $this->marcado = $marcado;
    }

}


?>