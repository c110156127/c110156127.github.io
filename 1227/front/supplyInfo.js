import showInsertPageS from "./showInsertPageS.js";
import showUpdatePageS from "./showUpdatePageS.js";
import doDeleteS from "./doDeleteS.js";
import Request from "./Request.js";
import loginPage from "./doLogin.js";
export default function supplyInfo(){
    Request().get("/index.php?action=getsupplys")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                //執行成功後的畫面處理
                const rows = response['result'];
                let str = `<table>`;
                str += `<tr><td>編號</td><td>名字</td><td>聯絡人</td><td>電話</td><td>地址</td><td><button id='newsupply'>新增供應商</button></td></tr>`;
                rows.forEach(element => {
                str += `<tr>`;
                str += `<td name='id'>` + element['id'] + `</td>`;
                str += `<td >` + element['name'] + `</td>`;
                str += `<td >` + element['pn'] + `</td>`;
                str += `<td >` + element['phone'] + `</td>`;
                str += `<td >` + element['address'] + `</td>`;
                str += `<td><button name='updatesupply'>修改</button><button name='deletesupply'>刪除</button></td>`;
                str += `</tr>`;
                    });
                str += `</table>`;
                document.getElementById("content").innerHTML=str;
                document.getElementById("newsupply").onclick = function(){ 
                    showInsertPageS();
                };
                const ids = document.getElementsByName("id");
                
                const updateButtons = document.getElementsByName("updatesupply");
                for(let i=0; i<updateButtons.length; i++){
                    updateButtons[i].onclick = function(){
                        showUpdatePageS(ids[i].innerText);
                    };
                }
                
                const deleteButtons = document.getElementsByName("deletesupply");
                for(let i=0; i<deleteButtons.length; i++){
                    deleteButtons[i].onclick = function(){
                        doDeleteS(ids[i].innerText);
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
