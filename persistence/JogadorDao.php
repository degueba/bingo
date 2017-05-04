<?php

namespace persistence;

use Model\Jogador;


class JogadorDao extends Dao {

    public function adicionar(Jogador $j){
        try {
            $nome = $j->getNome();

            // Abrir conexão
            $this->open();


             //Preparar o inser
            $stmt = $this->con->prepare("insert into jogador values(null,?)");
            //passar os dados pro insert
            $stmt->bindParam(1, $nome);

            if($stmt->execute()){
                $ultimoId = $this->con->lastInsertId();
                return $ultimoId;
            }

        } catch(Exception $ex){

            return false;

        }
    }

}