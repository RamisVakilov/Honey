<?php 
   include 'php/connection_base.php';
   $sql = "SELECT * FROM mybase_table";
                    $result = $mysqli->query($sql);//Получаю все содержимое таблицы
                    $mysqli->close();
                    
                    
        /* получение массива объектов */
                    function converter($object){
                        $arrNum = [];
                         $index = 0;
                        foreach($object as $arr){
                            $arrNum[$index] = $arr;
                            $index++;        
                        }
                        return $arrNum;
                    }
         $myarr = converter($result);            
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HoneyHunters</title>
    <link rel="stylesheet" href="dist/css/my.css">
    
</head>
<body>
    <section class="form">
        <div class="container">
            <img src="dist/img/лого 1.svg" alt="Логотип" class="header__logo"> 
            <img src="dist/img/__ Contact Icon __ 1.svg" alt="Почтовый конверт" class="form__contact">
            <form  class="form__items" >
                
                <div class="form__name">
                    <label for="name" class='form__label'>Имя
                        <input maxlength="10" class="form__input" name='name' type="text"  required>
                    </label>
                    
                    <label for="email" class='form__label'>E-mail
                        <input maxlength="25" class="form__input" name='email' type="email"  required>
                    </label>
                    
                </div>
                
                <div class="form__coment"><!--ПРавай часть -->
                    <label for="name" class='form__label'>Комментарий
                        <textarea  maxlength="40" class="form__textarea" name="textarea" cols="30" rows="10" required></textarea>
                    </label>
                    
                    <button class="form__btn" type="submit">Записать</button>
                </div>
                
            </form>
        </div>
      
    </section>
    <!-- -------------- -->
    <section class="cards">
        <div class="container">
            <h2 class="cards__title">Выводим комментарии</h2>
            <div class="cards__items">
               
            <!-- В обратном порядке вывожу -->
            <?php $length = count($myarr);?>
                         <?php   for($i = $length-1; $i>=0; $i--){?>

                            <div id="#<?php echo $myarr[$i]['id']?>" class="cards__items-item ">
                                <div class="title__wrap <?php
                                     if(($myarr[$i]['id'] % 2) == false ) echo 'title__wrap_second';
                                            
                                    ?>
                                ">
                                    <h3 class="cards-item__title"><?php echo $myarr[$i]['name']?></h3>
                                    <div class="cards-item__close">&times</div>
                                </div>
                                <div class="info__wrap">
                                    <p class="cards-item__mail <?php
                                        if(($myarr[$i]['id'] % 2) == false ) echo 'cards-item__mail_second';
                                    ?>">
                                    <?php echo $myarr[$i]['mail']?></p>
                                    <p class="cards-item__message">
                                        <?php echo $myarr[$i]['message']?>
                                    </p>
                                </div>
                            </div>

                           <?php } ?>
                
                <!-- ------------- -->
                
             </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <img src="dist/img/лого 2 1.svg" alt="Логотип" class="footer__logo">
            <div class="footer__social">
                <a href="#!">
                    <img src="dist/img/vk.svg" alt="ВК">
                </a>
                <a href="#!">
                    <img src="dist/img/fb.svg" alt="FaceBook">
                </a>
                
            </div>
        </div>
          
    </footer>
<script src="dist/js/index.js"></script>
</body>
</html>