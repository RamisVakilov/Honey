
let addElement = () =>{
      
    let form = document.querySelector('.form__items');
    let inputs = form.getElementsByTagName('input');
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

  let  myPromise = (url)=>{//получение данных с серыера
             
                 fetch(url,{
                  method:'post'
                })
                    .then(function(response){
                      return response.json() //в json формате получаю данные
                    })
                    .then(function(data){//работа с данными которые я получил с сервера
                            console.log(data);
                          
                    })
      
    }


// ----------------------------------
    inputClear(inputs,textArea);//в начале очищаю
      
                            
    
    form.addEventListener('submit', formSend);

       async function formSend(event){//асинхронную функцию, которая возвращает promise
            event.preventDefault();
            if(inputCheck(inputs,textArea)){//если поля заполнены
               let formData = new FormData(form);
               inputClear(inputs,textArea);//и после отправки на сервер очищаю
               let response = await fetch('../../php/addData.php',{//создаю response(объект) который содержит запрос на сервер
                                        method:'POST',
                                        body: formData
                                        });
                                         
              if (response.ok && response.status == 200) { //После успешной отправки на сервер
              //Можно вставить этот элемент
               //myPromise('../../php/getdata.php');//получаю все данные
              
              }                         
            }
           
          
        }
  
  

}
module.exports = addElement;

