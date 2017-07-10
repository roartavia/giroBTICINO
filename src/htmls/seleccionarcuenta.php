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
    <h1 class='label'>Seleccione la cuenta que desea editar</h1>
    <select name="opcionesCuentas">
        <?php
            global $wpdb;
            $rows = $wpdb->get_results("select id, nombre from cuentas where paisFisico='$paisCuenta' order by nombre");
            $countRows = sizeof($rows);

            for ($i = 0; $i < $countRows; $i++) {
                $nombre = htmlspecialchars($rows[$i]->nombre);
                $id = htmlspecialchars($rows[$i]->id);
                echo "<option value='$id'>$nombre</option>";
            }
        ?>
    </select>
    <input type ="submit" name="edit" id="edit" value="Editar">
</form>
<?php
    if(isset($_POST['edit']))
    {
        $idSelected =  $_POST['opcionesCuentas'];
        $newLocation = '<script>window.location.href = "http://puntosbticino.com/editarcuenta/?id='.$idSelected.'";</script>';
        echo $newLocation;
    }
?>
