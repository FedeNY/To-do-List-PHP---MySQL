<?php

include_once 'app/task.php';
include_once 'app/controller/task-controller.php';


define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']));


// leemos la accion que viene por parametro
$action = 'listar'; // acción por defecto

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}


//Tabla de routeo

//listar showtask();

// add addTask()

// delete/id deleteTask


// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {

    case 'listar':
        $controller = new TaskController();
        $controller->showTask();
        break;
    case 'add':
        $controller = new TaskController();
        $controller->addTask();
        break;
    case 'delete':

        $controller = new TaskController();
        $controller->removeTask($params[1]);

        break;
    case 'finish':
        $controller = new TaskController();
        $controller->updateTask($params[1]);
        break;

    default:
        echo ('404 Page not found');
        break;
}
