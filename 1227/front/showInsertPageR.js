import doInsertR from './doInsertR.js';

export default function showInsertPageR(){
    let str=`角色名字:<input type='text' id='name'><br>`;
    str+=`<button id='doinsertR'>新增</button>`;
    document.getElementById('content').innerHTML=str;
    document.getElementById('doinsertR').onclick=function(){
        doInsertR();
    };
};