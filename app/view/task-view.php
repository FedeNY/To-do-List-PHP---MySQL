<?php




class TaskView
{

    public function __construct()
    {
    }

    function showTasks($tasks)
    {
        include 'template/header.php';
        include 'template/formulario.php'

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



    function showError($msg){
    
    
    echo "<h1>  ERROR </h1>";
    
    echo "<h2>  $msg </2>"; 
    
    
    
    
    
    }



}