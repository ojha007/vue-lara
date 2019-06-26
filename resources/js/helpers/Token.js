class Token {

    isValid(token) {
        const payload = this.payload(token);
        const url = "http://127.0.0.1:8000/api/v1/auth/login";
        if (payload) {
            return payload.iss === url ? true : false;
        }
        return false;
    }

    payload(token) {
        const access_token = token.split('.')[1];
        return this.decode(access_token);

    }

    decode(access_token) {
        return JSON.parse(atob(access_token))
    }


}

export default Token = new Token();


