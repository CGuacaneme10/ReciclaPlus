<?php

class Asignacion
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

    //obtener los datos de las asignaciones//
    public function getAll()
    {
        try {
            $strSql = "SELECT a.*, m.Nombres as Material, e.Nombres FROM Asignacion as a inner join material as m on a.material_id = m.idMaterial inner join empleados as e on a.empleados_id = e.IdEmpleados";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Obtenemos los datos de las asignaciones según el id del empleado para mostrarlos en la pág principal
    public function getById($data)
    {
        try {
            $strSql = "SELECT a.*, m.Nombres as Material, e.Nombres FROM Asignacion as a inner join material as m on a.material_id = m.idMaterial inner join empleados as e on a.empleados_id = e.IdEmpleados where a.empleados_id = $data and a.Fecha = curdate()";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getHistorialById($data)
    {
        try {
            $strSql = "SELECT a.*, m.Nombres as Material, e.Nombres FROM Asignacion as a inner join material as m on a.material_id = m.idMaterial inner join empleados as e on a.empleados_id = e.IdEmpleados where a.empleados_id = $data";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function newAsignacion($data)
    {
        try {
            $this->pdo->insert('asignacion', $data);
            return 1;
        } catch (PDOException $e) {
            
            return 2;
            //header('Location: ?controller=home&method=error');
        }
    }

    public function deleteasignacion($data)
    {
        try {
            $striWhere = 'Id = ' . $data['Id'];
            $this->pdo->delete('asignacion', $striWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
