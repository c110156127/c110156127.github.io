import showInsertPage from "./showInsertPage.js";
import showUpdatePage from "./showUpdatePage.js";
import doDelete from "./doDelete.js";
import Request from "./Request.js";
import loginPage from "./doLogin.js";
export default function employeeInfo(){
    Request().get("/index.php?action=getUsers")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                //執行成功後的畫面處理
                const rows = response['result'];
                let str = `<table>`;
                str += `<tr><td>員工編號</td><td>名字</td><td>電話</td><td>住址</td><td><button id='newUser'>新增使用者</button></td></tr>`;
                rows.forEach(element => {
                str += `<tr>`;
                str += `<td name='id'>` + element['id'] + `</td>`;
                str += `<td>` + element['name'] + `</td>`;
                str += `<td>` + element['phone'] + `</td>`;
                str += `<td>` + element['home'] + `</td>`;
                str += `<td><button name='updateUser'>修改</button><button name='deleteUser'>刪除</button></td>`;
                str += `</tr>`;
                    });
                str += `</table>`;
                document.getElementById("content").innerHTML=str;
                document.getElementById("newUser").onclick = function(){ 
                    showInsertPage();
                };
                const ids = document.getElementsByName("id");
               
               const updateButtons = document.getElementsByName("updateUser");
                for(let i=0; i<updateButtons.length; i++){
                    updateButtons[i].onclick = function(){
                        showUpdatePage(ids[i].innerText);
                    };
                }
                
                const deleteButtons = document.getElementsByName("deleteUser");
                for(let i=0; i<deleteButtons.length; i++){
                    deleteButtons[i].onclick = function(){
                        doDelete(ids[i].innerText);
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
///
///    axios.get("http://localhost/1220/public/index.php?action=getUsers")
//    .then(res =>{
//        let response = res['data'];
//        switch(response['status']){
//            case 200:
//                
//                
//                break;
//            default:
//                document.getElementById('content').innerHTML = response['message'];
//                break;
//        }
//    })
//    .catch(err =>{
//        document.getElementById('content').innerHTML = err;
//    })
    ///