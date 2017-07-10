<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            <h1 class='label'>Nombre</h1>
            <input name='nombre' placeholder='Nombre de la cuenta' class='text_field' value="" required/>
            <h1 class='label'>Apellido</h1>
            <input name='apellido' placeholder='Apellido' class='text_field' value="" required/>
            <h1 class='label'>Teléfono</h1>
            <input name='telefono' placeholder='Teléfono' class='text_field' value="" />
            <h1 class='label'>Correo</h1>
            <input name='correo' placeholder='Correo' class='text_field' type='email' value="" />
            <h1 class='label'>Producto</h1>
            <input name='producto' placeholder='Producto' class='text_field' value="" required/>
            <h1 class='label'>Unidades</h1>
            <input name='unidades' placeholder='Unidades' class='text_field' value="" required/>
            <h1 class='label'>Monto</h1>
            <input name='monto' placeholder='Monto' class='text_field' value="" required/>
            <h1 class='label'>Premio</h1>
            <input name='premio' placeholder='Premio' class='text_field' value="" required/>

            <!--submit button-->
            <input type ="submit" name="save" id="save" value="Crear"/>
        </form>

        <?php
            if(isset($_POST['save'])) {
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : ' ';
                $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : ' ';
                $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : ' ';
                $correo = isset($_POST['correo']) ? $_POST['correo'] : ' ';
                $producto = isset($_POST['producto']) ? $_POST['producto'] : ' ';
                $unidades = isset($_POST['unidades']) ? $_POST['unidades'] : ' ';
                $monto = isset($_POST['monto']) ? $_POST['monto'] : ' ';
                $premio = isset($_POST['premio']) ? $_POST['premio'] : ' ';

                $sql = "INSERT INTO bitacoras (nombre,apellido,telefono,correo,producto,unidades,monto,premio) ".
                "VALUES ('$nombre','$apellido','$telefono','$correo','$producto','$unidades','$monto','$premio')";
                $newRow = $wpdb->query($sql);
                if($newRow) {
                    $message = "Bitacora insertada correctamente.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                } else {
                    $message = "Error creando la cuenta, intentelo de nuevo.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
        ?>
    </body>
</html>
