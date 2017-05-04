<?php

namespace Model;

class Cartela {
    private $id;


   /**
   *
   * @var Jogador
   */
    private $id_jogador;

    /**
    *
    * @var Jogo
    */
    private $id_jogo;

    public function getId(){
        return $this->id;
    }

    public function setId($idCartela){
        $this->id = $idCartela;
    }

    public function getIdJogador(){
        return $this->id_jogador;
    }

    public function setIdJogador(Jogador $idJogador){
        $this->id_jogador = $idJogador;

        return $this;
    }

    public function getIdJogo(){
        return $this->id_jogo;
    }

    public function setIdJogo(Jogo $idJogo){
        $this->id_jogo = $idJogo;

        return $this;
    }


}