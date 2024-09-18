<?php

$url = 'https://www.replicade.com.br/api/v3/products/inventory';

$data = [
    'products'=> [[
        'ref' => "",
        'sku' => intval ($_POST['codprod']),
        'promotional_price' => intval($_POST['promo']),
        'price' => intval($_POST['preco']) ,
        'priceSite' => intval($_POST['preco']),
        'cost' => intval($_POST['custo']),
        'shippingTime' => intval($_POST['prazoent']),
        'status' => $_POST['status'],
        'stock' => [[
            'stores' => 1,
            'availableStock' => intval($_POST['availableStock']),
            'realStock' => intval($_POST['realStock']),
        ]],
        ]
    ]
];
$options = [
    'http' => [
        'header' => "Content-type: application/json \r\n authorization: Basic aXdPMzVLZ09EZnRvOHY3M1I6",
        'method' => 'PUT',
        'content' => json_encode($data),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$mensagem = '';
var_dump($result);
if ($result === false) {
    $mensagem = 'Cadastro nao enviado';
}
else{
    $result = json_decode($result);
    var_dump($result);
    $mensagem = $result->products[0]->return[0]->message;
    if ($mensagem == 'sucesso'){
        header('Location:exib_produto.php?codprod='.$result->products[0]->sku.'&msg=atualizado');

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="~X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Produto</title>
    <link rel="stylesheet" href="css/menu.css">
</head>

<body>
    <a href=cad_produto.php>
        <img src="img/img1.png" style="width:80px;height:80px;">
    </a>
    <div class="menu">
        <h1 class="titulo">Mensagem de Erro</h1>
        <p><?php echo  mb_convert_encoding($mensagem, "UTF-8", mb_detect_encoding($mensagem));?></p>
    </div>
</body>

</html>