class ConnectionServer {
    static Host() {
        return HOST;
    }

    static simpleRequest(url , method , params , callback) {

        $.ajax({
            url: this.Host()+url,
            headers: {
                'token'  : Session.getValueInSession('user', 'token'),
                'id'     : Session.getValueInSession('user','id')
            },
            method: method,
            dataType: 'json',
            data: params,
            success:function(result){
                callback(result);
            },error:function(result){
                console.log(result);
            }
        });

    }

    static requestFile(url , method , form , callback){

        $.ajax({
            url: this.Host()+url,
            headers: {
                'token'  : Session.getValueInSession('user', 'token'),
                'id'     : Session.getValueInSession('user','id')
            },
            method: method,
            dataType: 'json',
            data: form,
            success: function(result){
                callback(result);
            },error: function(result){
                console.log('error' + result)
            },
            cache: false,
            contentType: false,
            processData: false,
            xhr: function() {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }

        });

    }

}
