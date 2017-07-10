<?php
    if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
        $newLocation = '<script>window.location.href = "http://puntosbticino.com/";</script>';
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
?>
<form method="post">
    <h1 class='label'>Seleccione el contacto que desea editar</h1>
    <select name="opcionesCuentas">
        <?php
            global $wpdb;
            $rows = $wpdb->get_results("select id, nombre, apellidos from contactos where pais='$paisCuenta' order by nombre");
            $countRows = sizeof($rows);

            for ($i = 0; $i < $countRows; $i++) {
                if(isset($rows[$i]->nombre)) {
                    if(isset($rows[$i]->apellidos)) {
                        $nombre = htmlspecialchars($rows[$i]->nombre);
                        $apellidos = htmlspecialchars($rows[$i]->apellidos);
                        $nombre = $nombre." ".$apellidos;
                        $id = htmlspecialchars($rows[$i]->id);
                        echo "<option value='$id'>$nombre</option>";
                    } else {
                        $nombre = htmlspecialchars($rows[$i]->nombre);
                        $id = htmlspecialchars($rows[$i]->id);
                        echo "<option value='$id'>$nombre</option>";
                    }
                } else {
                    if(isset($rows[$i]->apellidos)) {
                        $apellidos = htmlspecialchars($rows[$i]->apellidos);
                        $id = htmlspecialchars($rows[$i]->id);
                        echo "<option value='$id'>$apellidos</option>";
                    } else {
                        $id = htmlspecialchars($rows[$i]->id);
                        echo "<option value='$id'>Sin nombre</option>";
                    }
                }
            }
        ?>
    </select>
    <input type ="submit" name="edit" id="edit" value="Editar">
</form>
<?php
    if(isset($_POST['edit']))
    {
        $idSelected =  $_POST['opcionesCuentas'];
        $newLocation = '<script>window.location.href = "http://puntosbticino.com/editarcontacto/?id='.$idSelected.'";</script>';
        echo $newLocation;
    }
?>
