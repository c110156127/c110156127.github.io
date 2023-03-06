import Request from "./Request.js";
import loginPage from "./doLogin.js";
export default function doSelect(){
    
}
Request().get("/index.php?action=getUser")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                //執行成功後的畫面處理
                const rows = response['result'];
                let str = '<table>';
                rows.forEach(element=>{
                    str+="<tr>";
                    str+="<td>"+element['id']+"</td>";
                    str+="<td>"+element['name']+"</td>";
                    str+="<td>"+element['phone']+"</td>";
                    str+="<td>"+element['home']+"</td>";
                    str+="</tr>";
                });
                str+='</table>';
                document.getElementById('content').innerHTML=str;
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