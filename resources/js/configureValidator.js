const $ = require("jquery");
const validator = require("jquery-validation");
const {validationRules} = require("./validationRules");
const {validationMessages} = require("./validationMessages");

module.exports = function configureValidator(pageVersion){//pageVersion can be desktop or mobile
  $("form[name=settings]").validate({
    rules: validationRules[pageVersion],
    messages: validationMessages[pageVersion],
    submitHandler: (form)=>{
      return false;
    },
    ignore: "",
    onfocusout: true
  });


  $.validator.addMethod("selectedDateIsOk", function(value, element){
    let currDate = new Date();
    let selectedDate = new Date(value);

    let currDay = currDate.getDate();
    let selectedDay = selectedDate.getDate();

    let currYear = parseInt(currDate.getFullYear(), 10);
    let currMonth = parseInt(currDate.getMonth() + 1, 10);

    let selectedYear = parseInt(selectedDate.getFullYear(), 10);
    let selectedMonth = parseInt(selectedDate.getMonth() + 1, 10);

    return this.optional(element) ||
      ( ( parseInt(currDate.valueOf(), 10) - parseInt(selectedDate.valueOf(), 10) ) >= 0 );

  }, "Обрана дата не коректна");


  //prevent user from selecting days like 31/02/2020 in mobile version of calendar
  $.validator.addMethod("dateIsValid", function(value, element){
    let day = $("#day").children("option:selected").val();
    let month = $("#month").children("option:selected").val();
    let year = $("#year").children("option:selected").val();

    day = parseInt(day, 10);
    month = parseInt(month, 10);
    year = parseInt(year, 10);

    let numDaysInMonth = parseInt(new Date(year, month, 0).getDate(), 10);
    if(day > numDaysInMonth) return false;

    return true;
  }, "Обрана дата не коректна");
}
