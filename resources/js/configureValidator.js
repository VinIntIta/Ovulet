const $ = require("jquery");
const {validationRules} = require("./validationRules");
const {validationMessages} = require("./validationMessages");

module.exports = function configureValidator(pageVersion){//pageVersion can be desctop or mobile
  $("form[name=settings]").validate({
    rules: validationRules[pageVersion],
    messages: validationMessages[pageVersion],
    submitHandler: (form)=>{
      return false;
    },
    ignore: "",
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
}
