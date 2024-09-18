<?php

include_once("config_banco.php");

$prod_nome = $_POST['nome'];
$prod_descricao = $_POST['descricao'];
$prod_preco = intval($_POST['preco']);
$prod_promo = intval($_POST['promo']);
$prod_custo = intval($_POST['custo']);
$prod_peso = intval($_POST['peso']);
$prod_largura = intval($_POST['largura']);
$prod_altura = intval($_POST['altura']);
$prod_comprimento = intval($_POST['comprimento']);
$prod_marca = $_POST['marca'];
$prod_situacao = $_POST['status'];
$prod_estoque = $_POST['estoque'];

$sql = 'INSERT INTO produtos(
prod_nome,
prod_descricao,
prod_preco,
prod_promo,
prod_custo,
prod_peso,
prod_largura,
prod_altura,
prod_comprimento,
prod_marca,
prod_situacao,
prod_estoque)
VALUES (
\''.$prod_nome.'\',
\''.$prod_descricao.'\',
'.$prod_preco.',
'.$prod_promo.',
'.$prod_custo.',
'.$prod_peso.',
'.$prod_largura.',
'.$prod_altura.',
'.$prod_comprimento.',
\''.$prod_marca.'\',
\''.$prod_situacao.'\',
\''.$prod_estoque.'\'
)';

pg_query($conexao,$sql);

$url = 'https://www.replicade.com.br/api/v3/products';

$data = [
    'product' => [
        'name' => $_POST['nome'],
        'description' => $_POST['descricao'],
        'price' => intval($_POST['preco']),
        'promotional_price' => intval($_POST['promo']),
        'cost' => intval($_POST['custo']),
        'weight' => intval($_POST['peso']),
        'width' => intval($_POST['largura']),
        'height' => intval($_POST['altura']),
        'length' => intval($_POST['comprimento']),
        'brand' => $_POST['marca'],
        'status' => $_POST['status'],
        'variations' => [[
            'qty' => $_POST['estoque'],
            'specifications' => [],
        ]],
    ]
];
$options = [
    'http' => [
        'header' => "Content-type: application/json \r\n authorization: Basic aXdPMzVLZ09EZnRvOHY3M1I6",
        'method' => 'POST',
        'content' => json_encode($data),
    ],
];
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$mensagem = '';

if ($result === false) {
    $mensagem = 'Cadastro nao enviado';
} else {
    $result = json_decode($result);
    $mensagem = $result->message;
    if ($mensagem == 'sucesso') {
        header('Location:exib_produto.php?codprod=' . $result->variations[0]->sku);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="~X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Produto</title>
    <link rel="stylesheet" href="css/menu.css">
</head>

<body>
    <a href=cad_produto.php>
        <img src="img/img1.png" style="width:80px;height:80px;">
    </a>
    <div class="menu">
        <h1 class="titulo">Mensagem de Erro</h1>
        <p><?php echo  mb_convert_encoding($mensagem, "UTF-8", mb_detect_encoding($mensagem)); ?></p>
    </div>
</body>

</html>