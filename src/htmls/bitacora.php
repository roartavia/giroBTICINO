<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
    if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
        $newLocation = '<script>window.location.href = "http://girobticino.com/";</script>';
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
            <input name='nombre' placeholder='Nombre de la cuenta' class='text_field' value="" />
            <h1 class='label'>Apellido</h1>
            <input name='apellido' placeholder='Apellido' class='text_field' value="" />
            <h1 class='label'>Teléfono</h1>
            <input name='telefono' placeholder='Teléfono' class='text_field' value="" />
            <h1 class='label'>Correo</h1>
            <input name='correo' placeholder='Correo' class='text_field' type='email' value="" />
            <h1 class='label'>Producto</h1>
            <input name='producto' placeholder='Producto' class='text_field' value="" />
            <h1 class='label'>Unidades</h1>
            <input name='unidades' placeholder='Unidades' class='text_field' value="" />
            <h1 class='label'>Monton</h1>
            <input name='monton' placeholder='Monto' class='text_field' value="" />
            <h1 class='label'>Premio</h1>
            <input name='premio' placeholder='Premio' class='text_field' value="" />

            <!--submit button-->
            <input type ="submit" name="save" id="save" value="Crear"/>
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
                    <div class="section-modal-txt">La creacion de la cuenta fue exitosa, presione continuar.</div>
                    <div class="section-modal-bottom-close-btn"><input class="close-btn" type ="submit" name="continuar" id="continuar" value="Continuar"/></div>
                </div>
            </div>
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
                    echo "<script type='text/javascript'>document.getElementsByClassName('here')[0].style.display = 'block';</script>";
                    echo "<script type='text/javascript'>document.getElementsByClassName('here')[1].style.display = 'block';</script>";
                    //echo "<script type='text/javascript'>alert('$message');</script>";
                    //echo '<script>window.location.href = "http://girobticino.com/menuprincipal/";</script>';
                    //exit;
                } else {
                    $message = "Error creando la cuenta, intentelo de nuevo.";
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
