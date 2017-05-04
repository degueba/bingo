<?php

namespace persistence;

use Model\NumeroCartela;


class NumeroCartelaDao extends Dao {

    public function inserir(NumeroCartela $c){

       $idCartela = $c->getIdCartela();
       $pos_hor = $c->getPosicaoHorizontal();
       $pos_ver = $c->getPosicaoVertical();
       $numero = $c->getNumero();
       $marcado = $c->getMarcado();

       // abrindo conexão
       $this->open();

       //prepare
       $stmt = $this->con->prepare("insert into numero_cartela values(null,?,?,?,?,?)");

       $stmt->bindParam(1, $idCartela);
       $stmt->bindParam(2, $pos_hor);
       $stmt->bindParam(3, $pos_ver);
       $stmt->bindParam(4, $numero);
       $stmt->bindParam(5, $marcado);

       if($stmt->execute()){
           return true;
       } else {
           return false;
       }

    }


    public function buscarNumero($numero){
        $this->open();

        $stmt = $this->con->prepare("select * from numero_cartela where numero = '".$numero."'");
        $stmt->execute();

        return $result = $stmt->fetchAll();
    }

    public function getAllCartela(){
       try{ $this->open();

        $stmt = $this->con->prepare("select * from numero_cartela");

        $lista = array();

        $stmt->execute();

        while($rs = $stmt->fetch(\PDO::FETCH_OBJ)){
            $cartela = new NumeroCartela();
            $cartela->setIdCartela($rs->id_cartela);
            $cartela->setPosicaoHorizontal($rs->posicao_horizontal);
            $cartela->setPosicaoVertical($rs->posicao_vertical);
            $cartela->setNumero($rs->numero);
            $cartela->setMarcado($rs->marcado);

            $lista[] = $cartela;
        }

        return $lista;

       } catch(Exception $ex){
           return null;
       }
    }


/*
     public function buscar($nome){
        try{

            $this->open();

            $stmt = $this->con->prepare("select * from numero_cartela");
            $stmt->bindParam(1, $nome);

            $lista = array();
            $stmt->execute();

            while($rs = $stmt->fetch(\PDO::FETCH_OBJ)){
                $funcionario = new Funcionario();
                $funcionario->setId($rs->id);
                $funcionario->setNome($rs->nome);
                $funcionario->setEmail($rs->email);
                $funcionario->setSalario($rs->salario);

                $lista[] = $funcionario;
            }

            //retornar um array com N funcionarios
            return $lista;

        } catch (Exception $ex) {
            return null;
        }
    }
    */

}