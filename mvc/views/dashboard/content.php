<div class="ml">
    <span class="titlePage">Produtos</span>
    <div class="divider first"></div>
    <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#firstPart">Geral</a></li>
        <li class="tab col s3"><a href="#listProducts">Inserir produtos</a></li>
    </ul>

    <div id="firstPart" class="col s12">
        <table class="striped highlight bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Valor</th>
                    <th>Referencia</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="mountTableContent">

            </tbody>
        </table>
    </div>

    <div id="listProducts" class="secondSend" style="width: 80%;">
        <label>Referencia</label>
        <input id="ref" disabled value="SOS223#">
        <input id="name" placeholder="Nome">
        <input id="value" placeholder="Valor">
        <input id="description" placeholder="Descrição">
        <button id="sendContent" class="btn">Enviar</button>
    </div>


    </div>
</div>