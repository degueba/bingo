<?php
namespace persistence;

class Dao {

    /**
     *
     * @var \PDO
     */
    protected $con;

    protected function open(){
        try{
            $this->con = new \PDO("mysql:host=localhost;dbname=bingo", "root", "",
                    array(
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                    ));
        } catch (Exception $ex) {
            $this->con = null;
        }
    }

    protected function close(){
        $this->con = null;
    }
}
