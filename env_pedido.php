<?php
include_once("config_banco.php");
$ped_idpedparc = $_GET['ped_idpedparc'] ;
$dadoscli = pg_query($conexao, 'SELECT * FROM pedido WHERE ped_idpedparc = '.$ped_idpedparc);
$result = pg_fetch_array($dadoscli, NULL, PGSQL_ASSOC);

$produtos = pg_query($conexao, 'SELECT * FROM prodped WHERE ped_idpedparc = '.$ped_idpedparc);
$result_produtos = pg_fetch_all($produtos);
//var_dump($result);
//var_dump($result_produtos);

$url = 'https://www.replicade.com.br/api/v1/pedido/pedido';

$data = [
    'pedido' => [
        'idPedidoParceiro' =>$result['ped_idpedparc'],
        'valorFrete' => floatval( $result['ped_valorfrete']),
        'valorTotalCompra' => floatval($result['ped_valortotcomp']),
        'formaPagamento' => ['ped_formpag'],
        'dadosCliente' => [
            'cpfCnpj' => $result['ped_cpfcnpj'],
            'nomeRazao' => $result['ped_nomeraz'],
            'fantasia' => $result['ped_fantasia'],
            'email' => $result['ped_email'],
            'dadosEntrega' => [
                'cep' => $result['ped_cep'],
                'numero' => $result['ped_num'],
                'endereco' => $result['ped_endereco'],
                'bairro' => $result['ped_bairro'],
                'cidade' => $result['ped_cidade'],
                'uf' => $result['ped_uf']
            ],
            'telefones' => [
                'residencial' => $result['ped_resid'],
                'celular' => $result['ped_cel']
            ],
        ],
        'pagamento' =>[[
            'valor' => floatval($result['ped_valor']),
            'quantidadeParcelas' => intval($result['ped_quantparc']),
            'sefaz' => [
                "idOperacao" => 0,
                "idFormaPagamento" => 0
            ]
        ]],
        'itens'=>[],    
    ]
];
foreach ($result_produtos as &$prod) {
    $aux = [
        'sku' => intval($prod['pro_codsku']),
        'valorUnitario' => floatval($prod['prodped_valunit']),
        'quantidade' => intval($prod['prodped_quant'])
    ];
    array_push($data['pedido']['itens'],$aux);
}
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
    $mensagem = $result->pedido->mensagem;
    if ($mensagem == 'sucesso') {
        $codigoapi = $result->pedido->numeroPedido;
        pg_query($conexao, 'UPDATE pedido SET ped_codapi = '.$codigoapi.' WHERE ped_idpedparc = '.$ped_idpedparc);
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
    <a href="index.php">
        <img src="img/img1.png" style="width:80px;height:80px;">
    </a>
    <div class="menu">
        <h1 class="titulo">Mensagem</h1>
        <p><?php echo  mb_convert_encoding($mensagem, "UTF-8", mb_detect_encoding($mensagem)); ?></p>
    </div>
</body>

</html>