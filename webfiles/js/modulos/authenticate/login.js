const elementPorperty = new ElementProperty();

elementPorperty.addEventInElement('#showPassword','onclick',function(){
    _that = this;
    elementPorperty.getElement('#userPassword' , show => {
        if(show.getAttribute('type') === 'password'){
            show.setAttribute('type' , 'text');
            this.innerHTML = "visibility_off";
            return;
        }
        this.innerHTML = "remove_red_eye";
        show.setAttribute('type' , 'password');
    });
});

elementPorperty.addEventInElement('#logar','onclick',function(){
    let user = {};
    user.email = document.getElementById('userName').value;
    user.password = document.getElementById('userPassword').value;
    if(user.email !== '' && user.password !== ''){
        auth();
        return;
    }
    swal('Atenção','Você precisa preencher todos os campos','info');

    function auth() {
        preload(true);
        UserController.authenticate(user).then(resolve => {
            preload(false);
            if(!resolve.status){
                swal('Ops',resolve.message,'info');
                return;
            }

            Session.createCookie(HOSTCOOKIE , resolve.data[0]['id']);
            Session.createCookie(HOSTCOOKIE+'id' , resolve.data[0]['id']);
            Session.createCookie(HOSTCOOKIE+'token' , resolve.data[0]['token']);
            Session.set('user' , resolve.data[0]);

            Materialize.toast('Bem vindo '+resolve.data[0]['name']+', você será redirecionando para a tela principal' , 2000);
            setTimeout(()=>{
                window.location.href = HOST+'dashboard';
            },2500);
        });
    }
});