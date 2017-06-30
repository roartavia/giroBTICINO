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
            <h1 class='label'>Nombre de la cuenta</h1>
            <input name='nombre' placeholder='Nombre de la cuenta' class='text_field' value="" required/>
            <h1 class='label'>Tipo</h1>
            <input name='tipo' placeholder='Tipo' class='text_field' value="Canal" readonly/>
            <h1 class='label'>Subtipo</h1>
            <select name='sub_tipo' required>
                <option value=''>Seleccione el subtipo</option>
                <option value='Especificador e influenciador'>Especificador e influenciador</option>
                <option value='Instalador'>Instalador</option>
                <option value='Inversionista'>Inversionista</option>
                <option value='Usuario Final'>Usuario Final</option>
            </select>
            <h1 class='label'>Teléfono</h1>
            <input name='telefono' placeholder='Telefono' class='text_field' value="" required/>
            <h1 class='label'>Sitio Web</h1>
            <input name='sitio_web' placeholder='Sitio Web' class='text_field' value="" required/>
            <h1 class='label'>País físico</h1>
            <select id='pais' name='pais' onchange="onChangePais()" required>
                <option value=''>Seleccione su pais</option>
                <?php
                    echo "<option value='$paisCuenta'>$paisCuenta</option>";
                ?>
            <select>
            <h1 class='label'>Provincia / Departamento físico</h1>
            <select name='provincia' id='provincia' onchange="onChangeProvincia()" required>
            </select>
            <h1 class='label'>Cantón / Municipio / Cabecera físico</h1>
            <select name='canton' id='canton' required>
            </select>
            <h1 class='label'>Zona / Distrito físico</h1>
            <input name='zona' placeholder='Zona' class='text_field' value="" required/>
            <h1 class='label'>Dirección física</h1>
            <input name='direccion' placeholder='Direccion' class='text_field' value="" required/>
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
            <h1 class='label'>Competencia</h1>
            <ul class='dropdown_list'>
                <li id='selectorCompetencia' class='text_field'>Click para seleccionar las opciones</li>
                <li class='checkboxCompetencia hidden'><strong>ACCESORIOS ELECTRICOS</strong></li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Cooper" value="Cooper"/>Cooper</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Leviton" value="Leviton"/>Leviton</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Hubbel" value="Hubbel"/>Hubbel</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Conatel" value="Conatel"/>Conatel</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Sica" value="Sica"/>Sica</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Master" value="Master"/>Master</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_EagleCentroamerica" value="Eagle Centroamerica / Aguila"/>Eagle Centroamerica / Aguila</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Simon" value="Simon"/>Simon</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Vimar" value="Vimar"/>Vimar</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Voltech" value="Voltech"/>Voltech</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Teclastar" value="Teclastar"/>Teclastar</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_TandJ" value="T&J"/>T&J</li>
                <li class='checkboxCompetencia hidden'>Otro: <input type="text" name="OtroAcceElectrico" placeholder="Si son varios, separarlos por comas" value=""/></li>
                <li class='checkboxCompetencia hidden'><strong>INTERCOMUNICADORES</strong></li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Kocom" value="Kocom"/>Kocom</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Commax" value="Commax"/>Commax</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Aiphone" value="Aiphone"/>Aiphone</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Yale" value="Yale"/>Yale</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Swann" value="Swann"/>Swann</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Steren" value="Steren"/>Steren</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_SLSystem" value="SL System"/>SL System</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_RL" value="RL"/>RL</li>
                <li class='checkboxCompetencia hidden'>Otro: <input type="text" name="OtroIntercomunicador" placeholder="Si son varios, separarlos por comas" value=""/></li>
                <li class='checkboxCompetencia hidden'><strong>TABLEROS</strong></li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_SchneiderSquareD" value="Schneider/Square D"/>Schneider/Square D</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_EatonCutlerHammer" value="Eaton/ Cutler Hammer"/>Eaton/ Cutler Hammer</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_GeneralElectric" value="General Electric (líder GT)"/>General Electric (líder GT)</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Siemens" value="Siemens"/>Siemens</li>
                <li class='checkboxCompetencia hidden'>Otro: <input type="text" name="OtroTablero" placeholder="Si son varios, separarlos por comas" value=""/></li>
                <li class='checkboxCompetencia hidden'><strong>CANALIZACIÓN</strong></li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_EagleJS" value="Eagle / JS"/>Eagle / JS</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_DexsonSchneider" value="Dexson  Schneider"/>Dexson  Schneider</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_EagleEfapel" value="Eagle / Efapel"/>Eagle / Efapel</li>
                <li class='checkboxCompetencia hidden'>Otro: <input type="text" name="OtroCanalizacion" placeholder="Si son varios, separarlos por comas" value=""/></li>
            </ul>
            <h1 class='label'>Descripción</h1>
            <input name='descripcion' placeholder='Descripcion' class='text_field' value="" required/>
            <input type ="button" name="getLocation" id="getLocation" value="Traer mi ubicacion"/>
            <h1 class='label'>Localizacion (Latitud)</h1>
            <input name='latitud' id='latitud' placeholder='Latitud' class='text_field' value="" required/>
            <h1 class='label'>Localizacion (Longitud)</h1>
            <input name='longitud' id='longitud' placeholder='Longitud' class='text_field' value="" required/>

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
                    <div class="section-modal-bottom-close-btn"><input class="close-btn" type ="button" name="continuar" id="continuar" value="Continuar" onclick="onClickContinuar()"/></div>
                </div>
            </div>
        </form>

        <?php
            if(isset($_POST['save'])) {
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
                $Cooper=isset($_POST['ckbx_Cooper']) ? 1 : 0;
                $Leviton=isset($_POST['ckbx_Leviton']) ? 1 : 0;
                $Hubbel=isset($_POST['ckbx_Hubbel']) ? 1 : 0;
                $Conatel=isset($_POST['ckbx_Conatel']) ? 1 : 0;
                $Sica=isset($_POST['ckbx_Sica']) ? 1 : 0;
                $Master=isset($_POST['ckbx_Master']) ? 1 : 0;
                $EagleCentroamerica=isset($_POST['ckbx_EagleCentroamerica']) ? 1 : 0;
                $Simon=isset($_POST['ckbx_Simon']) ? 1 : 0;
                $Vimar=isset($_POST['ckbx_Vimar']) ? 1 : 0;
                $Voltech=isset($_POST['ckbx_Voltech']) ? 1 : 0;
                $Teclastar=isset($_POST['ckbx_Teclastar']) ? 1 : 0;
                $TandJ=isset($_POST['ckbx_TandJ']) ? 1 : 0;
                $OtroAcceElectrico=isset($_POST['OtroAcceElectrico']) ? $_POST['OtroAcceElectrico'] : ' ';
                $Kocom=isset($_POST['ckbx_Kocom']) ? 1 : 0;
                $Commax=isset($_POST['ckbx_Commax']) ? 1 : 0;
                $Aiphone=isset($_POST['ckbx_Aiphone']) ? 1 : 0;
                $Yale=isset($_POST['ckbx_Yale']) ? 1 : 0;
                $Swann=isset($_POST['ckbx_Swann']) ? 1 : 0;
                $Steren=isset($_POST['ckbx_Steren']) ? 1 : 0;
                $SLSystem=isset($_POST['ckbx_SLSystem']) ? 1 : 0;
                $RL=isset($_POST['ckbx_RL']) ? 1 : 0;
                $OtroIntercomunicador=isset($_POST['OtroIntercomunicador']) ? $_POST['OtroIntercomunicador'] : ' ';
                $SchneiderSquareD=isset($_POST['ckbx_SchneiderSquareD']) ? 1 : 0;
                $EatonCutlerHammer=isset($_POST['ckbx_EatonCutlerHammer']) ? 1 : 0;
                $GeneralElectric=isset($_POST['ckbx_GeneralElectric']) ? 1 : 0;
                $Siemens=isset($_POST['ckbx_Siemens']) ? 1 : 0;
                $OtroTablero=isset($_POST['OtroTablero']) ? $_POST['OtroTablero'] : ' ';
                $EagleJS=isset($_POST['ckbx_EagleJS']) ? 1 : 0;
                $DexsonSchneider=isset($_POST['ckbx_DexsonSchneider']) ? 1 : 0;
                $EagleEfapel=isset($_POST['ckbx_EagleEfapel']) ? 1 : 0;
                $OtroCanalizacion=isset($_POST['OtroCanalizacion']) ? $_POST['OtroCanalizacion'] : ' ';
                $sql = "INSERT INTO cuentas (nombre,tipo,subtipo,telefono,sitioWeb,paisFisico,provincia,canton,zona,direccion,latitud,longitud,descripcion,".
                "ADORNE,LIVINGLIGHT,MATIX,MAGIC,MODUSSTYLE,DOMINOSENCIA,DOMINOAVANT,OVAL,PASSSEYMOUR,IDROBOARD,TAPAUNIVERSAL,WIREMOLD,ONQ,BTDIN,TIVEN,ROTOMA,".
                "INTERCOMUNICADORES,CALOTACONBREAKER,TIMBRES,TIMBRESINALAMBRICOS,INTERLINK,DLPS,DLP,".
                "Cooper,Leviton,Hubbel,Conatel,Sica,Master,EagleCentroamerica,Simon,Vimar,Voltech,Teclastar,TandJ,OtroAcceElectrico,".
                "Kocom,Commax,Aiphone,Yale,Swann,Steren,SLSystem,RL,OtroIntercomunicador,SchneiderSquareD,EatonCutlerHammer,GeneralElectric,".
                "Siemens,OtroTablero,EagleJS,DexsonSchneider,EagleEfapel,OtroCanalizacion) ".
                "VALUES ('$nombre','$tipo','$subtipo','$telefono','$sitioWeb','$paisFisico','$provincia','$canton','$zona','$direccion','$latitud','$longitud','$descripcion',".
                "$ADORNE,$LIVINGLIGHT,$MATIX,$MAGIC,$MODUSSTYLE,$DOMINOSENCIA,$DOMINOAVANT,$OVAL,$PASSSEYMOUR,$IDROBOARD,$TAPAUNIVERSAL,$WIREMOLD,$ONQ,$BTDIN,$TIVEN,$ROTOMA,".
                "$INTERCOMUNICADORES,$CALOTACONBREAKER,$TIMBRES,$TIMBRESINALAMBRICOS,$INTERLINK,$DLPS,$DLP,".
                "'$Cooper','$Leviton','$Hubbel','$Conatel','$Sica','$Master','$EagleCentroamerica','$Simon','$Vimar','$Voltech',".
                "'$Teclastar','$TandJ','$OtroAcceElectrico','$Kocom','$Commax','$Aiphone','$Yale','$Swann',".
                "'$Steren','$SLSystem','$RL','$OtroIntercomunicador','$SchneiderSquareD','$EatonCutlerHammer','$GeneralElectric','$Siemens',".
                "'$OtroTablero','$EagleJS','$DexsonSchneider','$EagleEfapel','$OtroCanalizacion')";

                $sqlExisteNombre = "SELECT * FROM cuentas WHERE nombre='$nombre'";
                $existeRows = $wpdb->get_results($sqlExisteNombre);
                $cantidadRows = sizeof($existeRows);
                if($cantidadRows > 0) {
                    echo "<script type='text/javascript'>alert('Ese nombre de cuenta ya existe, no se pueden crear dos cuentas con el mismo nombre');</script>";
                } else {
                    $newRow = $wpdb->query($sql);
                    if($newRow) {
                        $message = "Cuenta creada correctamente.";
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

            }
        ?>
    </body>
</html>
