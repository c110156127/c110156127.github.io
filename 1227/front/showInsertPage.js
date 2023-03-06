import doInsert from './doInsert.js';

export default function showInsertPage(){
    let str=`編號:<input type='text' id='id'><br>`;
    str+=`名字:<input type='text' id='name'><br>`;
    str+=`電話:<input type='text' id='phone'><br>`;
    str+=`住址:<input type='text' id='home'><br>`;
    str+=`<button id='doinsert'>新增</button>`;
    document.getElementById('content').innerHTML=str;
    document.getElementById('doinsert').onclick=function(){
        doInsert();
    };
};