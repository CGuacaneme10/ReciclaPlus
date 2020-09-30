<?php

require 'models/material.php';

class MaterialController
{
    private $model;

    public function __construct()
    {
        $this->model = new Material;
    }
    public function index()
    {
        require 'views/layout.php';
        $materiales = $this->model->getAll();
        require 'views/material/list.php';
    }

    public function new()
    {
        require 'views/layout.php';
        require 'views/material/new.php';
    }

    public function saveMaterial()
    {

        $datos = array(
            'Nombres' => strtoupper($_POST['Nombres'])
        );
        echo $this->model->newMaterial($datos);
    }

    public function deleteMaterial()
    {
        $this->model->deleteMaterial($_REQUEST);
        header('Location: ?controller=home#materiales');
    }

    public function editMaterial()
    {
        if (isset($_REQUEST['idMaterial'])) {
            $idMaterial = $_REQUEST["idMaterial"];

            $data = $this->model->getById($idMaterial);
            require 'views/layout.php';
            require 'views/material/edit.php';
        } else {
            echo "Error, No se ha especificado un id de empleado";
        }
    }

    public function update()
    {
        if (isset($_POST)) {
            $this->model->editMaterial($_POST);
            header('Location: ?controller=home#materiales');
        } else {
            echo "Error, No se ha realizado la actualización";
        }
    }
}
