$('.modal').modal();
initUsers();

function initUsers() {
    elementProperty.getElement('#mountUsers', write => {
        UserController.getAll().then(response => {
            let list = '';
            list += response.data.map(res => {
                if(res.type !== typeStudant){
                    return `
                    <tr class="thisUser" id="${res.id}" name="${res.name}" email="${res.email}" pass="${res.password}">
                        <td>${res.name}</td>
                        <td>${res.email}</td>
                        <td>${showTypeUSer(res.type)}</td>
                        <td title="Apagar"><i id="${res.id}" class="material-icons deleteUSer">clear_all</i></td>
                    </tr>
               `;
                }
            }).join(' ');

            write.innerHTML = list;

            elementProperty.addEventInElement('.thisUser','onclick',function () {
                $('#modalUSer').modal('open');
                document.getElementById('idUser').value = this.getAttribute('id');
                document.getElementById('nameUser').value = this.getAttribute('name');
                document.getElementById('emailUser').value = this.getAttribute('email');
                document.getElementById('passwordUser').value = this.getAttribute('pass');
            });

            elementProperty.addEventInElement('.deleteUSer','onclick',function(e){
                e.stopPropagation();
                let data = {};
                data.id = this.getAttribute('id');
                SwalCustom.dialogConfirm('Você deseja deletar esse usuário?','Essa ação é irreversivel' , callback => {
                    if(callback){
                        UserController.deleteUser(data).then(call => {
                            if(call.status){
                                Materialize.toast("Usuário deletado" , 1000);
                                initUsers();
                            }
                        });
                    }
                });
            });
        });
    });
}


function showTypeUSer(type) {
    return typeUser[type]
}

elementProperty.addEventInElement('#updateUser','onclick',function () {
    let data = {};
    data.id        = document.getElementById('idUser').value;
    data.name      = document.getElementById('nameUser').value;
    data.email     = document.getElementById('emailUser').value;
    data.password  = document.getElementById('passwordUser').value;
    UserController.updateUser(data).then(callback => {
        if(callback.status){
            initUsers();
            Materialize.toast("Usuário modificado com sucesso",1000);
            $('#modalUSer').modal('close');
        }
    });
});

elementProperty.addEventInElement('#addUser','onclick',function () {
    $('#modalAddUser').modal('open');
});

elementProperty.addEventInElement('#insertUser','onclick',function () {
    let data = {};
    data.name  = document.getElementById('nameInsert').value;
    data.email = document.getElementById('emailInsert').value;
    data.pass  = document.getElementById('passInsert').value;
    data.type  = $("input[name='typeUser']:checked").val();

    if(data.name === '' || data.email === '' || data.pass === '' || data.type === undefined){
        Materialize.toast('Você precisa preencher todos os campos',1000);
        return;
    }

    UserController.insertUSer(data).then(callback => {
        if(callback.status){
            $('#modalAddUser').modal('close');
            Materialize.toast(data.name+" adcionando com sucesso",1000);
            initUsers();
        }
    })

});