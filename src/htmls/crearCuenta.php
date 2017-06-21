<?php
    global $wpdb;
?>
<html>
    <body>
        <form method="post">
            <h1 class='label'>Nombre de la cuenta</h1>
            <input name='nombre' placeholder='Nombre de la cuenta' class='text_field' value="" />
            <h1 class='label'>Tipo</h1>
            <input name='tipo' placeholder='Tipo' class='text_field' value="" />
            <h1 class='label'>Subtipo</h1>
            <input name='sub_tipo' placeholder='Subtipo' class='text_field' value="" />
            <h1 class='label'>Teléfono</h1>
            <input name='telefono' placeholder='Telefono' class='text_field' value="" />
            <h1 class='label'>Sitio Web</h1>
            <input name='sitio_web' placeholder='Sitio Web' class='text_field' value="" />
            <h1 class='label'>País físico</h1>
            <input name='pais' placeholder='Pais' class='text_field' value="" />
            <h1 class='label'>Provincia / Departamento físico</h1>
            <input name='provincia' placeholder='Provincia' class='text_field' value="" />
            <h1 class='label'>Cantón / Muncicipio / Cabecera físico</h1>
            <input name='canton' placeholder='Canton' class='text_field' value="" />
            <h1 class='label'>Zona / Distrito físico</h1>
            <input name='zona' placeholder='Zona' class='text_field' value="" />
            <h1 class='label'>Dirección física</h1>
            <input name='direccion' placeholder='Direccion' class='text_field' value="" />

            <h1 class='label'>Lineas disponibles Bticino</h1>
            <ul class='dropdown_list'>
                <li id='selector' class='text_field'>Click para seleccionar las opciones</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_ADORNE" value="ADORNE"/>ADORNE</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_LIVINGLIGHT" value="LIVINGLIGHT"/>LIVING LIGHT</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_MATIX" value="MATIX"/>MÁTIX</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_MAGIC" value="MAGIC"/>MAGIC</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_MODUSSTYLE" value="MODUSSTYLE"/>MODUS STYLE</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_DOMINOSENCIA" value="DOMINOSENCIA"/>DOMINO SENCIA</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_DOMINOAVANT" value="DOMINOAVANT"/>DOMINO AVANT</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_OVAL" value="OVAL"/>OVAL</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_PASSSEYMOUR" value="PASSSEYMOUR"/>PASS& SEYMOUR</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_IDROBOARD" value="IDROBOARD"/>IDROBOARD</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_TAPAUNIVERSAL" value="TAPAUNIVERSAL"/>TAPA UNIVERSAL</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_WIREMOLD" value="WIREMOLD"/>WIREMOLD</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_ONQ" value="ONQ"/>ON-Q</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_BTDIN" value="BTDIN"/>BTDIN</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_TIVEN" value="TIVEN"/>TIVEN</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_ROTOMA" value="ROTOMA"/>ROTOMA</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_INTERCOMUNICADORES" value="INTERCOMUNICADORES"/>INTERCOMUNICADORES</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_CALOTA" value="CALOTA"/>CALOTA CON BREAKER</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_TIMBRES" value="TIMBRES"/>TIMBRES</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_TIMBRESINALAMBRICOS" value="TIMBRESINALAMBRICOS"/>TIMBRES INALAMBRICOS</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_INTERLINK" value="INTERLINK"/>INTERLINK</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_DLPS" value="DLPS"/>DLP-S</li>
                <li class='checkbox hidden'><input type="checkbox" name="ckbx_DLP" value="DLP"/>DLP</li>
            </ul>

            <h1 class='label'>Descripción</h1>
            <input name='descripcion' placeholder='Descripcion' class='text_field' value="" />
            <h1 class='label'>Localizacion (Latitud)</h1>
            <input name='latitud' placeholder='Latitud' class='text_field' value="" />
            <h1 class='label'>Localizacion (Longitud)</h1>
            <input name='longitud' placeholder='Longitud' class='text_field' value="" />
            <!--submit button-->
            <input type ="submit" name="save" id="save" value="Crear">
        </form>
        <?php
        if(isset($_POST['save']))
        {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : ' ';
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : ' ';
            $subtipo = isset($_POST['sub_tipo']) ? $_POST['sub_tipo'] : ' ';
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : ' ';
            $sitioWeb = isset($_POST['sitio_web']) ? $_POST['sitio_web'] : ' ';
            $paisFisico = isset($_POST['pais']) ? $_POST['pais'] : ' ';
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : ' ';
            $canton = isset($_POST['canton']) ? $_POST['canton'] : ' ';
            $zona = isset($_POST['zona']) ? $_POST['zona'] : ' ';
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : ' ';
            $latitud = isset($_POST['latitud']) ? $_POST['latitud'] : ' ';
            $longitud = isset($_POST['longitud']) ? $_POST['longitud'] : ' ';
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : ' ';
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
            $sql = "INSERT INTO cuentas (nombre,tipo,subtipo,telefono,sitioWeb,paisFisico,provincia,canton,zona,direccion,latitud,longitud,descripcion,".
            "ADORNE,LIVINGLIGHT,MATIX,MAGIC,MODUSSTYLE,DOMINOSENCIA,DOMINOAVANT,OVAL,PASSSEYMOUR,IDROBOARD,TAPAUNIVERSAL,WIREMOLD,ONQ,BTDIN,TIVEN,ROTOMA,".
            "INTERCOMUNICADORES,CALOTACONBREAKER,TIMBRES,TIMBRESINALAMBRICOS,INTERLINK,DLPS,DLP) ".
            "VALUES ('$nombre','$tipo','$subtipo','$telefono','$sitioWeb','$paisFisico','$provincia','$canton','$zona','$direccion','$latitud','$longitud','$descripcion',".
            "$ADORNE,$LIVINGLIGHT,$MATIX,$MAGIC,$MODUSSTYLE,$DOMINOSENCIA,$DOMINOAVANT,$OVAL,$PASSSEYMOUR,$IDROBOARD,$TAPAUNIVERSAL,$WIREMOLD,$ONQ,$BTDIN,$TIVEN,$ROTOMA,".
            "$INTERCOMUNICADORES,$CALOTACONBREAKER,$TIMBRES,$TIMBRESINALAMBRICOS,$INTERLINK,$DLPS,$DLP)";
            $newRow = $wpdb->get_results($sql);
        }
        ?>
    </body>
</html>
