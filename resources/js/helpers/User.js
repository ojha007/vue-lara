import Token from './Token';
import Storage from './Storage';

class User {

    login(form) {
        return axios.post('api/v1/auth/login', form)
            .then(response => this.responseAfterLogin(response))
            .catch(error => function () {
                return error.data;
            })

    }

    logout() {
        Storage.removeToken();
    }

    responseAfterLogin(response) {
        const token = response.data.access_token;
        if (Token.isValid(token)) {
            Storage.storeToken(token);
        }

    }

    hasToken() {
        const storedToken = Storage.getToken();
        if (storedToken) {
            return Token.isValid(storedToken) ? true : false;
        }
        return false;

    }

    logedIn() {
        return this.hasToken();

    }



}

export default User = new User();

