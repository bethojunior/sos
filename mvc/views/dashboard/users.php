<div class="ml">
    <span class="titlePage">Usuários</span>
    <i id="addUser" class="material-icons right">person_add</i>
    <div class="divider first"></div>
    <table class="striped highlight">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody id="mountUsers"></tbody>
    </table>
</div>


<div id="modalUSer" class="modal">
    <div class="modal-content">
        <input hidden id="idUser">
        <label>Nome: </label>
        <input placeholder="Nome"  id="nameUser">
        <label>Email: </label>
        <input placeholder="Email" id="emailUser">
        <label>Senha: </label>
        <input placeholder="Senha" id="passwordUser">
        <div class="center">
            <button class="btn" id="updateUser">SALVAR</button>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Sair</a>
    </div>
</div>


<div id="modalAddUser" class="modal">
    <div class="modal-content">
        <div class="modal-content">
            <input id="nameInsert" placeholder="Nome">
            <input id="emailInsert" placeholder="Email">
            <input id="passInsert" placeholder="Senha">
            <p>
                <input name="typeUser" type="radio" id="test1" value="3" />
                <label for="test1">Professor</label>
            </p>
            <p>
                <input name="typeUser" type="radio" id="test2" value="1" />
                <label for="test2">Administrador</label>
            </p>
            <div class="center">
                <button id="insertUser" class="btn">Salvar</button>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Sair</a>
    </div>
</div>



