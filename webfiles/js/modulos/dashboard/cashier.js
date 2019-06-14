$('.modal').modal();
initUsers();

getValueMonth();

function initUsers() {
    elementProperty.getElement('#mountCashier', write => {
        ContentController.getCashier().then(response => {
            let list = '';
            list += response.data.map(res => {
                if(res.type !== typeStudant){
                    return `
                    <tr class="thisUser" id="${res.id}">
                        <td>${res.name}</td>
                        <td>${res.what}</td>
                        <td>${res.data_who}</td>
                        <td>R$ ${res.value_sale}</td>
                    </tr>
               `;
                }
            }).join(' ');

            write.innerHTML = list;
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