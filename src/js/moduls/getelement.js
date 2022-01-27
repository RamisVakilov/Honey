let elements = () =>{
    let items = document.querySelectorAll('.cards__items-item');
    let itemsClose = document.querySelectorAll('.cards-item__close');
   
    
  //------------------------- Отправляю данные на сервер
  const sendData = async (url, data) =>{
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
            item = target.parentElement.parentElement;
            let id = target.parentElement.parentElement.id.replace('#','');
            sendData('../../php/delElement.php',id);
        })
    });
} 
module.exports = elements;   
       
  

    
    

