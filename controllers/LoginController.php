<?php

require 'models/login.php';

class LoginController
{
    private $model;

    public function __construct()
    {
        $this->model = new Login;
    }

    public function index()
    {
        if (isset($_SESSION['user']))
            header('Location: ?controller=home');
        else
            require 'views/dashboard.php';
    }

    public function getLogin()
    {
        if (isset($_SESSION['user']))
            header('Location: ?controller=home');
        else
            require 'views/login.php';
    }

    public function login()
    {
        $validateUser = $this->model->validateUser($_POST);

        if ($validateUser === true) {
            header('Location: ?controller=home');
        } else {
            $error = [
                'errorMessage' => $validateUser,
                'email' => $_POST['email']
            ];
            require 'views/login.php';
        }
    }

    public function logout()
    {
        if ($_SESSION['user']) {
            session_destroy();
            header('Location: ?controller=login');
        } else {
            header('Location: ?controller=login');
        }
    }

    public function olvidaste()
    {
        require 'views/olvidaste.php';
    }

    public function executeOlvidaste()
    {
        $validateUser = $this->model->validateonlyUser($_POST);

        if ($validateUser === true) {
            $error = [
                'errorMessage' => "Te enviamos un correo con tu contraseña, recuerda revisar en Correos No Deseados si es necesario"
            ];
            require 'views/login.php';
        } else {
            $error = [
                'errorMessage' => $validateUser,
            ];
            require 'views/olvidaste.php';
        }
    }
}
