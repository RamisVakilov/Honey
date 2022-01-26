

window.addEventListener('DOMContentLoaded', function(){
  "use strict"
  require('cross-fetch/polyfill'); 

  const regeneratorRuntime = require("regenerator-runtime");
    
    let form = document.querySelector('.form__items');
    let inputs = form.getElementsByTagName('input');
    window.data ={};//глобальный обьект, данные с сервера будут храниться 
    let textArea = form.getElementsByTagName('textarea');
    let inputClear = (items,area)=>{//очистка input и textarea
      for(let i=0;i<items.length; i++ ){
          items[i].value ='';
       }
       area[0].value='';
    }
    let inputCheck = (items, area)=>{//проверка на заполнение всех inputs
      for(let i=0;i<items.length; i++ ){
           if ((items[i].value == '') ||(area[0].value =='')) {
             
              return false;
              break;
          }
          else if((items[i].value != '') && (area[0].value !='')){
           
             return true;
              break;
          }
      }

    }
    inputClear(inputs,textArea);//в начале очищаю
    
    
                            
    
    form.addEventListener('submit', formSend);

       async function formSend(event){//асинхронную функцию, которая возвращает promise
            event.preventDefault();
            if(inputCheck(inputs,textArea)){//если поля заполнены
               let formData = new FormData(form);
               inputClear(inputs,textArea);//и после отправки на сервер очищаю
               let response = await fetch('../../php/server.php',{//создаю response(объект) который содержит запрос на сервер
                                        method:'POST',
                                        body: formData
                                        });
                                         
              if (response.ok && response.status == 200) { //После успешной отправки на сервер
              //получаю последний элемент из таблицы
                fetch('../../php/getdata.php',{
                  method:'post'
                })
                    .then(function(response){
                      return response.json() //в json формате получаю данные
                    })
                    .then(function(data){//работа с данными которые я получил с сервера
                        window.data = data;//занес данные в глобальный обьект
                        
                    })
              }                         
            }
           
          
        }
  
  
});

