<?php

//obtiene y devuelve todas las tareas de una base de datos



function getConection()
{
    return new PDO('mysql:host=localhost;dbname=db_tareas;charset=utf8', 'root', '');
}



function getTasks()
{

    $db = getConection();

    $query = $db->prepare('SELECT * FROM tarea');

    $query->execute();

    $arr = $query->fetchAll(PDO::FETCH_OBJ);

    return $arr;
}
;


function insertTask($title, $description, $priority)
{


    $db = getConection();
    // ID TITULO DESCRIPCION PRIORIDAD ESTADO
    $query = $db->prepare("INSERT INTO tarea (`titulo`, `descripcion`, `prioridad`) VALUES (?, ?, ?)");

    $query->execute([$title, $description, $priority]);

    return $db->lastInsertId();
}



function deleteTask($id)
{

    $db = getConection();


    $query = $db->prepare('DELETE FROM tarea WHERE id=?');

    $query->execute([$id]);


 

}


function finishTask($id) {



    $db = getConection();
    $query = $db->prepare('UPDATE `tarea` SET `estado` = 1 WHERE `tarea`.`id` = ?;');
    $query->execute([$id]);

}