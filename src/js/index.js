window.addEventListener('DOMContentLoaded', ()=>{
    require('cross-fetch/polyfill'); 
    const regeneratorRuntime = require("regenerator-runtime");
    "use strict";
   
    let delElement = require ('./moduls/delElement');
    let addElement = require('./moduls/addElement');
    addElement();
    delElement();    
   })