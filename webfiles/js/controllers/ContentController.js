class ContentController {

    static getProducts()
    {
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('content/getAll','POST', {}, resolve)
        })
    }

    static getProductById(data)
    {
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('content/get','POST',{data}, resolve)
        })
    }

    static insertProduct(data)
    {
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('content/insert','POST',{data}, resolve)
        })
    }

    static delete(data)
    {
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('content/delete','POST',{data}, resolve)
        })
    }

}