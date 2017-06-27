<?php
    if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
        $newLocation = '<script>window.location.href = "http://girobticino.com/";</script>';
        echo $newLocation;
        exit;
    }
    $idCuenta = 1;
    if (isset($_GET['id'])) {
        $idCuenta = $_GET['id'];
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
    $sqlSelectFromCuentas = 'select * from contactos where id='.$idCuenta;
    $rows = $wpdb->get_results($sqlSelectFromCuentas);

?>
<html>
    <body>
        <form method="post">
            <h1 class='label'>Nombre de la cuenta</h1>
            <select name='nombreCuenta'>
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
            <input name='nombre' placeholder='Nombre' class='text_field' value="<?php if(isset($rows[0]->nombre)) {echo htmlspecialchars($rows[0]->nombre);} ?>" />
            <h1 class='label'>Apellidos</h1>
            <input name='apellidos' placeholder='Apellidos' class='text_field' value="<?php if(isset($rows[0]->apellidos)) {echo htmlspecialchars($rows[0]->apellidos);} ?>" />
            <h1 class='label'>Perfil de Contacto del Cargo</h1>
            <select name='perfilContactoCargo'>
                <?php
                    $selectPerfiles = $wpdb->get_results('select id, nombre from perfilContactoCargo');
                    $countRows = sizeof($selectPerfiles);
                    for ($i = 0; $i < $countRows; $i++) {
                        $nombre = htmlspecialchars($selectPerfiles[$i]->nombre);
                        $id = htmlspecialchars($selectPerfiles[$i]->id);
                        echo "<option value='$id'>$nombre</option>";
                    }
                ?>
            <select>
            <h1 class='label'>Telefono</h1>
            <input name='telefono' placeholder='Telefono' class='text_field' value="<?php if(isset($rows[0]->telefono)) {echo htmlspecialchars($rows[0]->telefono);} ?>" />
            <h1 class='label'>Correo</h1>
            <input name='correo' placeholder='Correo' class='text_field' type='email' value="<?php if(isset($rows[0]->correo)) {echo htmlspecialchars($rows[0]->correo);} ?>" />
            <h1 class='label'>Pais</h1>
            <select id='pais' name='pais' onchange="onChangePais()">
                <option value=''>Seleccione su pais</option>
                <?php
                    echo "<option value='$paisCuenta'>$paisCuenta</option>";
                ?>
            <select>
            <h1 class='label'>Provincia / Departamento / Distrito</h1>
            <select name='provincia' id='provincia' onchange="onChangeProvincia()">
            </select>
            <h1 class='label'>Canton</h1>
            <select name='canton' id='canton'>
            </select>
            <h1 class='label'>Zona</h1>
            <input name='zona' placeholder='Zona' class='text_field' value="<?php if(isset($rows[0]->zona)) {echo htmlspecialchars($rows[0]->zona);} ?>" />
            <h1 class='label'>Asistente</h1>
            <input name='asistente' placeholder='Asistente' class='text_field' value="<?php if(isset($rows[0]->asistente)) {echo htmlspecialchars($rows[0]->asistente);} ?>" />
            <h1 class='label'>Telefono del Asistente</h1>
            <input name='telefonoAsistente' placeholder='Telefono del Asistente' class='text_field' value="<?php if(isset($rows[0]->telefonoAsistente)) {echo htmlspecialchars($rows[0]->telefonoAsistente);} ?>" />
            <h1 class='label'>Descripcion</h1>
            <input name='descripcion' placeholder='Descripcion' class='text_field' value="<?php if(isset($rows[0]->descripcion)) {echo htmlspecialchars($rows[0]->descripcion);} ?>" />
            <!--submit button-->
            <input type ="submit" name="save" id="save" value="Editar">

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
                    <div class="section-modal-txt">La edicion del contacto fue exitosa, presione continuar.</div>
                    <div class="section-modal-bottom-close-btn"><input class="close-btn" type ="submit" name="continuar" id="continuar" value="Continuar"/></div>
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
                $sql = "UPDATE contactos SET nombreCuenta='$nombreCuenta',nombre='$nombre',apellidos='$apellidos',perfilContactoCargo='$perfilContactoCargo',telefono='$telefono',".
                "correo='$correo',pais='$pais',provincia='$provincia',canton='$canton',zona='$zona',asistente='$asistente',".
                "telefonoAsistente='$telefonoAsistente',descripcion='$descripcion' ".
                "WHERE id=$idCuenta";
                echo $sql;
                $newRow = $wpdb->query($sql);
                if($newRow) {
                    $message = "Cuenta editada correctamente.";
                    echo "<script type='text/javascript'>document.getElementsByClassName('here')[0].style.display = 'block';</script>";
                    echo "<script type='text/javascript'>document.getElementsByClassName('here')[1].style.display = 'block';</script>";
                    //echo "<script type='text/javascript'>alert('$message');</script>";
                    //echo '<script>window.location.href = "http://girobticino.com/menuprincipal/";</script>';
                    //exit;
                } else {
                    $message = "Error editando la cuenta, intentelo de nuevo.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
            if(isset($_POST['continuar'])) {
                echo '<script>window.location.href = "http://girobticino.com/menuprincipal/";</script>';
                exit;
            }
        ?>
    </body>
</html>
