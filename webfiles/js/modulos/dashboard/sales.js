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

    listProducts.map(_that => {
        let data = {};
        data.id = _that;
        ContentController.getProductById(_that).then(response => {
            productsArray.push(response.data);
        });
    });

}


function getProduct(id) {
    data = {};
    data.id = id;
    ContentController.getProductById(data).then(response => {
        return response;
    });
}