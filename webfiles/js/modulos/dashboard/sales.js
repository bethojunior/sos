mountProducts();
let products = [];
let listProducts = [];

function mountProducts(){
    elementProperty.getElement('#mountListProducts',element => {
        ContentController.getProducts().then(response => {
            let list = '';
            list += response.data.map(res => {
                return `
                    <tr class="tr-products" value="${res.name}">
                        <td>${res.name}</td>
                        <td>R$${res.value}</td>
                        <td class='addThis' id="${res.id}"><i class="material-icons">arrow_right</i></td>
                    </tr>
                `;
            }).join(' ');

            element.innerHTML = list;

            elementProperty.addEventInElement('.addThis','onclick',function(){
                let id = this.getAttribute('id');
                listProducts.push(id);
                reloadListProductsClient();
                getProduct(id).then(response => {
                    data = response.data[0];
                    Materialize.toast(data.name+' adcionado com sucesso',800);
                });
            });
        });
    });
}

elementProperty.addEventInElement('#search-products' , 'oninput' , function(){
    keys = this.value;
    elementProperty.getElement('.tr-products' , element => {
        element.hidden = true;
        if(element.getAttribute("value").toUpperCase().startsWith(keys.toUpperCase())){
            element.hidden = false;
        }
    });
});

function reloadListProductsClient() {
    elementProperty.getElement('#listProductsClient',element => {
        listProducts.map(_that => {
            let check = listProducts.indexOf(_that);
            if (check > -1) {
                listProducts.splice(check, 1);
            }
            let data = {};
            data.id = _that;
            ContentController.getProductById(data).then(response => {
                let list = '';
                list += response.data.map(res => {
                    return `
                        <tr class="item-product" data="${res.id}">
                            <td>${res.name}</td>
                            <td>R$${res.value}</td>
                            <td class="remove-item" id="${res.id}" title="Apagar"><i class="material-icons">clear_all</i></td>
                        </tr>
                    `;
                }).join(' ');
                
                element.innerHTML += list;

                elementProperty.addEventInElement('.remove-item','onclick',function(){
                    let id = this.getAttribute('id');
                    elementProperty.getElement('.item-product', item => {
                        verify = item.getAttribute('data');
                        if(verify.includes(id)){
                            item.parentNode.removeChild(item);
                        }
                    });
                });

            })
        });
    })
}

function getProduct(id) {
    data = {};
    data.id = id;
    return new Promise(resolve => {
        ContentController.getProductById(data).then(response => {
            resolve(response)
        });
    })
}

elementProperty.addEventInElement('#finish-request','onclick',() => {
    SwalCustom.dialogConfirm('Deseja finalizar pedido?','',callback => {
        if(callback) {
            let data = {};
            data.name = document.getElementById('name-client').value;
            data.contact = document.getElementById('contact-client').value;
            // if (data.name === '' || data.contact === '') {
            //     swal('Atenção', 'Você precisa informar o nome e contato do cliente', 'info');
            //     return false;
            // }
            preload(true);
            async function readProductsByClient() {
                await elementProperty.getElement('.item-product', that => {
                    products.push(that.getAttribute('data'));
                });
                finishRequest()
            }
            readProductsByClient();
            return true;
        }
    })

});


function finishRequest(){
    let valueTotal = 0;
    async function sumTotal() {
        await products.map(id => {
            getProduct(id).then(callback => {
                let response = callback.data[0];
                valueTotal += parseInt(response.value);
            });
        });
    }
    sumTotal();
    preload(false)

    setTimeout(()=>{
        alert(valueTotal)
    },500)
}

