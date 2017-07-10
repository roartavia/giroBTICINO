/**
* Converting data to CSV
*/
<?php
function getCsvFromCuentas() {
    global $wpdb;
    $rows = $wpdb->get_results("select * from cuentas order by nombre");
    $countRows = sizeof($rows);
    $stringCSV = ""
    for ($i = 0; $i < $countRows; $i++) {
        $nombre = htmlspecialchars($rows[$i]->nombre);
        $tipo = htmlspecialchars($rows[$i]->tipo);
        $subtipo = htmlspecialchars($rows[$i]->subtipo);
        $telefono = htmlspecialchars($rows[$i]->telefono);
        $sitioWeb = htmlspecialchars($rows[$i]->sitioWeb);
        $paisFisico = htmlspecialchars($rows[$i]->paisFisico);
        $provincia = htmlspecialchars($rows[$i]->provincia);
        $canton = htmlspecialchars($rows[$i]->canton);
        $direccion = htmlspecialchars($rows[$i]->direccion);
        $latitud = htmlspecialchars($rows[$i]->latitud);
        $longitud = htmlspecialchars($rows[$i]->longitud);
        $descripcion = htmlspecialchars($rows[$i]->descripcion);
        $zona = htmlspecialchars($rows[$i]->zona);
        $ADORNE = htmlspecialchars($rows[$i]->ADORNE);
        $LIVINGLIGHT = htmlspecialchars($rows[$i]->LIVINGLIGHT);
        $MATIX = htmlspecialchars($rows[$i]->MATIX);
        $MAGIC = htmlspecialchars($rows[$i]->MAGIC);
        $MODUSSTYLE = htmlspecialchars($rows[$i]->MODUSSTYLE);
        $DOMINOSENCIA = htmlspecialchars($rows[$i]->DOMINOSENCIA);
        $DOMINOAVANT = htmlspecialchars($rows[$i]->DOMINOAVANT);
        $OVAL = htmlspecialchars($rows[$i]->OVAL);
        $PASSSEYMOUR = htmlspecialchars($rows[$i]->PASSSEYMOUR);
        $IDROBOARD = htmlspecialchars($rows[$i]->IDROBOARD);
        $TAPAUNIVERSAL = htmlspecialchars($rows[$i]->TAPAUNIVERSAL);
        $WIREMOLD = htmlspecialchars($rows[$i]->WIREMOLD);
        $ONQ = htmlspecialchars($rows[$i]->ONQ);
        $BTDIN = htmlspecialchars($rows[$i]->BTDIN);
        $TIVEN = htmlspecialchars($rows[$i]->TIVEN);
        $ROTOMA = htmlspecialchars($rows[$i]->ROTOMA);
        $INTERCOMUNICADORES = htmlspecialchars($rows[$i]->INTERCOMUNICADORES);
        $CALOTACONBREAKER = htmlspecialchars($rows[$i]->CALOTACONBREAKER);
        $TIMBRES = htmlspecialchars($rows[$i]->TIMBRES);
        $TIMBRESINALAMBRICOS = htmlspecialchars($rows[$i]->TIMBRESINALAMBRICOS);
        $INTERLINK = htmlspecialchars($rows[$i]->INTERLINK);
        $DLPS = htmlspecialchars($rows[$i]->DLPS);
        $DLP = htmlspecialchars($rows[$i]->DLP);
        $Cooper = htmlspecialchars($rows[$i]->Cooper);
        $Leviton = htmlspecialchars($rows[$i]->Leviton);
        $Hubbel = htmlspecialchars($rows[$i]->Hubbel);
        $Conatel = htmlspecialchars($rows[$i]->Conatel);
        $Sica = htmlspecialchars($rows[$i]->Sica);
        $Master = htmlspecialchars($rows[$i]->Master);
        $EagleCentroamerica = htmlspecialchars($rows[$i]->EagleCentroamerica);
        $Simon = htmlspecialchars($rows[$i]->Simon);
        $Vimar = htmlspecialchars($rows[$i]->Vimar);
        $Voltech = htmlspecialchars($rows[$i]->Voltech);
        $Teclastar = htmlspecialchars($rows[$i]->Teclastar);
        $TandJ = htmlspecialchars($rows[$i]->TandJ);
        $OtroAcceElectrico = htmlspecialchars($rows[$i]->OtroAcceElectrico);
        $Kocom = htmlspecialchars($rows[$i]->Kocom);
        $Commax = htmlspecialchars($rows[$i]->Commax);
        $Aiphone = htmlspecialchars($rows[$i]->Aiphone);
        $Yale = htmlspecialchars($rows[$i]->Yale);
        $Swann = htmlspecialchars($rows[$i]->Swann);
        $Steren = htmlspecialchars($rows[$i]->Steren);
        $SLSystem = htmlspecialchars($rows[$i]->SLSystem);
        $RL = htmlspecialchars($rows[$i]->RL);
        $OtroIntercomunicador = htmlspecialchars($rows[$i]->OtroIntercomunicador);
        $SchneiderSquareD = htmlspecialchars($rows[$i]->SchneiderSquareD);
        $EatonCutlerHammer = htmlspecialchars($rows[$i]->EatonCutlerHammer);
        $GeneralElectric = htmlspecialchars($rows[$i]->GeneralElectric);
        $Siemens = htmlspecialchars($rows[$i]->Siemens);
        $OtroTablero = htmlspecialchars($rows[$i]->OtroTablero);
        $EagleJS = htmlspecialchars($rows[$i]->EagleJS);
        $DexsonSchneider = htmlspecialchars($rows[$i]->DexsonSchneider);
        $EagleEfapel = htmlspecialchars($rows[$i]->EagleEfapel);
        $OtroCanalizacion = htmlspecialchars($rows[$i]->OtroCanalizacion);

        $stringCSV .= "\n"."$nombre\t$tipo\t$subtipo\t$telefono\t$sitioWeb\t$paisFisico\t$provincia\t$canton\t".
            "$direccion\t$latitud\t$longitud\t$descripcion\t$zona\t$ADORNE\t$LIVINGLIGHT\t".
            "$MATIX\t$MAGIC\t$MODUSSTYLE\t$DOMINOSENCIA\t$DOMINOAVANT\t$OVAL\t$PASSSEYMOUR\t".
            "$IDROBOARD\t$TAPAUNIVERSAL\t$WIREMOLD\t$ONQ\t$BTDIN\t$TIVEN\t$ROTOMA\t".
            "$INTERCOMUNICADORES\t$CALOTACONBREAKER\t$TIMBRES\t$TIMBRESINALAMBRICOS\t".
            "$INTERLINK\t$DLPS\t$DLP\t$Cooper\t$Leviton\t$Hubbel\t$Conatel\t$Sica\t$Master\t".
            "$EagleCentroamerica\t$Simon\t$Vimar\t$Voltech\t$Teclastar\t$TandJ\t$OtroAcceElectrico\t".
            "$Kocom\t$Commax\t$Aiphone\t$Yale\t$Swann\t$Steren\t$SLSystem\t$RL\t$OtroIntercomunicador\t".
            "$SchneiderSquareD\t$EatonCutlerHammer\t$GeneralElectric\t$Siemens\t$OtroTablero\t".
            "$EagleJS\t$DexsonSchneider\t$EagleEfapel\t$OtroCanalizacion";
    }
    echo $stringCSV;
}
?>
