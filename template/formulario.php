


<form action="<?php echo BASE_URL; ?>/add" method="POST">



    <h2>Formulario de ingreso de tareas</h2>
    <div class="formulario-cuerpo">


        <div class="titulo">
            <label for="titulo">Titulo de la tarea</label>
            <input required name="titulo" placeholder="ej: tarea 1 ..." type="text">
        </div>
        <div class="prioridad">
            <label for="prioridad">Nivel de prioridad</label>
            <select required placeholder="1" name="prioridad" value="1">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>

        </div>
        <div class="descripcion"><label for="descripcion">Descripcion de la tarea</label><textarea
                name="descripcion"></textarea></div>
    </div>



    <button type="submit">Guardar</button>




</form>