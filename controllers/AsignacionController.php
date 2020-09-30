<?php

require 'models/empleados.php';
require 'models/material.php';
require 'models/asignacion.php';

class AsignacionController
{
    private $model;
    private $modelEmpleados;
    private $material;

    public function __construct()
    {
        $this->modelEmpleados = new Empleado;
        $this->model = new Asignacion;
        $this->material = new Material;
    }
    public function index()
    {
        require 'views/layout.php';
        $asignaciones = $this->model->getAll();
        require 'views/asignacion/list.php';
    }

    public function new()
    {
        require 'views/layout.php';
        $materiales = $this->material->getAll();
        $empleados = $this->modelEmpleados->getAllEmpleados();

        require 'views/asignacion/new.php';
    }

    public function saveAsignacion()
    {
        //$this->model->newAsignacion($_REQUEST);
        //Redirección a la vista
        //header('Location: ?controller=home#asignaciones');

        $datos = array(
            'empleados_id' => $_POST['empleados_id'],
            'material_id' => $_POST['material_id'],
            'Cantidad' => $_POST['Cantidad'],
            'Valor' => $_POST['Valor'],
            'Fecha' => $_POST['Fecha']
        );
        echo $this->model->newAsignacion($datos);
    }

    public function deleteAsignacion()
    {
        $this->model->deleteasignacion($_REQUEST);
        header('Location: ?controller=home#asignaciones');
    }
}
