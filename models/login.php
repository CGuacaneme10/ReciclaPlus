<?php

require 'assets/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Login
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

    public function validateUser($data)
    {
        try {
            $strSql = "SELECT e.*, r.Nombre AS role FROM empleados AS e INNER JOIN rol as r ON e.rol_id = r.idRol  WHERE username = '{$data['email']}' AND password = '{$data['password']}'";
            $query = $this->pdo->select($strSql);

            if (isset($query[0]->IdEmpleados)) {
                $_SESSION['user'] = $query[0];
                return true;
            } else
                return 'Error al Iniciar Sesión. Verifique sus Credenciales';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function validateonlyUser($data)
    {
        try {
            $strSql = "SELECT e.*, r.Nombre AS role FROM empleados AS e INNER JOIN rol as r ON e.rol_id = r.idRol  WHERE username = '{$data['email']}'";
            $query = $this->pdo->select($strSql);

            if (isset($query[0]->IdEmpleados)) {
                $this->sendMail($query[0]->username, $query[0]->password);
                return true;
            } else
                return 'Error al recuperar su contraseña. Verifique sus Credenciales';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function sendMail($data, $pass)
    {
        try {
            $this->email->isSMTP();
            $this->email->Encoding = 'base64';
            $this->email->CharSet = 'UTF-8';
            $this->email->Host = 'smtp.gmail.com';
            $this->email->SMTPAuth = true;
            $this->email->Username = 'reciclaplus73@gmail.com';
            $this->email->Password = 'DvalenciaKgCgAg';
            $this->email->SMTPSecure = 'tls';
            $this->email->Port = 587;

            $this->email->setFrom('reciclaplus73@gmail.com', 'Equipo de ReciclaPlus');
            $this->email->addAddress($data);
            $this->email->Subject = 'Recuperación de contraseña';
            $this->email->Body = 'Hola, nos enteramos de que perdiste tu contraseña, para ReciclaPlus no es problema. Contraseña: '. $pass;
            $this->email->send();
        } catch (Exception $e) {
            echo  $this->email->ErrorInfo;
        }
    }
}
