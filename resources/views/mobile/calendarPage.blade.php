<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Менструальний календар</title>
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
      <div class="content">
        <div class="calendarMobileRectTop"></div>

        <header style="height: 50px;"></header>

    		<div class="calendarContainer mobile">
          <nav class="breadcrump"></nav>
          <div class=splashImg>
            <img src="./images/calendarPage/mobile/depositphotos_209590120-stock-photo-beauty-portrait-smiling-young-topless1.jpg">
          </div>

          <section>
            <h1>Календар овуляції</h1>
            <p>Вагітність - це перш за все питання вибору правильного часу. Тільки в період овуляції організм жінки готовий до зачаття. За допомогою нашого калькулятора овуляції, Ви можете швидко встановити, коли у Вас відбувається овуляція і коли відповідно наступають сприятливі для зачаття дні.</p>
            <p><span class="textBold">Увага:<span> календар овуляції - це не метод контрацепції!</p>
          </section>


          <section class="settings">
            <h2>Перший день останньої менструації:</h2>
            <form name="settings">
              <div class="formInput">
                <legend>День</legend>
                <select id="day" name="day">
                  <option value=""></option>
                </select>
              </div>

              <div class="formInput">
                <legend>Місяць</legend>
                <select id="month" name="month">
                  <option value=""></option>
                </select>
              </div>

              <div class="formInput">
                <legend>Рік</legend>
                <select id="year" name="year">
                  <option value=""></option>
                </select>
              </div>

              <div class="formInput">
                <legend>Тривалість менстуації:</legend>
                <select id="menstruationDuration" ame="menstruationDuration">
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

              <div class="formInput">
                <legend>Тривалість циклу:</legend>
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
                <div>
                  кількість днів ( в середньому 28 днів, якщо Ви не знаєте точно, як довго йде Ваш цикл)
                </div>
              </div>

              <div class="formInput calculateCalendar">
                <button type="submit">Розрахувати</button>
              </div>
            </form>
          </section><!--settnigs end-->

          <section class="ovulationCalendar">
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
          </section>

          <section class="colorMeaning">
            <table>
              <tr>
                <td>
                  <span class="color menstruation"></span>
                  <span class="description"> — Менструація</span>
                </td>
                <td>
                  <span class="color favorableDays"></span>
                  <span class="description"> — Сприятливі для зачаття дні</span>
                </td>
                <td>
                  <span class="color safeSex"></span>
                  <span class="description"> — Безпечний секс</span>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="color ovulation"></span>
                  <span class="description">— Овуляція</span>
                <td>
                  <span class="color conditionallySafeDays"></span>
                   <span class="description">— Умовно безпечний секс</span>
                <td>
                  <span class="color pms"></span>
                   <span class="description">— Передменструальний синдром</span>
              </tr>
            </table>
          </section>
    		</div>
      </div><!--content end-->
    </body>
    <script type="text/javascript" src=./js/app.js></script>
</html>
