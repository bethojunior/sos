class ManagerController {

    static getCitiesWithBilling()
    {
        return new Promise(resolve => {
            ConnectionServer.
                sendRequest('manager/citiesWithBilling','GET','', resolve)
        })
    }

    static getDriversWithBilling()
    {
        return new Promise(resolve => {
            ConnectionServer.
                sendRequest('manager/driversWithBilling','GET','', resolve)
        })
    }

    static filterBilling(data)
    {
        return new Promise(resolve => {
            ConnectionServer.
                sendRequest('manager/billing?driverId='+data.driverId+'&cityId='+data.cityId+'&date='+data.date+'&page='+data.page,'GET','', resolve)
        })
    }

    static listPartners()
    {
        return new Promise(resolve => {
            ConnectionServer.
                sendRequest('ManagerPartner/Partners','GET','',resolve)
        })
    }

}