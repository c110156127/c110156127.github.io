import doInsertS from './doInsertS.js';

export default function showInsertPageS(){
    let str=`名字:<input type='text' id='name'><br>`;
    str+=`聯絡人:<input type='text' id='pn'><br>`;
    str+=`電話:<input type='text' id='phone'><br>`;
    str+=`地址:<input type='text' id='address'><br>`;
    str+=`<button id='doinsertR'>新增</button>`;
    document.getElementById('content').innerHTML=str;
    document.getElementById('doinsertR').onclick=function(){
        doInsertS();
    };
};