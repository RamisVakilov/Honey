let elements = () =>{
    let items = document.querySelectorAll('.cards__items-item');
    let itemsClose = document.querySelectorAll('.cards-item__close');
   
    
  //------------------------- Отправляю данные на сервер
  const sendData = async (url, data, item) =>{
    const response = await fetch(url, {
      method:"POST",
      body:data,
        
    });
    if(response.ok){
        item.remove();//удаляю искомое сообщение
    }
  }
 
//--------------------------------------------------
    itemsClose.forEach(element => {
        element.addEventListener('click',(event)=>{
            let target = event.target;
            let item = target.parentElement.parentElement;
            let id = target.parentElement.parentElement.id.replace('#','');
            sendData('../../php/delElement.php',id,item);
        })
    });
} 
module.exports = elements;   
       
  

    
    

