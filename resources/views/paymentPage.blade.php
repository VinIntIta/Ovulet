<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Оплата</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
      <header style="height: 200px;"></header>
      <div class="content">
        <div class="paymentCircle"></div>
        <div class="paymentRectLeftBig"></div>
        <div class="paymentRectLeftSmall"></div>
        <div class="paymentRectRightBig"></div>
        <div class="paymentRectRightSmall"></div>

    		<div class="paymentContainer">
    		  <form name="paymentForm" class="paymentForm" method="post" action="{{$url}}" accept-charset="utf-8">
    			 <div class="inputWrapper">
    				<legend>Введіть ваш і-мейл</legend>
    				<input name="email" type="email" placeholder="E-email">
    			 </div>
    			 <div class="inputWrapper">
    				<legend>Сума оплати</legend>
    				<input name="amount" type="number" value="20" disabled>
    			 </div>
    			 <div class="inputWrapper photoUpload">
             <legend>Завантажити фото зразку:</legend>
              <div class="uploadWrapper">
                <div class="drag">
                  <div class="dragArea">
                    <img src="../images/paymentPage/upload.svg" alt="upload file icon">
                  </div>
                  <div class="or">-або-</div>
                </div>
                <div>
                  <input name="photo" type="file" id="upload">
                  <button type="button" class="upload" >Вибрати фото з вашого ПК</button>
                </div>
              </div>
    			 </div>
    			 <div class="inputWrapper payment"><!--payment start-->
    				<legend>Виберіть спосіб оплати</legend>
            <div class="paymentMethods">
              <div class="withCard">
                <label>
                  <input name="payOption" type="radio" id="withCard" value="card" checked>
                  Кредитна або дебетова карта
                </label>
                <div class="paymentIcons">
                  <img src="./images/paymentPage/discover.svg" alt="discover icon">
                  <img src="./images/paymentPage/visa.svg" alt="visa icon">
                  <img src="./images/paymentPage/americanExpress.svg" alt="american express icon">
                  <img src="./images/paymentPage/mastercard.svg" alt="master card icon">
                </div>
              </div>
              <div class="card"><!--card start-->
                <div class="frontSide"><!--frontSide start-->
                  <div class="numberGroup">
                    <div class="numberText">Номер карти</div>
                    <input class="number" id="ccn" autocomplete="off" placeholder="1111   2222   3333   4444" type="tel" inputmode="numeric"  maxlength="19">
                  </div>

                  <div class="validThroughGroup">
                    Строк дії
                    <div class="monthYear">
                      <div class="month">
                        <input autocomplete="off" placeholder="01"  type="number" minlength="1" maxlength="2" min="00" max="12">
                      </div>
                      /
                      <div class="year">
                        <input autocomplete="off" placeholder="21"  type="number" minlength="2" maxlength="2" min="21" max="99">
                      </div>
                    </div>
                  </div>

                  <div class="nameGroup">
                    <span class="name">Ім'я</span>
                    <input autocomplete="off" placeholder="petro poroshenko" class="nameInput" type="text">
                    <img src="./images/paymentPage/visa.svg" alt="visa icon">
                  </div>
                </div><!--frontSide end-->

                <div class="rearSide">
                  <div class="magnetStrip"></div>
                  <div class="cw">
                    <div class="cwText">CW/CVC</div>
                    <input type="number" placeholder="222" autocomple="off">
                  </div>
                  <div class="securePayment">
                    <img src="./images/paymentPage/locked.svg">
                    <span>Безпечний платіж</span>
                  </div>
                </div>
              </div><!--card end-->
              <div class="withPaypal">
                  <label>
                    <input name="payOption" type="radio" id="withPaypal" value="paypal">
                    PayPal
                  </label>
                  <img src="./images/paymentPage/paypal.svg">
              </div>
              <div class="inputWrapper termsOfUse">
               <button type="submit">Сплатити</button>
               <span>Натискаючи кнопку “Сплатити” ви погоджуєтесь з умовами <a href="#">договору-оферти</a></span>
              </div>
            </div>
          </div><!--payment end-->

          <!--here we add liqpay api to allow user to make payments for our service-->
          <input type="hidden" name="data" value="{{$data}}"/>
          <input type="hidden" name="signature" value="{{$signature}}"/>
          <!--end of adding liqpay api-->
    		  </form>
    		</div><!--payment container end-->
      </div><!--content-->

    </body>
    <script type="text/javascript" src="./js/app.js"></script>
</html>
