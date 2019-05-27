class ContentController {

    static sendContentVideo(data){
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('content/ContentFileWithVideo','POST', {data}, resolve)
        })
    }
    static sendContentFile(form){
        return new Promise(resolve => {
            ConnectionServer.requestFile('content/contentFile','POST', form, resolve)
        })
    }

    static getAll(){
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('content/getall','POST', {}, resolve)
        })
    }

    static delete(data){
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('content/DeleteContent','POST', {data}, resolve)
        })
    }
}