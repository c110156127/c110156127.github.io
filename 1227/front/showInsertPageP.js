import doInsertP from './doInsertP.js';

export default function showInsertPageP(){
    let str=`產品編號:<input type='text' id='id'><br>`;
    str+=`產品名字:<input type='text' id='name'><br>`;
    str+=`產品成本:<input type='text' id='cost'><br>`;
    str+=`產品售價:<input type='text' id='price'><br>`;
    str+=`數量:<input type='text' id='quantity'><br>`;
    str+=`<button id='doinsertP'>新增</button>`;
    document.getElementById('content').innerHTML=str;
    document.getElementById('doinsertP').onclick=function(){
        doInsertP();
    };
};