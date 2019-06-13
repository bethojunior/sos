<div class="no-print">
    <div class="ml">
        <span class="titlePage">Vender</span>
        <div class="divider first"></div>
        <div class="generalSales">
            <div class="first">
                <input id="search-products" placeholder="Buscar">
                <table class="bordered">
                    <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Valor</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody id="mountListProducts">

                    </tbody>
                </table>

            </div>
            <div class="second">
                <h5>Produtos do cliente</h5>
                <div class="center">
                    <input id="name-client" placeholder="Nome do cliente">
                    <input id="contact-client" placeholder="Contato">
                </div>
                <table class="bordered">
                    <thead>
                    <tr>
                        <td>Produto</td>
                        <td>Valor</td>
                        <td>Quantidade</td>
                    </tr>
                    </thead>
                    <tbody id="listProductsClient">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="finish-request" class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">send</i>
        </a>
    </div>
</div>

<div class="print">
    <div class="row">
        <div class="col l12">
            <div class="container-print">
                <div class="center">
                    <h1>S.O.S</h1>
                </div>
                <span>Cliente : <b id="name-print"></b></span>
                <br>
                <span>Contato: <b id="contact-print"></b></span>
                <br>
                <table style="width: 100%" class="bordered striped">
                    <thead style="width: 100%">
                    <tr>
                        <th>Produto</th>
                        <th>Valor</th>
                        <th>Referencia</th>
                    </tr>
                    </thead>

                    <tbody style="width: 100%" id="mount-products-sale">
                    </tbody>
                    <tr>
                        <th></th>
                        <th>Total</th>
                        <th id="value-total-sale"></th>
                        <input hidden id="value-total">
                    </tr>
                </table>
                <div style="margin-top: 3vw">
                    <span>Este comprovante não tem valor fiscal e deve ser apresentado caso o produto precise de manutenção</span>
                </div>
                <br>
                <div style="margin-top: 5vw">
                    <hr>
                    <div class="center">
                        <label>Assinatura do cliente </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>