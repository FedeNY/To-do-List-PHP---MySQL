<?php
include_once 'app/model/task-model.php';
include_once 'app/view/task-view.php';

class TaskController
{

    private $model;
    private $view;

    function __construct()
    {


        //Construye el model y el view para poder usarlo en showTask

        $this->model = new TaskModel();
        $this->view = new TaskView();
    }

    //Imprime Lista de tareas

    function showTask()
    {   //Obtiene las tareas del usuario
        $tasks = $this->model->getTasks();

        //Actualiza la vista
        $this->view->showTasks($tasks);
    }



    function addTask()
    {

        $titulo = $_POST['titulo'];

        $prioridad = $_POST['prioridad'];

        $descripcion = $_POST['descripcion'];


        if (empty($titulo) || empty($prioridad)) {

            $this->view->showError("Faltan datos obligatorios");

            die();

        }

        $id = $this->model->insertTask(title: $titulo, description: $descripcion, priority: $prioridad);

        header('Location: ' . BASE_URL);

    }


    function removeTask($id)
    {

        $this->model->deleteTask($id);

        header('Location: ' . BASE_URL);

    }

    function updateTask($id)
    {

        $this->model->finishTask($id);

        header('Location: ' . BASE_URL);
    }
}
