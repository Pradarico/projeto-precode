<?php

include_once("config_banco.php");

$ped_idpedparc = intval($_POST['ped_idpedparc']);
$pro_codsku = intval($_POST['codprod']);
$prodped_valunit = floatval($_POST['valorunitario']);
$prodped_quant = intval($_POST['quantidade']);


$sql = 'INSERT INTO prodped(
    ped_idpedparc,
    pro_codsku,
    prodped_valunit,
    prodped_quant
    )
    VALUES (
    '.$ped_idpedparc.',
    '.$pro_codsku.',
    '.$prodped_valunit.',
    '.$prodped_quant.'
    )';

pg_query($conexao, $sql);
header( 'Location:int_pedprod.php?ped_idpedparc=' . $ped_idpedparc);