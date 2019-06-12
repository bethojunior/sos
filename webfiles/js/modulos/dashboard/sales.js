mountProducts();
let listProducts = [];
let product = [];
let productsArray = [];

function mountProducts(){
    elementProperty.getElement('#mountListProducts',element => {
        ContentController.getProducts().then(response => {
            let list = '';
            list += response.data.map(res => {
                return `
                    <tr>
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
            });

        })
    });
}

function reloadListProductsClient() {
    elementProperty.getElement('#listProductsClient',element => {
        listProducts.map(_that => {
            console.log(_that)
            let check = listProducts.indexOf(_that);
            console.log(check)
            if (check > -1) {
                listProducts.splice(check, 1);
            }
            let data = {};
            data.id = _that;
            ContentController.getProductById(data).then(response => {
                console.log(data)
                let list = '';
                list += response.data.map(res => {
                    return `
                        <tr>
                            <td>${res.name}</td>
                            <td>R$${res.value}</td>
                            <td>1</td>
                        </tr>
                    `;
                }).join(' ');
                element.innerHTML += list;
            })
        });
    })
}

function getProduct(id) {
    data = {};
    data.id = id;
    ContentController.getProductById(data).then(response => {
        return response;
    });
}