<form method="post">
    <h1 class='label'>Seleccione la cuenta que desea editar</h1>
    <select>
        <?php
            global $wpdb;
            $rows = $wpdb->get_results('select id, nombre from cuentas');
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

?>
