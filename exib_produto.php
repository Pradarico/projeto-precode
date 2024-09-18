<?php
$url = 'https://www.replicade.com.br/api/v3/products/query/'.$_GET['codprod'].'/sku';
$options = [
    'http' => [
        'header' => "Content-type: application/json \r\n authorization: Basic aXdPMzVLZ09EZnRvOHY3M1I6",
        'method' => 'GET',
    ],
];
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === false) {
    $mensagem = 'Produto nao encontrado';
}
else{
    $result = json_decode($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="~X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Produto</title>
    <link rel="stylesheet" href="css/menu.css">
</head>

<body>
    <a href="index.php">
        <img src="img/img1.png" style="width:80px;height:80px;">
    </a>
    <div class="menu">
        <h1 class="titulo">Produto Encontrado</h1>
        <div class="box">
        <form method="POST" action="put_prod.php">
            <fieldset>
                <legend><b>Cadastro do Produto <?php echo $_GET['codprod']?></b></legend>
                <br>
                <?php 
                if (isset($_GET['msg']) && $_GET['msg'] == 'atualizado') {
                    echo '<p>Produto Atualizado com sucesso!</p><br><br>';
                }
                ?>
                <div class="inputBox">
                    <input type="text" name="codprod" value="<?php echo $_GET['codprod'] ?>" hidden >
                    <input type="text" name="nome" id="name" class="inputUser" value="<?php echo $result->produto->titulo?>" readonly>
                    <label for="nome" class="labelinput">Nome do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="descricao" id="description" class="inputUser" value="<?php echo $result->produto->descricao?>" readonly>
                    <label for="descricao" class="labelinput">Descrição do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="preco" id="price" class="inputUser" value="<?php echo $result->produto->precoSite?>" required>
                    <label for="preco" class="labelinput">Preço do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="promo" id="promotional_price" class="inputUser" value="<?php echo $result->produto->precoAvista?>" required>
                    <label for="promo" class="labelinput">Preço Promocional do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="custo" id="cost" class="inputUser" value="<?php echo $result->produto->precoCusto?>"  readonly>
                    <label for="custo" class="labelinput">Custo do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="peso" id="weight" class="inputUser" value="<?php echo $result->produto->peso?>" readonly>
                    <label for="peso" class="labelinput">Peso do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="largura" id="width" class="inputUser" value="<?php echo $result->produto->largura_cm?>" readonly>
                    <label for="largura" class="labelinput">Largura do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="altura" id="height" class="inputUser" value="<?php echo $result->produto->altura_cm?>" readonly>
                    <label for="altura" class="labelinput">Altura do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="comprimento" id="length" class="inputUser" value="<?php echo $result->produto->profundidade_cm?>" readonly>
                    <label for="comprimento" class="labelinput">Comprimento do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="marca" id="brand" class="inputUser" value="<?php echo $result->produto->marca?>" readonly>
                    <label for="marca" class="labelinput">Marca do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estoque" id="qty" class="inputUser" value="<?php echo $result->produto->volumes?>" required>
                    <label for="estoque" class="labelinput">Quantidade em Estoque</label>
                </div>
                <br>
                <p>Situação:</p>
                <input type="radio" id="enabled" name="status" value="enabled" <?php  if($result->produto->atributos[0]->status == 'A') echo 'checked'?> readonly>
                <label for="enabled">Ativo</label>
                <input type="radio" id="disabled" name="status" value="disabled" <?php  if($result->produto->atributos[0]->status != 'A') echo 'checked'?> readonly>
                <label for="disabled">Inativo</label>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="prazoent" id="shippingTime" class="inputUser" value="<?php echo $result->produto->prazoadicionaldeentrega?>" required>
                    <label for="prazoent" class="labelinput">Prazo adicional de Entrega</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="stores" id="stores" class="inputUser" value="1" readonly>
                    <label for="stores" class="labelinput">código do centro de distribuição</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="availableStock" id="availableStock" class="inputUser" placeholder="API nao retorna esse campo">
                    <label for="availableStock" class="labelinput">estoque disponível para venda</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="realStock" id="realStock" class="inputUser" placeholder="API nao retorna esse campo">
                    <label for="realStock" class="labelinput">estoque real disponível no centro de distribuição</label>
                </div>
                <input type="submit" name="submit" id="submit">
            </fieldset>  
        </form>
        </div>     
    </div>
</body>

</html>