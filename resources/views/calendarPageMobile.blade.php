<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Менструальний календар</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
      <div class="content">
        <div class="calendarMobileRectTopBig"></div>
        <div class="calendarMobileRectTopSmall"></div>

        <header style="height: 50px;"></header>

    		<div class="calendarContainer mobile">
          <nav class="breadcrump"></nav>
          <div class=splashImg>
            <img src="../images/calendarPage/smilingGirl.jpg">
          </div>

          <section class="intro">
            <h1>Календар овуляції</h1>
            <p>Вагітність - це перш за все питання вибору правильного часу. Тільки в період овуляції організм жінки готовий до зачаття. За допомогою нашого калькулятора овуляції, Ви можете швидко встановити, коли у Вас відбувається овуляція і коли відповідно наступають сприятливі для зачаття дні.</p>
            <p class="caution"><span class="textBold">Увага:</span> календар овуляції - це не метод контрацепції!</p>
          </section>


          <section class="settings">
            <h2>Перший день останньої менструації:</h2>
            <form name="settings">
              <div class="prevCycle">
                <input class="datepickerHidden" name="prevCycleStart" value="" type="hidden" autocomplete="off">
              </div>
              <div class="formInput">
                <legend>День</legend>
                <div class="dropdown">
                  <select id="day" name="day">
                    <option value=""></option>
                  </select>
                </div>
              </div>

              <div class="formInput">
                <legend>Місяць</legend>
                <div class="dropdown">
                  <select id="month" name="month">
                    <option value=""></option>
                  </select>
                </div>
              </div>

              <div class="formInput">
                <legend>Рік</legend>
                <div class="dropdown">
                  <select id="year" name="year">
                    <option value=""></option>
                  </select>
                </div>
              </div>

              <div class="formInput">
                <legend>Тривалість менстуації:</legend>
                <div class="dropdown">
                  <select id="menstruationDuration" name="menstruationDuration">
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4" selected>4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                  </select>
                </div>
              </div>

              <div class="formInput">
                <legend>Тривалість циклу:</legend>
                <div class="dropdown">
                  <select id="cycleDuration" name="cycleDuration">
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28" selected>28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                    <option value="34">34</option>
                    <option value="35">35</option>
                  </select>
                </div>
              </div>

              <div class="formInput">
                кількість днів ( в середньому 28 днів, якщо Ви не знаєте точно, як довго йде Ваш цикл)
              </div>
            </form>
          </section><!--settnigs end-->

          <section class="ovulationCalendar">
            <div class="formInput calculateCalendar">
              <button type="button" form="settings">Розрахувати</button>
            </div>

            <section class="monthSelector">
              <div class="prev"></div>
              <div class="monthYear"></div>
              <div class="next"></div>
            </section>

            <table>
              <thead>
                <tr>
                  <th>Пн</th>
                  <th>Вт</th>
                  <th>Ср</th>
                  <th>Чт</th>
                  <th>Пт</th>
                  <th>Сб</th>
                  <th>Нд</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
            <div class="formInput calculateCalendar">
              <button type="submit" form="settings" id="saveButton" disabled>Зберегти</button>
            </div>
          </section>

          <section class="colorMeaning">
            <ul>
              <li>
                <span class="color menstruation"></span>
                <span class="description">Менструація</span>
              </li>
              <li>
                <span class="color favorableDays"></span>
                <span class="description">Сприятливі для зачаття дні</span>
              </li>
              <li>
                <span class="color safeSex"></span>
                <span class="description">Безпечний секс</span>
              </li>
              <li>
                <span class="color ovulation"></span>
                <span class="description">Овуляція</span>
              </li>
              <li>
                <span class="color conditionallySafeDays"></span>
                <span class="description">Умовно безпечний секс</span>
              </li>
              <li>
                <span class="color pms"></span>
                <span class="description">Передменструальний синдром</span>
              </li>
            </ul>
          </section>
    		</div>
      </div><!--content end-->
    </body>
    <script type="text/javascript" src="./js/app.js"></script>
</html>
