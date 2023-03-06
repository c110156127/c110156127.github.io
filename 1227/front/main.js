//import需要的js檔
import employeeInfo from "./employeeInfo.js";
import productInfo from "./productInfo.js";
import roleInfo from "./roleInfo.js";
import supplyInfo from "./supplyInfo.js";

export default function startPage(){
    const sp = `
        <button id="employee">員工資料</button>
        <button id="product">產品資料</button>
        <button id="role">角色資料</button>
        <button id="supply">供應商</button>
        <div id="content"></div>
    `;
    document.getElementById("root").innerHTML = sp;
    document.getElementById("employee").onclick = function(){ 
        employeeInfo();
    };
    document.getElementById("product").onclick = function(){ 
        productInfo();
    };
    document.getElementById("role").onclick = function(){
        roleInfo();
    };
    document.getElementById("supply").onclick = function(){
        supplyInfo();
    };
}
