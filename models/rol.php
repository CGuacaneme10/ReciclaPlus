<?php

class Rol
{
    private $pdo;

        public function __construct()
        {
            try{
                $this->pdo = new Database;
            }catch(PDOException $e){
                die($e->getMessage());
            } 
        }

        public function getAll()
        {
            try{
                $strSql = "SELECT * FROM rol ";
                $query = $this->pdo->select($strSql);
                return $query;
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }

        
}


