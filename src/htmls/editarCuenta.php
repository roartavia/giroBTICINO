<?php
    if ( ! is_user_logged_in() && ! is_page( 'login' ) ) {
        $newLocation = '<script>window.location.href = "http://girobticino.com/";</script>';
        echo $newLocation;
        exit;
    }
    $idCuenta = 0;
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
    $sqlSelectFromCuentas = 'select * from cuentas where id='.$idCuenta;
    $rows = $wpdb->get_results($sqlSelectFromCuentas);
?>
<html>
    <body>
        <form method="post">
            <h1 class='label'>Nombre de la cuenta</h1>
            <input name='nombre' placeholder='Nombre de la cuenta' class='text_field' value="<?php if(isset($rows[0]->nombre)) {echo htmlspecialchars($rows[0]->nombre);} ?>" />
            <h1 class='label'>Tipo</h1>
            <input name='tipo' placeholder='Tipo' class='text_field' value="<?php if(isset($rows[0]->tipo)) {echo htmlspecialchars($rows[0]->tipo);} ?>" />
            <h1 class='label'>Subtipo</h1>
            <input name='sub_tipo' placeholder='Subtipo' class='text_field' value="<?php if(isset($rows[0]->tipo)) {echo htmlspecialchars($rows[0]->subtipo);} ?>" />
            <h1 class='label'>Teléfono</h1>
            <input name='telefono' placeholder='Telefono' class='text_field' value="<?php if(isset($rows[0]->tipo)) {echo htmlspecialchars($rows[0]->telefono);} ?>" />
            <h1 class='label'>Sitio Web</h1>
            <input name='sitio_web' placeholder='Sitio Web' class='text_field' value="<?php if(isset($rows[0]->tipo)) {echo htmlspecialchars($rows[0]->sitioWeb);} ?>" />
            <h1 class='label'>País físico</h1>
            <select id='pais' name='pais' onchange="onChangePais()">
                <option value=''>Seleccione su pais</option>
                <?php
                    echo "<option value='$paisCuenta'>$paisCuenta</option>";
                ?>
            <select>
            <h1 class='label'>Provincia / Departamento físico</h1>
            <select name='provincia' id='provincia' onchange="onChangeProvincia()">
            </select>
            <h1 class='label'>Cantón / Municipio / Cabecera físico</h1>
            <select name='canton' id='canton'>
            </select>
            <h1 class='label'>Zona / Distrito físico</h1>
            <input name='zona' placeholder='Zona' class='text_field' value="<?php if(isset($rows[0]->zona)) {echo htmlspecialchars($rows[0]->zona);} ?>" />
            <h1 class='label'>Dirección física</h1>
            <input name='direccion' placeholder='Direccion' class='text_field' value="<?php if(isset($rows[0]->tipo)) {echo htmlspecialchars($rows[0]->direccion);} ?>" />

            <h1 class='label'>Lineas disponibles Bticino</h1>
            <ul class='dropdown_list'>
                <li id='selector' class='text_field'>Click para seleccionar las opciones</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_ADORNE" value="ADORNE" <?php echo (isset($rows[0]->ADORNE) && $rows[0]->ADORNE==1  ? 'checked' : '');?>/>ADORNE</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_LIVINGLIGHT" value="LIVINGLIGHT" <?php echo (isset($rows[0]->LIVINGLIGHT) && $rows[0]->LIVINGLIGHT==1  ? 'checked' : '');?>/>LIVING LIGHT</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_MATIX" value="MATIX" <?php echo (isset($rows[0]->MATIX) && $rows[0]->MATIX==1  ? 'checked' : '');?>/>MÁTIX</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_MAGIC" value="MAGIC" <?php echo (isset($rows[0]->MATIX) && $rows[0]->MATIX==1  ? 'checked' : '');?>/>MAGIC</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_MODUSSTYLE" value="MODUSSTYLE" <?php echo (isset($rows[0]->MATIX) && $rows[0]->MATIX==1  ? 'checked' : '');?>/>MODUS STYLE</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_DOMINOSENCIA" value="DOMINOSENCIA" <?php echo (isset($rows[0]->MATIX) && $rows[0]->MATIX==1  ? 'checked' : '');?>/>DOMINO SENCIA</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_DOMINOAVANT" value="DOMINOAVANT" <?php echo (isset($rows[0]->DOMINOAVANT) && $rows[0]->DOMINOAVANT==1  ? 'checked' : '');?>/>DOMINO AVANT</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_OVAL" value="OVAL" <?php echo (isset($rows[0]->OVAL) && $rows[0]->OVAL==1  ? 'checked' : '');?>/>OVAL</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_PASSSEYMOUR" value="PASSSEYMOUR" <?php echo (isset($rows[0]->PASSSEYMOUR) && $rows[0]->PASSSEYMOUR==1  ? 'checked' : '');?>/>PASS& SEYMOUR</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_IDROBOARD" value="IDROBOARD" <?php echo (isset($rows[0]->IDROBOARD) && $rows[0]->IDROBOARD==1  ? 'checked' : '');?>/>IDROBOARD</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_TAPAUNIVERSAL" value="TAPAUNIVERSAL" <?php echo (isset($rows[0]->TAPAUNIVERSAL) && $rows[0]->TAPAUNIVERSAL==1  ? 'checked' : '');?>/>TAPA UNIVERSAL</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_WIREMOLD" value="WIREMOLD" <?php echo (isset($rows[0]->WIREMOLD) && $rows[0]->WIREMOLD==1  ? 'checked' : '');?>/>WIREMOLD</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_ONQ" value="ONQ" <?php echo (isset($rows[0]->ONQ) && $rows[0]->ONQ==1  ? 'checked' : '');?>/>ON-Q</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_BTDIN" value="BTDIN" <?php echo (isset($rows[0]->BTDIN) && $rows[0]->BTDIN==1  ? 'checked' : '');?>/>BTDIN</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_TIVEN" value="TIVEN" <?php echo (isset($rows[0]->TIVEN) && $rows[0]->TIVEN==1  ? 'checked' : '');?>/>TIVEN</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_ROTOMA" value="ROTOMA" <?php echo (isset($rows[0]->ROTOMA) && $rows[0]->ROTOMA==1  ? 'checked' : '');?>/>ROTOMA</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_INTERCOMUNICADORES" value="INTERCOMUNICADORES" <?php echo (isset($rows[0]->INTERCOMUNICADORES) && $rows[0]->INTERCOMUNICADORES==1  ? 'checked' : '');?>/>INTERCOMUNICADORES</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_CALOTA" value="CALOTA" <?php echo (isset($rows[0]->CALOTACONBREAKER) && $rows[0]->CALOTACONBREAKER==1  ? 'checked' : '');?>/>CALOTA CON BREAKER</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_TIMBRES" value="TIMBRES" <?php echo (isset($rows[0]->TIMBRES) && $rows[0]->TIMBRES==1  ? 'checked' : '');?>/>TIMBRES</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_TIMBRESINALAMBRICOS" value="TIMBRESINALAMBRICOS" <?php echo (isset($rows[0]->TIMBRESINALAMBRICOS) && $rows[0]->TIMBRESINALAMBRICOS==1  ? 'checked' : '');?>/>TIMBRES INALAMBRICOS</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_INTERLINK" value="INTERLINK" <?php echo (isset($rows[0]->INTERLINK) && $rows[0]->INTERLINK==1  ? 'checked' : '');?>/>INTERLINK</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_DLPS" value="DLPS" <?php echo (isset($rows[0]->DLPS) && $rows[0]->DLPS==1  ? 'checked' : '');?>/>DLP-S</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_DLP" value="DLP" <?php echo (isset($rows[0]->DLP) && $rows[0]->DLP==1  ? 'checked' : '');?>/>DLP</li>
            </ul>

            <h1 class='label'>Descripción</h1>
            <input name='descripcion' placeholder='Descripcion' class='text_field' value="<?php if(isset($rows[0]->descripcion)) {echo htmlspecialchars($rows[0]->descripcion);} ?>" />
            <input type ="button" name="getLocation" id="getLocation" value="Traer mi ubicacion"/>
            <h1 class='label'>Localizacion (Latitud)</h1>
            <input name='latitud' id='latitud' placeholder='Latitud' class='text_field' value="<?php if(isset($rows[0]->latitud)) {echo htmlspecialchars($rows[0]->latitud);} ?>" />
            <h1 class='label'>Localizacion (Longitud)</h1>
            <input name='longitud' id='longitud' placeholder='Longitud' class='text_field' value="<?php if(isset($rows[0]->longitud)) {echo htmlspecialchars($rows[0]->longitud);} ?>" />
            <!--submit button-->
            <input type ="submit" name="save" id="save" value="Guardar">

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
                    <div class="section-modal-txt">Los datos se editaron correctamente, presione continuar.</div>
                    <div class="section-modal-bottom-close-btn"><input class="close-btn" type ="submit" name="continuar" id="continuar" value="Continuar"/></div>
                </div>
            </div>
        </form>
        <?php
            if(isset($_POST['save']))
            {
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
                $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
                $subtipo = isset($_POST['sub_tipo']) ? $_POST['sub_tipo'] : '';
                $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
                $sitioWeb = isset($_POST['sitio_web']) ? $_POST['sitio_web'] : '';
                $paisFisico = isset($_POST['pais']) ? $_POST['pais'] : '';
                $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : '';
                $canton = isset($_POST['canton']) ? $_POST['canton'] : '';
                $zona = isset($_POST['zona']) ? $_POST['zona'] : '';
                $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
                $latitud = isset($_POST['latitud']) ? $_POST['latitud'] : '';
                $longitud = isset($_POST['longitud']) ? $_POST['longitud'] : '';
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
                $ADORNE=isset($_POST['ckbx_ADORNE']) ? 1 : 0;
                $LIVINGLIGHT=isset($_POST['ckbx_LIVINGLIGHT']) ? 1 : 0;
                $MATIX=isset($_POST['ckbx_MATIX']) ? 1 : 0;
                $MAGIC=isset($_POST['ckbx_MAGIC']) ? 1 : 0;
                $MODUSSTYLE=isset($_POST['ckbx_MODUSSTYLE']) ? 1 : 0;
                $DOMINOSENCIA=isset($_POST['ckbx_DOMINOSENCIA']) ? 1 : 0;
                $DOMINOAVANT=isset($_POST['ckbx_DOMINOAVANT']) ? 1 : 0;
                $OVAL=isset($_POST['ckbx_OVAL']) ? 1 : 0;
                $PASSSEYMOUR=isset($_POST['ckbx_PASSSEYMOUR']) ? 1 : 0;
                $IDROBOARD=isset($_POST['ckbx_IDROBOARD']) ? 1 : 0;
                $TAPAUNIVERSAL=isset($_POST['ckbx_TAPAUNIVERSAL']) ? 1 : 0;
                $WIREMOLD=isset($_POST['ckbx_WIREMOLD']) ? 1 : 0;
                $ONQ=isset($_POST['ckbx_ONQ']) ? 1 : 0;
                $BTDIN=isset($_POST['ckbx_BTDIN']) ? 1 : 0;
                $TIVEN=isset($_POST['ckbx_TIVEN']) ? 1 : 0;
                $ROTOMA=isset($_POST['ckbx_ROTOMA']) ? 1 : 0;
                $INTERCOMUNICADORES=isset($_POST['ckbx_INTERCOMUNICADORES']) ? 1 : 0;
                $CALOTACONBREAKER=isset($_POST['ckbx_CALOTA']) ? 1 : 0;
                $TIMBRES=isset($_POST['ckbx_TIMBRES']) ? 1 : 0;
                $TIMBRESINALAMBRICOS=isset($_POST['ckbx_TIMBRESINALAMBRICOS']) ? 1 : 0;
                $INTERLINK=isset($_POST['ckbx_INTERLINK']) ? 1 : 0;
                $DLPS=isset($_POST['ckbx_DLPS']) ? 1 : 0;
                $DLP=isset($_POST['ckbx_DLP']) ? 1 : 0;
                $sql = "UPDATE cuentas SET nombre='$nombre',tipo='$tipo',subtipo='$subtipo',telefono='$telefono',sitioWeb='$sitioWeb',paisFisico='$paisFisico',provincia='$provincia',canton='$canton',zona='$canton',direccion='$direccion',".
                "latitud='$latitud',longitud='$longitud',descripcion='$descripcion',".
                "ADORNE=$ADORNE,LIVINGLIGHT=$LIVINGLIGHT,MATIX=$MATIX,MAGIC=$MAGIC,MODUSSTYLE=$MODUSSTYLE,DOMINOSENCIA=$DOMINOSENCIA,DOMINOAVANT=$DOMINOAVANT,OVAL=$OVAL,PASSSEYMOUR=$PASSSEYMOUR,".
                "IDROBOARD=$IDROBOARD,TAPAUNIVERSAL=$TAPAUNIVERSAL,WIREMOLD=$WIREMOLD,ONQ=$ONQ,BTDIN=$BTDIN,TIVEN=$TIVEN,ROTOMA=$ROTOMA,".
                "INTERCOMUNICADORES=$INTERCOMUNICADORES,CALOTACONBREAKER=$CALOTACONBREAKER,TIMBRES=$TIMBRES,TIMBRESINALAMBRICOS=$TIMBRESINALAMBRICOS,INTERLINK=$INTERLINK,DLPS=$DLPS,DLP=$DLP ".
                "WHERE id=$idCuenta";
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
