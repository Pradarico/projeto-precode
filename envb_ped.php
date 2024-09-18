<?php

include_once("config_banco.php");

$ped_valorfrete = floatval($_POST['valorFrete']);
$ped_valortotcomp = floatval($_POST['valortotalcompra']);
$ped_formpag = 4;
$ped_cpfcnpj = $_POST['cpfcnpj'];
$ped_nomeraz = $_POST['nomerazao'];
$ped_fantasia = $_POST['fantasia'];
$ped_email = $_POST['email'];
$ped_cep = $_POST['cep'];
$ped_num = $_POST['numero'];
$ped_endereco = $_POST['endereco'];
$ped_bairro = $_POST['bairro'];
$ped_cidade = $_POST['cidade'];
$ped_uf = $_POST['uf'];
$ped_resid = $_POST['residencial'];
$ped_cel = $_POST['celular'];
$ped_valor = floatval($_POST['valor']);
$ped_quantparc = $_POST['quantidadeparcelas'];
$ped_meiopag = $_POST['meiopagamento'];

$sql = 'INSERT INTO pedido(
    ped_valorfrete,
    ped_valortotcomp,
    ped_formpag,
    ped_cpfcnpj,
    ped_nomeraz,
    ped_fantasia,
    ped_email,
    ped_cep,
    ped_num,
    ped_endereco,
    ped_bairro,
    ped_cidade,
    ped_uf,
    ped_resid,
    ped_cel,
    ped_valor,
    ped_quantparc,
    ped_meiopag)
    VALUES (
    '.$ped_valorfrete.',
    '.$ped_valortotcomp.',
    \''.$ped_formpag.'\',
    \''.$ped_cpfcnpj.'\',
    \''.$ped_nomeraz.'\',
    \''.$ped_fantasia.'\',
    \''.$ped_email.'\',
    \''.$ped_cep.'\',
    \''.$ped_num.'\',
    \''.$ped_endereco.'\',
    \''.$ped_bairro.'\',
    \''.$ped_cidade.'\',
    \''.$ped_uf.'\',
    \''.$ped_resid.'\',
    \''.$ped_cel.'\',
    '.$ped_valor.',
    \''.$ped_quantparc.'\',
    \''.$ped_meiopag.'\'
    )';

pg_query($conexao, $sql);
$ped_idpedparc = pg_query($conexao,'SELECT ped_idpedparc from pedido order by ped_idpedparc desc limit 1 ');
$result = pg_fetch_array($ped_idpedparc);

if ($ped_idpedparc == false) {
    echo 'Pedido nao cadastrado';
}
else {
header( 'Location:int_pedprod.php?ped_idpedparc=' . $result['ped_idpedparc']);
};
?>