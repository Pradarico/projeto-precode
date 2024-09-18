<html Lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="~X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Pedido</title>
    <link rel="stylesheet" href="css/incpedido.css">
</head>

<body>
    <a href=index.php>
        <img src="img/img1.png" style="width:80px;height:80px;">
    </a>
    <div class="box">
        <form method="POST" action="envb_ped.php" >
            <fieldset>
                <legend><b>Incluir Pedido</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="valorFrete" id="valorFrete" class="inputUser" required>
                    <label for="valorFrete" class="labelinput">Valor do Frete</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="valortotalcompra" id="valorTotalCompra" class="inputUser" required>
                    <label for="valortotalcompra" class="labelinput">Valor Total da Compra</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cpfcnpj" id="cpfCnpj" class="inputUser" required>
                    <label for="cpfcnpj" class="labelinput">CNPJ/CPF do Cliente</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nomerazao" id="nomeRazao" class="inputUser" required>
                    <label for="nomerazao" class="labelinput">Razão Social do Cliente</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="fantasia" id="fantasia" class="inputUser" required>
                    <label for="fantasia" class="labelinput">Nome Fantasia do Cliente</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelinput">Email do Cliente</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cep" id="cep" class="inputUser" required>
                    <label for="cep" class="labelinput">CEP do Endereço de Entrega</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelinput">Endereço de Entrega</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="numero" id="numero" class="inputUser" required>
                    <label for="numero" class="labelinput">Número da residência</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="bairro" id="bairro" class="inputUser" required>
                    <label for="bairro" class="labelinput">Bairro do endereço de entrega</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelinput">Cidade do endereço de entrega</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="uf" id="uf" class="inputUser" required>
                    <label for="uf" class="labelinput">Estado do endereço de entrega</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="residencial" id="residencial" class="inputUser" required>
                    <label for="residencial" class="labelinput">Telefone residencial do cliente</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="celular" id="celular" class="inputUser" required>
                    <label for="celular" class="labelinput">Telefone celular do cliente</label>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <br>
                <div class="inputBox">
                    <input type="text" name="valor" id="valor" class="inputUser" required>
                    <label for="valor" class="labelinput">Valor total do meio de pagamento</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="quantidadeparcelas" id="quantidadeParcelas" class="inputUser" required>
                    <label for="quantidadeparcelas" class="labelinput">Quantidade de parcelas do meio de pagamento</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="meiopagamento" id="meioPagamento" class="inputUser" required>
                    <label for="meiopagamento" class="labelinput">Nome do meio do pagamento</label>
                </div>
            </fieldset>
            <br>
            <button type="submit" class="button">Proximo Passo</button>
        </form>
    </div>
</body>

</html>