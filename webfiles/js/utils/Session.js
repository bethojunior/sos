class Session {
    static get(name) {
        if (localStorage.getItem(name) === null) {
            return [];
        }

        return JSON.parse(localStorage.getItem(name));
    }


    static set(name, value) {
        localStorage.setItem(name, JSON.stringify(value));
    }

    static delete(name) {
        localStorage.removeItem(name);
    }

    static setAttribute(nameStorage, property, newValue) {

        const data = Session.get(nameStorage);

        if (Array.isArray(data)) {
            Session.set(nameStorage, data.map(object => {
                object[property] = newValue;
                return object;
            }));
            return;
        }

        data[property] = newValue;

        Session.set(nameStorage, data);
    }

    static getValueInSession(id,attribute){
        const session = Session.get(id);

        if(Array.isArray(session))
            return session.map(item => {
                return item[attribute];
            });

        return session[attribute];

    }

    static createCookie(name , value, duration) {
        let cookie = name + "=" + escape(value);

        document.cookie = cookie;
    }

    static getCookie(name) {
        var cookies = document.cookie;
        var prefix = name + "=";
        var begin = cookies.indexOf("; " + prefix);

        if (begin == -1) {

            begin = cookies.indexOf(prefix);

            if (begin != 0) {
                return null;
            }

        } else {
            begin += 2;
        }

        var end = cookies.indexOf(";", begin);

        if (end == -1) {
            end = cookies.length;
        }

        return unescape(cookies.substring(begin + prefix.length, end));
    }

    static deleteCookie(name) {
        if (this.getCookie(name)) {
            document.cookie = name + "=" + "; expires=Thu, 01-Jan-70 00:00:01 GMT";
        }
    }

}
