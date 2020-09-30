<?php

require 'models/asignacion.php';
require 'models/empleados.php';
require 'models/material.php';
require 'models/rol.php';

class HomeController
{
    private $model;
    private $modelEmpleado;
    private $modelMaterial;
    private $modelRol;

    public function __construct()
    {
        $this->model = new Asignacion;
        $this->modelEmpleado = new Empleado;
        $this->modelAsignacion = new Asignacion;
        $this->modelMaterial = new Material;
        $this->modelRol = new Rol;
    }

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ?controller=login');
        } else {
            $asignacioneshoy = $this->model->getById($_SESSION['user']->IdEmpleados);
            $historial = $this->model->getHistorialById($_SESSION['user']->IdEmpleados);
            $asignaciones = $this->model->getAll();
            $empleados = $this->modelEmpleado->getAll();
            $materiales = $this->modelMaterial->getAll();
            $roles = $this->modelRol->getAll();
            $numMateriales = $this->modelMaterial->count();
            $numEmpleados = $this->modelEmpleado->count();
            $numEmpleadosA = $this->modelEmpleado->countAdmin();
            require('views/layout.php');
            require('views/home.php');
        }
    }

    public function error()
    {
        require('views/layout.php');
        require('views/error.php');
    }
}
