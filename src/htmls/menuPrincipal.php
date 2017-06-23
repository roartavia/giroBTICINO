<?php
    if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
        $newLocation = '<script>window.location.href = "http://girobticino.com/";</script>';
        echo $newLocation;
        exit;
    }
    $paisCuenta = '';
    $current_user = wp_get_current_user();
    $lastName = $current_user->user_lastname;
    if (strpos($lastName, '-CR-') !== false) {
        $paisCuenta = 'Costa Rica';
    } else {
        $paisCuenta = 'Guatemala';
    }
    echo "Su cuenta pertenece a ".$paisCuenta."<br>";
?>
<form method="post">
    <div class="rowDiv">
        <div class="columnDiv">
            <h1 class='label_title'>Cuentas</h1>
            <h1 class='label'>Editar cuenta existente</h1>
            <input type ="submit" name="editarCuenta" id="editarCuenta" value="Editar">
            <h1 class='label margin_top'>Crear nueva cuenta</h1>
            <input type ="submit" name="createCuenta" id="createCuenta" value="Crear">
        </div>
        <div class="columnDiv">
            <h1 class='label_title'>Contactos</h1>
            <h1 class='label'>Editar contacto existente</h1>
            <input type ="submit" name="editarContacto" id="editarContacto" value="Editar">
            <h1 class='label margin_top'>Crear nuevo contacto</h1>
            <input type ="submit" name="createContacto" id="createContacto" value="Crear">
        </div>
        <div class="columnDiv">
            <h1 class='label_title'>Bitacora</h1>
            <h1 class='label'>Crear bitacora</h1>
            <input type ="submit" name="crearBitacora" id="crearBitacora" value="Crear">
        </div>
    </div>
</form>
<?php
    if(isset($_POST['editarCuenta'])) {
        echo '<script>window.location.href = "http://girobticino.com/seleccionarcuenta/";</script>';
    }
    if(isset($_POST['createCuenta'])) {
        echo '<script>window.location.href = "http://girobticino.com/crearcuenta/";</script>';
    }
    if(isset($_POST['editarContacto'])) {
        echo '<script>window.location.href = "http://girobticino.com/seleccionarcontacto/";</script>';
    }
    if(isset($_POST['createContacto'])) {
        echo '<script>window.location.href = "http://girobticino.com/crearcontacto/";</script>';
    }
    if(isset($_POST['createBitacora'])) {
        echo '<script>window.location.href = "http://girobticino.com/crearbitacora/";</script>';
    }

?>
