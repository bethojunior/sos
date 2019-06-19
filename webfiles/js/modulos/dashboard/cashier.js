

$('.modal').modal();
initUsers();

getValueMonth();

function initUsers() {
    elementProperty.getElement('#mountCashier', write => {
        ContentController.getCashier().then(response => {
            let list = '';
            list += response.data.map(res => {
                return `
                    <tr class="thisUser" id="${res.id}">
                        <td>${res.name}</td>
                        <td>${res.id_who}</td>
                        <td class="open-products" id="${res.what}">${res.what}</td>
                        <td>${res.data_who}</td>
                        <td>R$ ${res.value_sale}</td>
                    </tr>
               `;
            }).join(' ');
            write.innerHTML = list;
            elementProperty.addEventInElement('.open-products','onclick',function(){
                let products = this.getAttribute('id');
                openModalProducts(products);
            });
        });
    });
}


function getValueMonth() {
    ContentController.getValueMonth().then(callback => {
        response = callback.data[0];
        elementProperty.getElement('#month', here => {
            here.innerHTML = 'R$ '+response.total;
        })
    })
}

function openModalProducts(products){
    let product = products.split(',');
    let that_ = [];
    product.map(id => {
        let data = {};
        data.id = id;
        ContentController.getProductById(data).then(callback => {
            that_.push(callback.data[0])
        });
    });

    setTimeout(()=>{
        mountProductsSales(that_);
    },500);
}

function mountProductsSales(products) {
    $('#modal-products-sale').modal('open');
    elementProperty.getElement('#mount-products-list-sale',table => {
        let list = '';
        list += products.map(res => {
            return `
                    <tr class="thisUser" id="${res.id}">
                        <td>${res.name}</td>
                        <td>R$ ${res.value}</td>
                    </tr>
               `;
        }).join(' ');
        table.innerHTML = list;
    });
}

