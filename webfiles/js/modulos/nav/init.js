const dataUser = Session.get('user');

let elementProperty = new ElementProperty();

elementProperty.getElement('#nameProfile',name => {
    name.innerHTML = dataUser.name;
});
elementProperty.getElement('#emailProfile',email => {
    email.innerHTML = dataUser.email;
});