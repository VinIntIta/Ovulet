const $ = require("jquery");
const datepicker = require("jquery-ui/ui/widgets/datepicker.js");
const configureDatepicker = require("./configureDatepicker");
const validator = require("jquery-validation");
const configureValidator = require("./configureValidator");
const {monthNames} = require("./monthNames");
const {getNumDaysToPrevCycle, getNumDaysInMonth, getFirstDayPos} = require("./helpers");

$(document).ready(function(){
  let pageVersion = $(".calendarContainer").hasClass("mobile") ? "mobile" : "desktop";
  configureValidator(pageVersion);
  configureDatepicker();
  let currDate = new Date();
  setMonthYearToShow(currDate);
  buildCalendar(currDate);
  populateMobileSelectors();
});

let populateMobileSelectors = function(){
  let day = 1;
  let month = 1;
  let year = parseInt(new Date().getFullYear(), 10);

  while (day <= 31){
      $(".calendarContainer.mobile #day").append("<option value=" + day +">" + day + "</option>");
      day++;
  }

  while (month <= 12){
      $(".calendarContainer.mobile #month").append("<option value=" + month +">" + month + "</option>");
      month++;
  }

  $(".calendarContainer.mobile #year").append("<option value=" + year + ">" + year + "</option>");
  $(".calendarContainer.mobile #year").append("<option value=" + (year - 1) + ">" + (year - 1) + "</option>");
}

let mobileDateIsCorrect = function(){
  let day = $("#day").children("option:selected").val();
  let month = $("#month").children("option:selected").val();
  let year = $("#year").children("option:selected").val();

  if(day == "" || month == "" || year == "") return false;

  day = parseInt(day, 10);
  month = parseInt(month, 10);
  year = parseInt(year, 10);

  let numDaysInMonth = new Date(year, month - 1, 1);
  if(day > numDaysInMonth) return false;

  return true;
}

let getPrevCycleStartDate = function(){
  let day = $("#day").children("option:selected").val();
  let month = $("#month").children("option:selected").val();
  let year = $("#year").children("option:selected").val();

  if(day == "" || month == "" || year == "") return null;

  day = parseInt(day, 10);
  month = parseInt(month, 10);
  year = parseInt(year, 10);

  return new Date(year, month, day);
}

$(".calculateCalendar button").on("click", ()=>{

  if( !$("form[name=settings]").valid() ) return;

  let prevCycleStart = $(".datepickerHidden").val() ? new Date($(".datepickerHidden").val()) : getPrevCycleStartDate();
  let cycleDuration = $("#cycleDuration").children("option:selected").val();
  let menstruationDuration = $("#menstruationDuration").children("option:selected").val();
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

  setMonthYearToShow(date);
  buildCalendar(date, firstDayPos, cycleDuration, menstruationDuration);
});

$("monthSelector .prev").on("click", ()=>{
  let currMonth = $(".monthYear").data("month");
  let currYear = $(".monthYear").data("year");

  let prevMonth = currMonth === 0 ? 11 : currMonth - 1;
  let prevYear = currMonth === 0 ? currYear - 1 : currYear;
  let date = new Date(prevYear, prevMonth, 1);

  setMonthYearToShow(date);

  if($(".ovulationCalendar").hasClass("colorized")){
    let cycleDuration = $("#cycleDuration").children("option:selected").val();
    let menstruationDuration = $("#menstruationDuration").children("option:selected").val();
    cycleDuration = parseInt(cycleDuration, 10);
    menstruationDuration = parseInt(menstruationDuration, 10);

    let currMonthOvulationDate = $(".ovulationCalendar td.ovulation").last().html();
    currMonthOvulationDate = parseInt(currMonthOvulationDate, 10);

    let numDaysInPrevMonth = getNumDaysInMonth(date);
    let prevMonthOvulationDate = numDaysInPrevMonth - (cycleDuration - currMonthOvulationDate + 1);
    date = new Date(prevYear, prevMonth, prevMonthOvulationDate);//prev month ovulation date

    let firstDayPos = getFirstDayPos(cycleDuration, date);
    firstDayPos = parseInt(firstDayPos, 10);

    buildCalendar(date, firstDayPos, cycleDuration, menstruationDuration);
    return;
  }
  buildCalendar(date);
});

$("monthSelector .next").on("click", ()=>{
  let currMonth = $(".monthYear").data("month");
  let currYear = $(".monthYear").data("year");

  let nextMonth = currMonth === 11 ? 0 : currMonth + 1;
  let nextYear = currMonth === 11 ? currYear + 1 : currYear;
  let date = new Date(nextYear, nextMonth, 1);

  setMonthYearToShow(date);
  if($(".ovulationCalendar").hasClass("colorized")){
    let cycleDuration = $("#cycleDuration").children("option:selected").val();
    let menstruationDuration = $("#menstruationDuration").children("option:selected").val();
    cycleDuration = parseInt(cycleDuration, 10);
    menstruationDuration = parseInt(menstruationDuration, 10);

    let currMonthOvulationDate = $(".ovulationCalendar td.ovulation").first().html();
    currMonthOvulationDate = parseInt(currMonthOvulationDate, 10);

    date = new Date(nextYear, nextMonth, 0);
    let numDaysInThisMonth = getNumDaysInMonth(date);
    let nextMonthOvulationDate = cycleDuration - (numDaysInThisMonth - currMonthOvulationDate) + 1;
    date = new Date(nextYear, nextMonth, nextMonthOvulationDate);//next month ovulation date

    let firstDayPos = getFirstDayPos(cycleDuration, date);
    firstDayPos = parseInt(firstDayPos, 10);

    buildCalendar(date, firstDayPos, cycleDuration, menstruationDuration);
    return;
  }
  buildCalendar(date);
});

let setMonthYearToShow = function(date){
  let month = date.getMonth();
  let year = date.getFullYear();
  $(".monthSelector .monthYear")
    .text(monthNames[month] + ", " + year)
    .data("month", month)
    .data("year", year);
}

let buildCalendar = function(date, pos=null, cycleDuration=null, menstruationDuration=null) {
  let calendar = $(".ovulationCalendar tbody");
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

  if(pos) $(".ovulationCalendar").addClass("colorized");

  while(row < numWeeks) {
    html += "<tr>";
    while(day < 7) {

      if(!isCurrMonth && currDay == 1){
        isCurrMonth = true;
      }

      if (row === 0 && (currDay > numDaysInPrevMonth) ){
        isCurrMonth = true;
        currDay = 1;//should be done only for the first row
      }
      if ( (row === numWeeks - 1) && (currDay > numDaysInMonth) ){
        isCurrMonth = false;
        classToAdd="";
        currDay = 1;//should be done only for the last row
      }
      if(pos && isCurrMonth){

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

      if(pos && isCurrMonth){
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
