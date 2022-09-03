<?php
class Controller
{
    protected $view;
    protected $model;
    //create and return new view object
    public function view($viewName, $data)
    {
        $this->view = new View($viewName, $data);
        return $this->view;
    }
    //create and return new model object
    public function model($modelName, $data = [])
    {
        //checks if Model file exists and loads model
        if (file_exists(MODEL . $modelName . '.php')) {
            require_once MODEL . $modelName . '.php';
            $this->model = new $modelName($data);
        }
    }
}
?>
