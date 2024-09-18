<html Lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="~X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Produto</title>
    <link rel="stylesheet" href="css/consproduto.css">
</head>

<body>
    <a href=index.php>
        <img src="img/img1.png" style="width:80px;height:80px;">
    </a>
    <div class="box">
        <form type="GET" action="exib_produto.php">
            <fieldset>
                <legend><b>Consultar Produto na API</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="codprod" id="sku" class="inputUser" required>
                    <label for="codprod" class="labelinput">Digite o Codigo do Produto na API</label>
                </div>
                <br><br>
                <button class="button" type="submit">Enviar</button>
            </fieldset>
        </form>
    </div>
</body>

</html>