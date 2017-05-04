<?php

namespace persistence;

use Model\Cartela;


class CartelaDao extends Dao {

    public function gerar($idJogador){
        try {
            $id_jogo = 1;
            $id_jogador = $idJogador;

            // Abrir conexão
            $this->open();


             //Preparar o inser
            $stmt = $this->con->prepare("insert into cartela values(null,?,?)");
            //passar os dados pro insert
            $stmt->bindParam(1, $id_jogo);
            $stmt->bindParam(2, $id_jogador);

            if($stmt->execute()){
                $ultimoIdCartela = $this->con->lastInsertId();
                return $ultimoIdCartela;
            }

        } catch(Exception $ex){

            return false;

        }
    }


}