<?php
include_once("config_banco.php");
$ped_idpedparc = $_GET['ped_idpedparc'] ;

?>
<html Lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="~X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Produto no Pedido</title>
    <link rel="stylesheet" href="css/incproped.css">
</head>

<body>
    <a href="int_pedprod.php?ped_idpedparc=<?php echo $ped_idpedparc?>">
        <img src="img/img1.png" style="width:80px;height:80px;">
    </a>
    <div class="box">
        <form method="POST" action="envb_prodped.php">
            <fieldset>
                <legend><b>Incluir Produto no Pedido <?php echo $ped_idpedparc?></b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="ped_idpedparc" id="ped_idpedparc" value="<?php echo $ped_idpedparc?>" hidden>
                    <input type="text" name="codprod" id="sku" class="inputUser" required>
                    <label for="codprod" class="labelinput">Código do produto na API</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="valorunitario" id="valorUnitario" class="inputUser" required>
                    <label for="valorunitario" class="labelinput">Valor unitário do produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="quantidade" id="quantidade" class="inputUser" required>
                    <label for="quantidade" class="labelinput">Quantidade de itens comprado</label>
                </div>
            </fieldset>
            <br>
            <button type="submit" class="button">Confirmar Produito</button>
        </form>
    </div>
</body>

</html>