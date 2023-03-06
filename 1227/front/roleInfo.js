import showInsertPageR from "./showInsertPageR.js";
import showUpdatePageR from "./showUpdatePageR.js";
import doDeleteR from "./doDeleteR.js";
import Request from "./Request.js";
import loginPage from "./doLogin.js";
export default function roleInfo(){
    Request().get("/index.php?action=getroles")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
            //執行成功後的畫面處理
            const rows = response['result'];
            let str = `<table>`;
            str += `<tr><td>編號</td><td>名字</td><td><button id='newrole'>新增角色</button></td></tr>`;
            rows.forEach(element => {
            str += `<tr>`;
            str += `<td name='id'>` + element['id'] + `</td>`;
            str += `<td >` + element['name'] + `</td>`;
            str += `<td><button name='updaterole'>修改</button><button name='deleterole'>刪除</button></td>`;
            str += `</tr>`;
                });
            str += `</table>`;
            document.getElementById("content").innerHTML=str;
            document.getElementById("newrole").onclick = function(){ 
                showInsertPageR();
            };
            const ids = document.getElementsByName("id");
            
            const updateButtons = document.getElementsByName("updaterole");
            for(let i=0; i<updateButtons.length; i++){
                updateButtons[i].onclick = function(){
                    showUpdatePageR(ids[i].innerText);
                };
            }
            
            const deleteButtons = document.getElementsByName("deleterole");
            for(let i=0; i<deleteButtons.length; i++){
                deleteButtons[i].onclick = function(){
                    doDeleteR(ids[i].innerText);
                };
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

