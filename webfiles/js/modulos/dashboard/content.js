
mountContent();
function mountContent(){
    elementProperty.getElement('#mountTableContent',element => {
        ContentController.getProducts().then(response => {
            let list = '';
            list += response.data.map(res => {
                return `
                <tr>
                    <td>${res.name}</td>
                    <td>${res.description}</td>
                    <td>R$${res.value}</td>
                    <td><label>${res.ref}</label></td>
                    <td class="deleteContent" id="${res.id}"><i class="material-icons">clear_all</i></td>
                </tr>
            `;
            }).join(' ');
            element.innerHTML = list;

            elementProperty.addEventInElement('.deleteContent','onclick',function(){
                let id = this.getAttribute('id');
                SwalCustom.dialogConfirm('Deseja apagar esse produto?','', callback => {
                    if(callback){
                        let data = {};
                        data.id = id;
                        ContentController.delete(data).then(res => {
                            if(res.status){
                                Materialize.toast('Produto deletado',8000);
                                mountContent();
                            }
                        });
                        return;
                    }
                    Materialize.toast('Cancelado',8000);
                });
            });

        })
    });
}

elementProperty.addEventInElement('#sendContent','onclick',function(){
    let data = {};
    data.name        = document.getElementById('name').value;
    data.value       = document.getElementById('value').value;
    data.description = document.getElementById('description').value;
    data.ref         = document.getElementById('ref').value;

    if(data.name === '' || data.value === '' || data.description === '' || data.ref === ''){
        Materialize.toast('Voce precisa preencher todos os campos' , 6000);
        return;
    }
    preload(true);
    ContentController.insertProduct(data).then(response => {
        preload(false);
        if(response.status){
            swal('Finalizado','Produto inserido','success');
            mountContent();
        }
    });

});