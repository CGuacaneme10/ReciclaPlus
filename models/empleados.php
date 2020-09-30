<?php

require 'assets/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Empleado
{

    private $pdo;
    private $email;

    public function __construct()
    {
        try {
            $this->pdo = new Database;
            $this->email = new PHPMailer(true);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //obtener los datos de los empleados//
    public function getAll()
    {
        try {
            $strSql = "SELECT * FROM empleados INNER JOIN rol on empleados.rol_id = rol.idRol";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function count()
    {
        try {
            $strSql = "SELECT COUNT(Nombres) AS Empleados FROM empleados WHERE rol_id = 1";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function countAdmin()
    {
        try {
            $strSql = "SELECT COUNT(Nombres) AS Empleados FROM empleados WHERE rol_id = 2";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllEmpleados()
    {
        try {
            $strSql = "SELECT * FROM empleados INNER JOIN rol on empleados.rol_id = rol.idRol where rol_id = 1";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteEmpleado($data)
    {
        try {
            $striWhere = 'IdEmpleados = ' . $data['IdEmpleados'];
            $this->pdo->delete('empleados', $striWhere);
            return 1;
        } catch (PDOException $e) {
            return 2;
        }
    }

    public function getById($IdEmpleados)
    {
        try {
            $strSql = "SELECT * FROM empleados WHERE IdEmpleados = :IdEmpleados";
            $array = ['IdEmpleados' => $IdEmpleados];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function editEmpleado($data)
    {
        try {
            $striWhere = 'IdEmpleados = ' . $data['IdEmpleados'];
            $this->pdo->update('empleados', $data, $striWhere);
            return 1;
        } catch (PDOException $e) {
            return 2;
        }
    }

    public function newempleado($data)
    {
        $data['password'] = $this->generatePassword();
        try {
            $this->pdo->insert('empleados', $data);
            $this->sendMail($data);
            return 1;
        } catch (PDOException $e) {
            return 2;
        }
    }

    function generatePassword()
    {
        $length = 20;
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789222223131';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }

    function sendMail($data)
    {
        try {
            $this->email->isSMTP();
            $this->email->Host = 'smtp.gmail.com';
            $this->email->SMTPAuth = true;
            $this->email->Username = 'reciclaplus73@gmail.com';
            $this->email->Password = 'DvalenciaKgCgAg';
            $this->email->SMTPSecure = 'tls';
            $this->email->Port = 587;

            $this->email->setFrom('reciclaplus73@gmail.com', $_SESSION['user']->Nombres);
            $this->email->addAddress($data['username']);
            $this->email->Subject = 'Registro Completado en Reciclaplus';
            $this->email->Body = 'Hemos completado el registro en Reciclaplus, tu usuario es: ' . $data['username'] . ' y tú password es: ' . $data['password'];
            $this->email->send();
        } catch (Exception $e) {
            echo  $this->email->ErrorInfo;
        }
    }
}
