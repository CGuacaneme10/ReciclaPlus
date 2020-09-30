<?php

require 'models/empleados.php';
require 'models/rol.php';

class EmpleadoController
{
    private $model;
    private $modelrol;

    public function __construct()
    {
        $this->model = new Empleado;
        $this->modelrol = new Rol;
    }
    public function index()
    {
        require 'views/layout.php';
        $empleados = $this->model->getAll();
        require 'views/empleados/list.php';
    }

    public function new()
    {
        require 'views/layout.php';
        $roles = $this->modelrol->getAll();
        require 'views/empleados/new.php';
    }

    public function saveEmpleado()
    {
        $datos = array(
            'Nombres' => $_POST['Nombres'],
            'Apellidos' => $_POST['Apellidos'], 
            'Identidad' => $_POST['Identidad'],
            'Direccion' => $_POST['Direccion'],
            'Telefono' => $_POST['Telefono'],
            'username' => $_POST['username'],
            'rol_id' => $_POST['rol_id']
        );
        echo $this->model->newEmpleado($datos);
    }

    public function deleteempleado()
    {
        $this->model->deleteEmpleado($_REQUEST);
        header('Location: ?controller=home#empleados');
    }

    public function editEmpleados()
    {
        if (isset($_REQUEST['IdEmpleados'])) {
            $IdEmpleados = $_REQUEST["IdEmpleados"];
            $data = $this->model->getById($IdEmpleados);
            require 'views/layout.php';
            $roles = $this->modelrol->getAll();
            require 'views/empleados/edit.php';
        } else {
            echo "Error, No se ha especificado un id de empleado";
        }
    }

    public function update()
    {
        if (isset($_POST)) {
            $datos = array(
                'IdEmpleados' => $_POST['IdEmpleados'],
                'Nombres' => $_POST['Nombres'],
                'Apellidos' => $_POST['Apellidos'], 
                'Identidad' => $_POST['Identidad'],
                'Direccion' => $_POST['Direccion'],
                'Telefono' => $_POST['Telefono'],
                'username' => $_POST['username']
            );
           echo $this->model->editEmpleado($datos);
        } else {
            echo "Error, No se ha realizado la actualización";
        }
    }
}
