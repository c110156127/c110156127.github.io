export default function Request(){
    const req = axios.create({
        baseURL: 'http://localhost/1227/public',
        headers: { 'Authorization': window.localStorage.getItem("jwtToken")}
    })
    return req;
}
