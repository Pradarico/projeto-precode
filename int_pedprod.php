<?php
include_once("config_banco.php");
$ped_idpedparc = $_GET['ped_idpedparc'] ;
$dadoscli = pg_query($conexao, 'SELECT ped_fantasia, ped_cpfcnpj FROM pedido WHERE ped_idpedparc = '.$ped_idpedparc);
$result = pg_fetch_array($dadoscli);
$produtos = pg_query($conexao, 'SELECT * FROM prodped WHERE ped_idpedparc = '.$ped_idpedparc);
$result_produtos = pg_fetch_all($produtos);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="~X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela intermediaria Pedido</title>
    <link rel="stylesheet" href="css/menu.css">
</head>

<body>
<a href="index.php?ped_idpedparc=<?php echo $ped_idpedparc?>">
        <img src="img/img1.png" style="width:80px;height:80px;">
    </a>
    <div class="menu">
        <h1 class="titulo">Pedido <?php echo $ped_idpedparc ?></h1>
        <div class="inputBox">
            <input type="text" name="ped_fantasia" id="ped_fantasia" value="<?php echo $result['ped_fantasia']?>" class="inputUser" required>
            <label for="ped_fantasia" class="labelinput">Fantasia do Cliente</label>
        </div>
        <br><br>
        <div class="inputBox">
            <input type="text" name="ped_cpfcnpj" id="ped_cpfcnpj" value="<?php echo $result['ped_cpfcnpj']?>" class="inputUser" required>
            <label for="ped_cpfcnpj" class="labelinput">CPF ou CNPJ do cliente</label>
        </div>
        <br><br>
        <div class="inputBox">
            <table>
            <tr>
                <th>ID</th>
                <th>VALOR UNITARIO</th>
                <th>QUANTIDADE</th>
            </tr>
            <?php foreach ($result_produtos as &$prod) {?>
                <tr>
                    <td><?php echo $prod['pro_codsku']?></td>
                    <td><?php echo $prod['prodped_valunit']?></td>
                    <td><?php echo $prod['prodped_quant']?></td>
                </tr>
            <?php } ?>
            </table>
        </div>       
        <a href="inc_proped.php?ped_idpedparc=<?php echo $ped_idpedparc?>">
            <button class="button">Cadastrar um Produto</button>
        </a>
        <br><br>
        <a href="env_pedido.php?ped_idpedparc=<?php echo $ped_idpedparc?>">
            <button type="submit" class="button">Enviar</button>
        </a>
    </div>
</body>

</html>