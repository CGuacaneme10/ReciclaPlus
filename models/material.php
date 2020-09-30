<?php

class Material
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new Database;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $strSql = "SELECT * FROM Material ";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function count() {
        try {
            $strSql = "SELECT COUNT(Nombres) AS Materiales FROM material";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteMaterial($data)
    {
        try {
            $striWhere = 'idMaterial = ' . $data['idMaterial'];
            $this->pdo->delete('material', $striWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getById($idMaterial)
    {
        try {
            $strSql = "SELECT * FROM material WHERE idMaterial = :idMaterial";
            $array = ['idMaterial' => $idMaterial];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function editMaterial($data)
    {
        try {
            $striWhere = 'idMaterial = ' . $data['idMaterial'];
            $this->pdo->update('material', $data, $striWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function newMaterial($data)
    {
        try {
            $this->pdo->insert('material', $data);
            return 1;
        } catch (PDOException $e) {
            return 0;
        }
    }
}
