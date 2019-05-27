
initListContent();

function initListContent(){

    elementProperty.getElement('#mountListFiles' , element => {
        _that = element;
        ContentController.getAll().then(resolve => {
            console.log(resolve)
            if(resolve.status){
                let data = resolve.data;
                let list = '';
                list += data.map(res => {
                    return `
                <tr class="trStudenty" id="${res.id}">
                    <td>${res.title}</td>
                    <td>${res.description}</td>
                    <td>${DateService.formatDate(res.datenow)}</td>
                    <td><i id="${res.id}" title="${res.title}" class="material-icons deleteContent">delete_sweep</i></td>
                </tr>
            `;
                }).join(' ');
                _that.innerHTML = list;

                elementProperty.addEventInElement('.deleteContent','onclick',function(){
                    let data = {};
                    data.id = this.getAttribute('id');
                    SwalCustom.dialogConfirm('Deseja deletar esse conteudo?' , 'Essa ação é permanente' , callback => {
                        if(callback){
                            ContentController.delete(data).then(res => {
                                Materialize.toast('Conteúdo retirado' , 1000);
                                initListContent();
                            });
                        }
                    });
                });

            }
        })
    });
}



elementProperty.addEventInElement('#sendContent','onclick',function(){

    let title = document.getElementById('titleContent').value;
    let description = document.getElementById('descriptionContent').value;
    let file = document.getElementById('fileContent').value;

    if(title === '' || title === ' ' || description === '' || description === ' ' || file === ''){
        Materialize.toast("Você precisa preencher todos os campos",1000);
        return;
    }

    let myForm = document.getElementById('firstForm');
    let formData = new FormData(myForm);

    ContentController.sendContentFile(formData).then(resolve => {
        console.log(resolve)
        if(resolve.status){
            initListContent();
            document.getElementById('titleContent').value = '';
            document.getElementById('descriptionContent').value = '';
            document.getElementById('fileContent').value = '';
            swal(';D','Conteúdo enviado com sucesso','success');
            return
        }
        swal("Erro no procedimento, favor contatar suporte",'','info');
    })


});

elementProperty.addEventInElement('#sendContentVideo','onclick',function(){
    let data = {};
    data.link = document.getElementById('linkYt').value;
    data.title = document.getElementById('titleSecond').value;
    data.description = document.getElementById('descriptionSecond').value;
    if(data.description !== "" && data.title !== "" || data.link !== ""){
        ContentController.sendContentVideo(data).then(resolve => {
            if(resolve.status){
                initListContent();
                Materialize.toast('Conteúdo enviado com sucesso',1000);
                document.getElementById('linkYt').value = '';
                document.getElementById('titleSecond').value = '';
                document.getElementById('descriptionSecond').value = '';
            }
        });
        return;
    }

    Materialize.toast('Você precisa preencher todos os campos',1000);

});



