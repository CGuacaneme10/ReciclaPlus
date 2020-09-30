<?php

require 'models/rol.php';

class RolController
{
    private $model;

    public function __construct()
    {
        $this->model = new Rol;
    }
    public function index()
    {
        require 'views/layout.php';
        $roles = $this->model->getAll();
        require 'views/rol/list.php';
    }

    
}
