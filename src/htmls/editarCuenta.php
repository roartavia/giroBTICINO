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
    $tiposCuentas = ['Usuario Final','Canal','Instalador','Especificador e Influenciador','Inversionista','Distribuidor QAD'];
    $subtiposCuentas = ['Usuario Final','Almacen electrico detallista','Ferreteria','Constructora Civil',
    'Distribuidor BT','Diseñador Electrico','Instalador General','Arquitecto',
    'Decorador','Home center','Urbanizadora/Desarrolladora','Integrador - Otros',
    'Tecnico Electricista','Mayorista','Contratista Electrico','Instituciones Financieras o Bancos',
    'Hoteles','Institucion Pública o Gubernamental','Integrador - Home Automation',
    'Inversionista','Integrador - Redes','Hospitales','Maestro de Obra',
    'Tablerista','Fabrica','DataCenter','Ferreteria Paquete','COMODIN'];
?>
<html>
    <body>
        <form method="post">
            <h1 class='label'>Nombre de la cuenta</h1>
            <input name='nombre' placeholder='Nombre de la cuenta' class='text_field' value="<?php if(isset($rows[0]->nombre)) {echo htmlspecialchars($rows[0]->nombre);} ?>" />
            <h1 class='label'>Tipo</h1>
            <select name='tipo' required>
                <option value=''>Seleccione el tipo</option>
                <?php
                    $countRows = sizeof($tiposCuentas);
                    for ($i = 0; $i < $countRows; $i++) {
                        $isSelected = false;
                        if(isset($rows[0]->tipo)) {
                            $tipoFromDB = htmlspecialchars($rows[0]->tipo);
                            if($tiposCuentas[$i] == $tipoFromDB) {
                                echo "<option value='$tiposCuentas[$i]' selected>".$tiposCuentas[$i]."</option>";
                            } else {
                                echo "<option value='$tiposCuentas[$i]'>".$tiposCuentas[$i]."</option>";
                            }
                        } else {
                            echo "<option value='$tiposCuentas[$i]'>".$tiposCuentas[$i]."</option>";
                        }
                    }
                ?>
            </select>
            <h1 class='label'>Subtipo</h1>
            <select name='sub_tipo' required>
                <option value=''>Seleccione el tipo</option>
                <?php
                    $countRows = sizeof($subtiposCuentas);
                    for ($i = 0; $i < $countRows; $i++) {
                        $isSelected = false;
                        if(isset($rows[0]->subtipo)) {
                            $tipoFromDB = htmlspecialchars($rows[0]->subtipo);
                            if($subtiposCuentas[$i] == $tipoFromDB) {
                                echo "<option value='$subtiposCuentas[$i]' selected>".$subtiposCuentas[$i]."</option>";
                            } else {
                                echo "<option value='$subtiposCuentas[$i]'>".$subtiposCuentas[$i]."</option>";
                            }
                        } else {
                            echo "<option value='$subtiposCuentas[$i]'>".$subtiposCuentas[$i]."</option>";
                        }
                    }
                ?>
            </select>
            <h1 class='label'>Teléfono</h1>
            <input name='telefono' placeholder='Telefono' class='text_field' value="<?php if(isset($rows[0]->telefono)) {echo htmlspecialchars($rows[0]->telefono);} ?>" />
            <h1 class='label'>Sitio Web</h1>
            <input name='sitio_web' placeholder='Sitio Web' class='text_field' value="<?php if(isset($rows[0]->sitioWeb)) {echo htmlspecialchars($rows[0]->sitioWeb);} ?>" />
            <h1 class='label'>País físico</h1>
            <select id='pais' name='pais' onchange="onChangePais()">
                <option value=''>Seleccione su pais</option>
                <?php
                    echo "<option value='$paisCuenta' selected>$paisCuenta</option>";
                ?>
            <select>
            <h1 class='label'>Provincia / Departamento físico</h1>
            <select name='provincia' id='provincia' onchange="onChangeProvincia()">
                <option value="<?php if(isset($rows[0]->provincia)) {echo htmlspecialchars($rows[0]->provincia);} ?>" selected><?php if(isset($rows[0]->provincia)) {echo htmlspecialchars($rows[0]->provincia);} ?></option>
            </select>
            <h1 class='label'>Cantón / Municipio / Cabecera físico</h1>
            <select name='canton' id='canton'>
                <option value="<?php if(isset($rows[0]->canton)) {echo htmlspecialchars($rows[0]->canton);} ?>" selected><?php if(isset($rows[0]->canton)) {echo htmlspecialchars($rows[0]->canton);} ?></option>
            </select>
            <h1 class='label'>Zona / Distrito físico</h1>
            <input name='zona' placeholder='Zona' class='text_field' value="<?php if(isset($rows[0]->zona)) {echo htmlspecialchars($rows[0]->zona);} ?>" />
            <h1 class='label'>Dirección física</h1>
            <input name='direccion' placeholder='Direccion' class='text_field' value="<?php if(isset($rows[0]->direccion)) {echo htmlspecialchars($rows[0]->direccion);} ?>" />
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
            <h1 class='label'>Competencia</h1>
            <ul class='dropdown_list'>
                <li id='selectorCompetencia' class='text_field'>Click para seleccionar las opciones</li>
                <li class='checkboxCompetencia hidden'><strong>ACCESORIOS ELECTRICOS</strong></li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Cooper" value="Cooper" <?php echo (isset($rows[0]->Cooper) && $rows[0]->Cooper==1  ? 'checked' : '');?>/>Cooper</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Leviton" value="Leviton" <?php echo (isset($rows[0]->Leviton) && $rows[0]->Leviton==1  ? 'checked' : '');?>/>Leviton</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Hubbel" value="Hubbel" <?php echo (isset($rows[0]->Hubbel) && $rows[0]->Hubbel==1  ? 'checked' : '');?>/>Hubbel</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Conatel" value="Conatel" <?php echo (isset($rows[0]->Conatel) && $rows[0]->Conatel==1  ? 'checked' : '');?>/>Conatel</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Sica" value="Sica" <?php echo (isset($rows[0]->Sica) && $rows[0]->Sica==1  ? 'checked' : '');?>/>Sica</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Master" value="Master" <?php echo (isset($rows[0]->Master) && $rows[0]->Master==1  ? 'checked' : '');?>/>DOMINO SENCIA</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_EagleCentroamerica" value="Eagle Centroamerica / Aguila" <?php echo (isset($rows[0]->EagleCentroamerica) && $rows[0]->EagleCentroamerica==1  ? 'checked' : '');?>/>Eagle Centroamerica / Aguila</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Simon" value="Simon" <?php echo (isset($rows[0]->Simon) && $rows[0]->Simon==1  ? 'checked' : '');?>/>Simon</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Vimar" value="Vimar" <?php echo (isset($rows[0]->Vimar) && $rows[0]->Vimar==1  ? 'checked' : '');?>/>Vimar</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Voltech" value="Voltech" <?php echo (isset($rows[0]->Voltech) && $rows[0]->Voltech==1  ? 'checked' : '');?>/>Voltech</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Teclastar" value="Teclastar" <?php echo (isset($rows[0]->Teclastar) && $rows[0]->Teclastar==1  ? 'checked' : '');?>/>Teclastar</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_TandJ" value="T&J" <?php echo (isset($rows[0]->TandJ) && $rows[0]->TandJ==1  ? 'checked' : '');?>/>T&J</li>
                <li class='checkboxCompetencia hidden'>Otro: <input type="text" name="OtroAcceElectrico" placeholder="Si son varios, separarlos por comas" value="<?php if(isset($rows[0]->OtroAcceElectrico)) {echo htmlspecialchars($rows[0]->OtroAcceElectrico);} ?>"/></li>
                <li class='checkboxCompetencia hidden'><strong>INTERCOMUNICADORES</strong></li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Kocom" value="Kocom" <?php echo (isset($rows[0]->Kocom) && $rows[0]->Kocom==1  ? 'checked' : '');?>/>Kocom</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Commax" value="Commax" <?php echo (isset($rows[0]->Commax) && $rows[0]->Commax==1  ? 'checked' : '');?>/>Commax</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Aiphone" value="Aiphone" <?php echo (isset($rows[0]->Aiphone) && $rows[0]->Aiphone==1  ? 'checked' : '');?>/>Aiphone</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Yale" value="Yale" <?php echo (isset($rows[0]->Yale) && $rows[0]->Yale==1  ? 'checked' : '');?>/>Yale</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Swann" value="Swann" <?php echo (isset($rows[0]->Swann) && $rows[0]->Swann==1  ? 'checked' : '');?>/>Swann</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Steren" value="Steren" <?php echo (isset($rows[0]->Steren) && $rows[0]->Steren==1  ? 'checked' : '');?>/>Steren</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_SLSystem" value="SL System" <?php echo (isset($rows[0]->SLSystem) && $rows[0]->SLSystem==1  ? 'checked' : '');?>/>SL System</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_RL" value="RL" <?php echo (isset($rows[0]->RL) && $rows[0]->RL==1  ? 'checked' : '');?>/>RL</li>
                <li class='checkboxCompetencia hidden'>Otro: <input type="text" name="OtroIntercomunicador" placeholder="Si son varios, separarlos por comas" value="<?php if(isset($rows[0]->OtroIntercomunicador)) {echo htmlspecialchars($rows[0]->OtroIntercomunicador);} ?>"/></li>
                <li class='checkboxCompetencia hidden'><strong>TABLEROS</strong></li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_SchneiderSquareD" value="Schneider/Square D" <?php echo (isset($rows[0]->SchneiderSquareD) && $rows[0]->SchneiderSquareD==1  ? 'checked' : '');?>/>Schneider/Square D</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_EatonCutlerHammer" value="Eaton/ Cutler Hammer" <?php echo (isset($rows[0]->EatonCutlerHammer) && $rows[0]->EatonCutlerHammer==1  ? 'checked' : '');?>/>Eaton/ Cutler Hammer</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_GeneralElectric" value="General Electric (líder GT)" <?php echo (isset($rows[0]->GeneralElectric) && $rows[0]->GeneralElectric==1  ? 'checked' : '');?>/>General Electric (líder GT)</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_Siemens" value="Siemens" <?php echo (isset($rows[0]->Siemens) && $rows[0]->Siemens==1  ? 'checked' : '');?>/>Siemens</li>
                <li class='checkboxCompetencia hidden'>Otro: <input type="text" name="OtroTablero" placeholder="Si son varios, separarlos por comas" value="<?php if(isset($rows[0]->OtroTablero)) {echo htmlspecialchars($rows[0]->OtroTablero);} ?>"/></li>
                <li class='checkboxCompetencia hidden'><strong>CANALIZACIÓN</strong></li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_EagleJS" value="Eagle / JS" <?php echo (isset($rows[0]->EagleJS) && $rows[0]->EagleJS==1  ? 'checked' : '');?>/>Eagle / JS</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_DexsonSchneider" value="Dexson  Schneider" <?php echo (isset($rows[0]->DexsonSchneider) && $rows[0]->DexsonSchneider==1  ? 'checked' : '');?>/>Dexson  Schneider</li>
                <li class='checkboxCompetencia hidden'><input type="checkbox" name="ckbx_EagleEfapel" value="Eagle / Efapel" <?php echo (isset($rows[0]->EagleEfapel) && $rows[0]->EagleEfapel==1  ? 'checked' : '');?>/>Eagle / Efapel</li>
                <li class='checkboxCompetencia hidden'>Otro: <input type="text" name="OtroCanalizacion" placeholder="Si son varios, separarlos por comas" value="<?php if(isset($rows[0]->OtroCanalizacion)) {echo htmlspecialchars($rows[0]->OtroCanalizacion);} ?>"/></li>
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
                    <div class="section-modal-bottom-close-btn"><input class="close-btn" type ="button" name="continuar" id="continuar" value="Continuar" onclick="onClickContinuar()"/></div>
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
                $sql = "UPDATE cuentas SET nombre='$nombre',tipo='$tipo',subtipo='$subtipo',telefono='$telefono',sitioWeb='$sitioWeb',paisFisico='$paisFisico',provincia='$provincia',canton='$canton',zona='$canton',direccion='$direccion',".
                "latitud='$latitud',longitud='$longitud',descripcion='$descripcion',".
                "ADORNE=$ADORNE,LIVINGLIGHT=$LIVINGLIGHT,MATIX=$MATIX,MAGIC=$MAGIC,MODUSSTYLE=$MODUSSTYLE,DOMINOSENCIA=$DOMINOSENCIA,DOMINOAVANT=$DOMINOAVANT,OVAL=$OVAL,PASSSEYMOUR=$PASSSEYMOUR,".
                "IDROBOARD=$IDROBOARD,TAPAUNIVERSAL=$TAPAUNIVERSAL,WIREMOLD=$WIREMOLD,ONQ=$ONQ,BTDIN=$BTDIN,TIVEN=$TIVEN,ROTOMA=$ROTOMA,".
                "INTERCOMUNICADORES=$INTERCOMUNICADORES,CALOTACONBREAKER=$CALOTACONBREAKER,TIMBRES=$TIMBRES,TIMBRESINALAMBRICOS=$TIMBRESINALAMBRICOS,INTERLINK=$INTERLINK,DLPS=$DLPS,DLP=$DLP,".
                "Cooper='$Cooper',Leviton='$Leviton',Hubbel='$Hubbel',Conatel='$Conatel',Sica='$Sica',Master='$Master',EagleCentroamerica='$EagleCentroamerica',".
                "Simon='$Simon',Vimar='$Vimar',Voltech='$Voltech',Teclastar='$Teclastar',TandJ='$TandJ',OtroAcceElectrico='$OtroAcceElectrico',Kocom='$Kocom',".
                "Commax='$Commax',Aiphone='$Aiphone',Yale='$Yale',Swann='$Swann',Steren='$Steren',SLSystem='$SLSystem',RL='$RL',OtroIntercomunicador='$OtroIntercomunicador',".
                "SchneiderSquareD='$SchneiderSquareD',EatonCutlerHammer='$EatonCutlerHammer',GeneralElectric='$GeneralElectric',Siemens='$Siemens',OtroTablero='$OtroTablero',".
                "EagleJS='$EagleJS',DexsonSchneider='$DexsonSchneider',EagleEfapel='$EagleEfapel',OtroCanalizacion='$OtroCanalizacion' ".
                "WHERE id=$idCuenta";
                $newRow = $wpdb->query($sql);
                if($newRow) {
                    $message = "Cuenta editada correctamente.";
                    echo "<script type='text/javascript'>document.getElementsByClassName('here')[0].style.display = 'block';</script>";
                    echo "<script type='text/javascript'>document.getElementsByClassName('here')[1].style.display = 'block';</script>";
                } else {
                    $message = "Error editando la cuenta, intentelo de nuevo.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
        ?>
    </body>
</html>
