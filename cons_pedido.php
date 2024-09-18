<html Lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="~X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Pedido</title>
    <link rel="stylesheet" href="css/conspedido.css">
</head>

<body>
    <a href=index.php>
        <img src="img/img1.png" style="width:80px;height:80px;">
    </a>
    <div class="box">
        <form type="GET" action="exib_pedido.php">
            <fieldset>
                <legend><b>Consultar Pedido na API</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="ped_idpedparc" id="ped_idpedparc" class="inputUser" required>
                    <label for="ped_idpedparc" class="labelinput">Digite o Codigo Interno do Pedido</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>

</html>