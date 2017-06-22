<?php
    if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
        $newLocation = '<script>window.location.href = "http://girobticino.com/";</script>';
        echo $newLocation;
        exit;
    }
?>
<form method="post">
    <h1 class='label'>Editar cuenta existente</h1>
    <input type ="submit" name="edit" id="edit" value="Editar">
    <h1 class='label margin_top'>Crear nueva cuenta</h1>
    <input type ="submit" name="create" id="create" value="Crear">
</form>
<?php
    if(isset($_POST['edit'])) {
        echo '<script>window.location.href = "http://girobticino.com/seleccionarcuenta/";</script>';
    }
    if(isset($_POST['create'])) {
        echo '<script>window.location.href = "http://girobticino.com/crearcuenta/";</script>';
    }
?>
