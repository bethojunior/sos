class ContentController {

    static getProducts()
    {
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('content/getAll','POST', {}, resolve)
        })
    }

    static insertProduct(data)
    {
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('content/insert','POST',{data}, resolve)
        })
    }

}