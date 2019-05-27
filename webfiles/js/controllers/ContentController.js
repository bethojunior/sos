class ContentController {

    static getProducts(){
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('content/getAll','POST', {}, resolve)
        })
    }

}