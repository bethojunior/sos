class UserController {

    static auth(data)
    {
        return new Promise(resolve => {
            ConnectionServer.sendRequest('manager/login','POST', data, resolve)
        })
    }

    static getUsersIndicate()
    {
        return new Promise(resolve => {
            ConnectionServer.sendRequest('Manager/GetIndicated','GET', '', resolve)
        })
    }

    static getUserByEmail(email)
    {
        return new Promise(resolve => {
            ConnectionServer.sendRequest('ManagerPartner/findByEmail?email='+email,'GET','',resolve)
        })
    }

    static StorePartner(data)
    {
        return new Promise(resolve => {
            ConnectionServer.sendRequest('ManagerPartner/StorePartner','POST',data,resolve);
        })
    }

}