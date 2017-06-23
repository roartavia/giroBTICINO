<?php
    if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
        $newLocation = '<script>window.location.href = "http://girobticino.com/";</script>';
        echo $newLocation;
        exit;
    }
?>
<form method="post">
    <h1 class='label'>Seleccione el contacto que desea editar</h1>
    <select name="opcionesCuentas">
        <?php
            global $wpdb;
            $rows = $wpdb->get_results('select id, nombre from contactos');
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
        $newLocation = '<script>window.location.href = "http://girobticino.com/editarcontacto/?id='.$idSelected.'";</script>';
        echo $newLocation;
    }
?>
