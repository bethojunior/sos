class UserController{
    /**
     *
     * @param email
     * @returns {Promise<any>}
     */

    static authenticate(data){
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('User/Authenticate','POST', {data} , resolve)
        })
    }

    static getAll(){
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('User/getall','POST', {} , resolve)
        })
    }

    static getUserByType(data){
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('User/GetUserByType','POST', {data}, resolve)
        })
    }

    static changeStatusUSer(data){
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('User/ChangeStatusStudent','POST',{data}, resolve)
        })
    }

    static deleteUser(data){
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('User/DeleteUser','POST',{data}, resolve)
        })
    }


    static updateUser(data){
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('User/UpdateUser','POST',{data}, resolve)
        })
    }

    static insertUSer(data){
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('User/InsertUser','POST',{data}, resolve)
        })
    }

    static getUserById(data){
        return new Promise(resolve => {
            ConnectionServer.simpleRequest('User/GetUserById','POST',{data}, resolve)
        })
    }

}