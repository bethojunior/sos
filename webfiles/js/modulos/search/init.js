const elementProperty = new ElementProperty();
preload(true);
mountList();
function mountList(concat = false) {
    UserController.getAll().then(resolve => {
        if(!resolve.status){
            Materialize.toast('Erro ao carregar lista');
        }
        elementProperty.getElement('#mountListUsers' , element => {
            let list = concat ? element.innerHTML : "";
            list += resolve.data.map(user => {
                return `
                <div class="cliente" id="${user.id}" value="${user.name}">
                    <img src="${user.src}">
                    ${user.name}
                </div>
            `;
            }).join(" ");
            element.innerHTML = list;
            preload(false);
            elementProperty.addEventInElement('.cliente','onclick',function(){
               window.location.href = HOST+'me?id='+this.getAttribute('id');
            });
        });
    });
}

elementProperty.addEventInElement('#searchUsers','onkeypress' , function(){
    keys = this.value;
    elementProperty.getElement('.cliente' , element => {
        element.hidden = true;
        if(element.getAttribute("value").toUpperCase().startsWith(keys.toUpperCase())){
            element.hidden = false;
        }
    });

});