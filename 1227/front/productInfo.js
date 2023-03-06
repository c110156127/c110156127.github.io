import showInsertPageP from "./showInsertPageP.js";
import showUpdatePageP from "./showUpdatePageP.js";
import doDeleteP from "./doDeleteP.js";
import Request from "./Request.js";
import loginPage from "./doLogin.js";
export default function productInfo(){
    Request().get("/index.php?action=getproducts")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
            //執行成功後的畫面處理
            const rows = response['result'];
            let str = `<table>`;
            str += `<tr><td>產品編號</td><td>產品名字</td><td>產品成本</td><td>產品售價</td><td>數量</td><td><button id='newproduct'>新增產品</button></td></tr>`;
            rows.forEach(element => {
            str += `<tr>`;
            str += `<td name='id'>` + element['id'] + `</td>`;
            str += `<td>` + element['name'] + `</td>`;
            str += `<td>` + element['cost'] + `</td>`;
            str += `<td>` + element['price'] + `</td>`;
            str += `<td>` + element['quantity'] + `</td>`;
            str += `<td><button name='updateproduct'>修改</button><button name='deleteproduct'>刪除</button></td>`;
            str += `</tr>`;
                });
            str += `</table>`;
            document.getElementById("content").innerHTML=str;
            document.getElementById("newproduct").onclick = function(){ 
                showInsertPageP();
                };
            const ids = document.getElementsByName("id");
            
            const updateButtons = document.getElementsByName("updateproduct");
            for(let i=0; i<updateButtons.length; i++){
                updateButtons[i].onclick = function(){
                showUpdatePageP(ids[i].innerText);
                    };
                }
                
            const deleteButtons = document.getElementsByName("deleteproduct");
            for(let i=0; i<deleteButtons.length; i++){
                deleteButtons[i].onclick = function(){
                    doDeleteP(ids[i].innerText);
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
