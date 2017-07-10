<?php
    if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
        $newLocation = '<script>window.location.href = "http://puntosbticino.com/";</script>';
        echo $newLocation;
        exit;
    }
    global $wpdb;
    $paisCuenta = '';
    $current_user = wp_get_current_user();
    $lastName = $current_user->user_lastname;
    if (strpos($lastName, '-CR-') !== false) {
        $paisCuenta = 'Costa Rica';
    } else {
        $paisCuenta = 'Guatemala';
    }
?>
<html>
    <body>
        <form method="post">
            <h1 class='label'>Nombre de la cuenta</h1>
            <select name='nombreCuenta' required>
                <option value=''>Seleccione el nombre</option>
                <?php
                    $selectCuentas = $wpdb->get_results('select id, nombre from cuentas');
                    $countRows = sizeof($selectCuentas);
                    for ($i = 0; $i < $countRows; $i++) {
                        $nombre = htmlspecialchars($selectCuentas[$i]->nombre);
                        echo "<option value='$nombre'>$nombre</option>";
                    }
                ?>
            <select>
            <h1 class='label'>Nombre</h1>
            <input name='nombre' placeholder='Nombre' class='text_field' value="" required/>
            <h1 class='label'>Apellidos</h1>
            <input name='apellidos' placeholder='Apellidos' class='text_field' value="" required/>
            <h1 class='label'>Perfil de Contacto del Cargo</h1>
            <select name='perfilContactoCargo' required>
                <option value=''>Seleccione el perfil</option>
                <?php
                    $selectPerfiles = $wpdb->get_results('select id, nombre from perfilContactoCargo');
                    $countRows = sizeof($selectPerfiles);
                    for ($i = 0; $i < $countRows; $i++) {
                        $nombre = htmlspecialchars($selectPerfiles[$i]->nombre);
                        $id = htmlspecialchars($selectPerfiles[$i]->id);
                        echo "<option value='$nombre'>$nombre</option>";
                    }
                ?>
            <select>
            <h1 class='label'>Telefono</h1>
            <input name='telefono' placeholder='Telefono' class='text_field' value="" required/>
            <h1 class='label'>Correo</h1>
            <input name='correo' placeholder='Correo' class='text_field' type='email' value="" required/>
            <h1 class='label'>Pais</h1>
            <select id='pais' name='pais' onchange="onChangePais()" required>
                <option value=''>Seleccione su pais</option>
                <?php
                    echo "<option value='$paisCuenta'>$paisCuenta</option>";
                ?>
            <select>
            <h1 class='label'>Provincia / Departamento / Distrito</h1>
            <select name='provincia' id='provincia' onchange="onChangeProvincia()" required>
            <select>
            <h1 class='label'>Canton</h1>
            <select name='canton' id='canton' required>
            <select>
            <h1 class='label'>Zona</h1>
            <input name='zona' placeholder='Zona' class='text_field' value="" required/>
            <h1 class='label'>Asistente</h1>
            <input name='asistente' placeholder='Asistente' class='text_field' value="" required/>
            <h1 class='label'>Telefono del Asistente</h1>
            <input name='telefonoAsistente' placeholder='Telefono del Asistente' class='text_field' value="" required/>
            <h1 class='label'>Descripcion</h1>
            <input name='descripcion' placeholder='Descripcion' class='text_field' value="" required/>
            <!--submit button-->
            <input type ="submit" name="save" id="save" value="Crear">

            <div id="modal">
                <div class="section-black-modal-BG"></div>
                <div class="section-modal-legal-disclaimer">
                    <div class="section-modal-top-close-bg"></div>
                    <div class="section-modal-txt error">Ocurrio un error, revise los datos e intentelo de nuevo.</div>
                    <div id='close_btn' class="section-modal-bottom-close-btn"><span class="close-btn-red">Aceptar</span></div>
                </div>
            </div>

            <div id="modal_correct">
                <div class="section-black-modal-BG here <?php if($newRow){ echo show; }?>"></div>
                <div class="section-modal-legal-disclaimer here <?php if($newRow){ echo show; }?>">
                    <div class="section-modal-top-close-bg"></div>
                    <div class="section-modal-txt">La creacion del contacto fue exitosa, presione continuar.</div>
                    <div class="section-modal-bottom-close-btn"><input class="close-btn" type ="button" name="continuar" id="continuar" value="Continuar" onclick='onClickContinuar()'/></div>
                </div>
            </div>
        </form>

        <?php
            if(isset($_POST['save'])) {
                $nombreCuenta = isset($_POST['nombreCuenta']) ? $_POST['nombreCuenta'] : ' ';
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : ' ';
                $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : ' ';
                $perfilContactoCargo = isset($_POST['perfilContactoCargo']) ? $_POST['perfilContactoCargo'] : ' ';
                $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : ' ';
                $correo = isset($_POST['correo']) ? $_POST['correo'] : ' ';
                $pais = isset($_POST['pais']) ? $_POST['pais'] : ' ';
                $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : ' ';
                $canton = isset($_POST['canton']) ? $_POST['canton'] : ' ';
                $zona = isset($_POST['zona']) ? $_POST['zona'] : ' ';
                $asistente = isset($_POST['asistente']) ? $_POST['asistente'] : ' ';
                $telefonoAsistente = isset($_POST['telefonoAsistente']) ? $_POST['telefonoAsistente'] : ' ';
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : ' ';
                $sql = "INSERT INTO contactos (nombreCuenta,nombre,apellidos,perfilContactoCargo,telefono,correo,pais,provincia,canton,zona,asistente,telefonoAsistente,descripcion) ".
                "VALUES ('$nombreCuenta','$nombre','$apellidos','$perfilContactoCargo','$telefono','$correo','$pais',".
                "'$provincia','$canton','$zona','$asistente','$telefonoAsistente','$descripcion')";
                $newRow = $wpdb->query($sql);
                if($newRow) {
                    $message = "Cuenta creada correctamente.";
                    echo "<script type='text/javascript'>document.getElementsByClassName('here')[0].style.display = 'block';</script>";
                    echo "<script type='text/javascript'>document.getElementsByClassName('here')[1].style.display = 'block';</script>";
                } else {
                    $message = "Error creando la cuenta, intentelo de nuevo.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
            /*if(isset($_POST['continuar'])) {
                echo '<script>window.location.href = "http://puntosbticino.com/menuprincipal/";</script>';
                exit;
            }*/
        ?>
    </body>
</html>
