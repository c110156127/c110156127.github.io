import doUpdateR from './doUpdateR.js';
import Request from "./Request.js";
import loginPage from "./doLogin.js";
export default function showUpdatePageP(id){
    let data = {
        "id":id,
    };
    Request().post("/index.php?action=getroles",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                //執行成功後的畫面處理
                const rows = response["result"];
                    const row = rows[0];
                    let str=`編號:<text id="id_1">`+row['id']+`</text><br>`;
                    str += `名字:<input type='text' id="name" value="`+ row['name']+`"><br>`;
                    str += `<button id="doUpdate">修改</button>`;
                    document.getElementById("content").innerHTML = str;
                    document.getElementById("doUpdate").onclick = function(){
                        doUpdateR();
                    }
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

