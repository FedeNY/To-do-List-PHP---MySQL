<?php

require_once './app/db.php';

function showTask()
{
    require 'template/header.php';

    $tasks = getTasks();



    require 'template/formulario.php'

        ?>

    <ul>

        <?php
        foreach ($tasks as $task) {
            echo '<li class="tareas-de-lista">';
            echo "<div" . ($task->estado == 1 ? " class='tachar'" : "") . ">" . $task->titulo . "</div>";
           
           
           
           echo "<div class=btn >";
           
            if ($task->estado == 0) {
                echo "<a class=btn-finalizar  href='" . BASE_URL . "/finish/{$task->id}'>Finalizar</a>";
            }

            echo "<a class=btn-borrar href='" . BASE_URL . "/delete/{$task->id}'>Borrar</a>";


            echo "</div>";




            echo '</li>';
        }
        ;
        ?>
    </ul>

    <?php require 'template/footer.php';
}

function addTask()
{

    $titulo = $_POST['titulo'];

    $prioridad = $_POST['prioridad'];

    $descripcion = $_POST['descripcion'];


    $id = insertTask(title: $titulo, description: $descripcion, priority: $prioridad);


    if ($id) {

        echo 'La informacion se ha enviado con exito!';
        header('Location: ' . BASE_URL);


    } else {
        echo 'Hubo un error al enviar los datos verifique los mismos';
    }



}

function removeTask($id)
{

    deleteTask($id);

    header('Location: ' . BASE_URL);

}

function updateTask($id)
{

    finishTask($id);



    header('Location: ' . BASE_URL);
}