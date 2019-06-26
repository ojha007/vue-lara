class Storage {

    storeToken(access_token) {
        window.localStorage.setItem("token", access_token)
    }

    removeToken() {
        window.localStorage.removeItem('token');
    }

    getToken() {

        return window.localStorage.getItem('token');
    }


}

export default Storage = new Storage();

