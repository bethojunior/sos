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

    static insertSale(data)
    {
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('cashier/insert','POST',{data},resolve)
        })
    }

    static getCashier()
    {
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('cashier/GetAll','POST',{},resolve)
        })
    }

    static getValueMonth()
    {
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('cashier/GetValueMonth','POST',{},resolve)
        })
    }

}