<div class="content">
  <div class="calendarRectLeftBottom"></div>
  <div class="calendarRectRightCenter"></div>
  <header style="height: 200px;"></header>

	<div class="calendarContainer">
    @if(@isset($message))<x-message :class="$class" :message="$message"/>@endif
    <h1>Менструальний календар</h1>

    <section class="settings">
      <form name="settings">
        <div class="formInput prevCycle">
          <legend>День першого дня менструації попереднього<br>циклу:</legend>
          <input class="datepicker" type="text"  autocomplete="off" readonly placeholder="дд.мм.рр">
          <input class="datepickerHidden" name="prevCycleStart" value="" type="hidden" autocomplete="off">
        </div>

        <div class="formInput">
          <legend>Тривалість<br>циклу:</legend>
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

        <div class="formInput">
          <legend>Тривалість<br>менстуації:</legend>
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

        <div class="formInput calculateCalendar">
          <button type="button">Розрахувати</button>
        </div>
      </form>
    </section><!--settnigs end-->

    <section class="monthSelector">
      <div class="prev"></div>
      <div class="monthYear"></div>
      <div class="next"></div>
    </section>

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

    <section>
      <div class="history unfolded">
        <span>Історія розрахунку календаря</span>
        <div>
          <input type="text" disabled value="15/05/2019">
          <button type="button">Переглянути результат</button>
        </div>
      </div>
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

    <section class="explanation">
      <article>
        <h2>Що показує калькулятор?</h2>
        <p>
          За допомогою нашого інструменту майбутні мами можуть розрахувати термін вагітності без допомоги лікаря. Завдяки онлайн-калькулятору ви зможете визначити, на який акушерської тижня і місяці ви перебуваєте в даний момент. Майбутній мамі необхідно знати термін виношування, щоб стежити за показниками розвитку плода, планувати візити до лікаря і розуміти приблизні дати пологів.
        </p>
      </article>

      <article>
        <h2>Як проводиться розрахунок?</h2>
        <p>
          У гінекології прийнято відраховувати термін виношування з першого дня останньої менструації, не залежно від того, в який день жіночого циклу відбулося зачаття. Ця дата відповідає акушерському календарем. Справа в тому, що не завжди відомо в який момент циклу сталася овуляція, а значить і запліднення. Вкажіть дату дня початку менструації, що передує зачаття. Введіть значення дня, місяця і року до відповідних поля і натисніть кнопку «Підрахувати». Калькулятор працює в он-лайн режимі, результат буде отримано миттєво.
        </p>
        <p>
          Розрахунок вагітності по тижнях, в більшості випадків, збігається з даними УЗД та укладенням лікаря. Як правило, малюк розвивається відповідно до цього показником. Розрахувати більш точний термін вам допоможе спостерігає лікар.
        </p>
      </article>
    </section>
	</div>
</div><!--content end-->
