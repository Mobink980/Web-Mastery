<?php


class Controller
{
    //In this, controller we are going to initialize views and models
    protected $view;
    protected $model;

    public function view($viewName, $data)
    {
        $this->view = new View($viewName, $data);
        return $this->view;
    }

    public function model($modelName, $data = [])
    {
        if(file_exists(MODEL . $modelName . '.php'))
        {
            require_once MODEL . $modelName . '.php';
            //initializing the model
            $this->model = new $modelName($data);
        }
    }
}