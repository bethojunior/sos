<div class="ml">
    <span class="titlePage">Conteúdo</span>
    <div class="divider first"></div>
    <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#firstForm">Envio de arquivos</a></li>
        <li class="tab col s3"><a href="#test2">Video aula</a></li>
    </ul>
    <form id="firstForm" class="col s12">
        <div class="generalContent">
            <div class="header">
                <input name="titleContent" id="titleContent" placeholder="Titulo">
                <input name="descriptionContent" id="descriptionContent" placeholder="Descrição">
            </div>
            <div class="firstPart">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Arquivo</span>
                        <input name="content" id="fileContent" type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                    <button type="button" id="sendContent" class="btn right">Enviar</button>
                </div>
            </div>

        </div>
    </form>

    <div id="test2" class="secondSend" style="width: 80%;">
        <input id="linkYt" placeholder="Link do youtube">
        <input id="titleSecond" placeholder="Titulo">
        <input id="descriptionSecond" placeholder="Descrição">
        <button id="sendContentVideo" class="btn">Enviar</button>
    </div>

    <div class="thirdPart">
        <h5>Lista de envios</h5>
        <div class="divider"></div>
        <table class="bordered highlight striped">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody id="mountListFiles">

            </tbody>
        </table>
    </div>
</div>