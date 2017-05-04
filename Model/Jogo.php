<?php

namespace Model;


class Jogo {
    private $id;


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

}