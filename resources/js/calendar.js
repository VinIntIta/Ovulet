const datepicker = require("./libs/jqueryUiCustom/jquery-ui");
const $ = require("jquery");
const validator = require("jquery-validation");
const {validationRules} = require("./validationRules");
const {validationMessages} = require("./validationMessages");

const monthNames = ["Січень", "Лютий", "Березень", "Квітень", "Травень",
  "Червень", "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень"
];

$(document).ready(function(){
  $("form[name=settings]").validate({
    rules: validationRules,
    messages: validationMessages,
    submitHandler: (form)=>{
      return false;
    }
  });
  let currDate = new Date();
  setMonthYearToShow(currDate);
  buildCalendar(currDate);
});

$(".settings .datepicker").datepicker({
  //dateFormat: "dd.mm.yy",
  dayNamesMin: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
  firstDay: 1,
  maxDate: new Date(),
  monthNames: monthNames,
  hideIfNoPrevNext: true,//what it does?
  prevText: "",
  nextText: "",
  dateFormat: "dd.mm.yy",
  altFormat: "mm/dd/yy",
  altField: ".datepickerHidden"
});

$.validator.addMethod("selectedDateIsOk", function(value, element){
  let currDate = new Date();
  let selectedDate = new Date(value);

  let currYear = parseInt(currDate.getFullYear(), 10);
  let currMonth = parseInt(currDate.getMonth() + 1, 10);

  let selectedYear = parseInt(selectedDate.getFullYear(), 10);
  let selectedMonth = parseInt(selectedDate.getMonth() + 1, 10);

  return this.optional(element) || (currYear >= selectedYear && currMonth >= selectedMonth);
}, "Обрана дата не коректна");

$(".calculateCalendar button").on("click", ()=>{
  let prevCycleStart = $(".datepickerHidden").val();
  let cycleDuration = $(".cycleDuration select").children("option:selected").val();
  let menstruationDuration = $(".menstruationDuration select").children("option:selected").val();
  console.log(prevCycleStart);

cycleDuration = parseInt(cycleDuration, 10);
menstruationDuration = parseInt(menstruationDuration, 10);

  let numDaysToPrevCycle = getNumDaysToPrevCycle(prevCycleStart);
  let daysToNextCycle = cycleDuration - (numDaysToPrevCycle - Math.floor(numDaysToPrevCycle/cycleDuration)*cycleDuration);

  let daysToNextOvulation;
  if(daysToNextCycle>=14){
    daysToNextOvulation = daysToNextCycle - 14;
  } else {
      daysToNextOvulation = daysToNextCycle + (cycleDuration - 14);
  }

  let date = new Date();
  date.setDate(date.getDate() + daysToNextOvulation);

  let firstDayPos = getFirstDayPos(cycleDuration, date);
  firstDayPos = parseInt(firstDayPos, 10);
  console.log(date);
  setMonthYearToShow(date);
  buildCalendar(date, firstDayPos, cycleDuration, menstruationDuration);
});

$(".leftArrow").on("click", ()=>{
  let currMonth = $(".monthYear").data("month");
  let currYear = $(".monthYear").data("year");

  let prevMonth = currMonth === 0 ? 11 : currMonth - 1;
  let prevYear = currMonth === 0 ? currYear - 1 : currYear;
  let date = new Date(prevYear, prevMonth, 1);

  setMonthYearToShow(date);
  buildCalendar(date);
});

$(".rightArrow").on("click", ()=>{
  let currMonth = $(".monthYear").data("month");
  let currYear = $(".monthYear").data("year");

  let nextMonth = currMonth === 11 ? 0 : currMonth + 1;
  let nextYear = currMonth === 11 ? currYear + 1 : currYear;
  let date = new Date(nextYear, nextMonth, 1);

  setMonthYearToShow(date);
  buildCalendar(date);
});

let getNumDaysToPrevCycle = function(prevCycleStart){//ok
  let msInDay = 24*60*60*1000;
  let prev = new Date(prevCycleStart).valueOf();
  let today = new Date().valueOf();
  return Math.floor( (today - prev)/msInDay );
}

let getNumDaysInMonth = function(date){
  let dateCopy = new Date(date.getTime());
  let year = dateCopy.getFullYear();
  let month = dateCopy.getMonth() + 1;

  return new Date(year, month, 0).getDate();
}

let getFirstDayPos = function(cycleDuration, nextOvulationStartDate){
  let dateCopy = new Date(nextOvulationStartDate.getTime());
  let nextOvulationStart = dateCopy.getDate();
  nextOvulationStart = parseInt(nextOvulationStart, 10);

  let daysInMonth = getNumDaysInMonth(dateCopy);
  daysInMonth = parseInt(daysInMonth, 10);
  let numFullCycles = Math.floor(nextOvulationStart/cycleDuration);

  return cycleDuration - (nextOvulationStart - numFullCycles*cycleDuration - 1) + 1;
}

let setMonthYearToShow = function(date){
  let month = date.getMonth();
  let year = date.getFullYear();
  $(".monthYear")
    .text(monthNames[month] + ", " + year)
    .data("month", month)
    .data("year", year);
}

let buildCalendar = function(date, pos=null, cycleDuration=null, menstruationDuration=null) {
  let calendar = $(".calendar tbody");
  calendar.html("");
  let numDaysInMonth = getNumDaysInMonth(date);

  let firstDay = new Date (date.getFullYear(), date.getMonth(), 1).getDay();//first day of the month
  if(firstDay === 0) firstDay = 7;

  let lastDay = new Date (date.getFullYear(), date.getMonth() + 1, 0).getDay();//last day of the month
  if(lastDay === 0) lastDay = 7;

  let daysToShowFromPrevMonth = firstDay - 1;
  let daysToShowFromNextMonth = 7 - lastDay;
  let numWeeks = (numDaysInMonth + daysToShowFromPrevMonth + daysToShowFromNextMonth) / 7;

  date.setMonth(date.getMonth() - 1);//previous month
  let numDaysInPrevMonth = getNumDaysInMonth(date);

  let currDay;
  if(firstDay != 1){
    currDay = numDaysInPrevMonth - firstDay + 2;
  } else {
    currDay = 1;
  }

  let row = 0;
  let day = 0;
  let isCurrMonth = false;
  let classToAdd ="";
  let html = "";

  while(row < numWeeks) {
    html += "<tr>";
    while(day < 7) {

      if (row === 0 && currDay > numDaysInPrevMonth){
        currMonth = true;
        currDay = 1;//should be done only for the first row
      }
      if ( (row === numWeeks - 1) && (currDay > numDaysInMonth) ){
        currMonth = false;
        classToAdd="";
        currDay = 1;//should be done only for the last row
      }
      if(pos && currMonth){

        if(pos == 1){//ovulation
          classToAdd="ovulation";
        }
        if(pos>1 && pos<5) {//favorableDays
          classToAdd="favorableDays";
        }
        if(pos>=5 && pos<12) {//conditionally safe days
          classToAdd="conditionallySafeDays";
        }
        if(pos>=12 && pos<15){//pms
          classToAdd="pms";
        }
        if(pos>=15 && pos<15+menstruationDuration){//mestruation
          classToAdd="menstruation";
        }

        if(pos==15+menstruationDuration){//safe sex
          classToAdd="safeSex";
        }

        if(pos>15+menstruationDuration && pos<cycleDuration-2){//conditionally safe days
          classToAdd="conditionallySafeDays";
        }

        if(pos>=cycleDuration-2 && pos <= cycleDuration){//favorable days
          classToAdd="favorableDays";
        }
        pos++;
        if(pos>cycleDuration) pos = 1;
      }

      if(pos && currMonth){
        html += "<td class='"+classToAdd+"'>" + currDay + "</td>"
      } else {
        html += "<td>" + currDay + "</td>"
      }

      day++;
      currDay++;
    }

    html += "</tr>";
    day = 0;
    row++;
  }
  calendar.append(html);
  html="";
}
