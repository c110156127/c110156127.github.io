import Request from "./Request.js";
import loginPage from "./doLogin.js";
export default function doUpdateS(){
    let data = {
        "id":document.getElementById("id_1").innerHTML,
        "name":document.getElementById("name").value,
        "pn":document.getElementById("pn").value,
        "phone":document.getElementById("phone").value,
        "address":document.getElementById("address").value
    };
    Request().post("/index.php?action=updatesupplys",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                //執行成功後的畫面處理
                document.getElementById("content").innerHTML = response['message'];
                if(window.localStorage){ //儲存到 local storage
                    window.localStorage.setItem("jwtToken", response['token']);
                }
                break;
            case 401:
                loginPage();
                break;
            case 403:
                alert('權限不足');
                break;
            default:
                document.getElementById("content").innerHTML = response['message'];
                break;
        }
    })
    .catch(err => {
        console.error(err); 
    })
}

//    axios.("http://localhost/1220/public/index.php?action=updatesupplys",Qs.stringify(data))
//    .then(res => {
//        let response = res['data'];
//        document.getElementById("content").innerHTML = response['message'];
//    })
//    .catch(err => {
//        document.getElementById("content").innerHTML = err;
//    })