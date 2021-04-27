const $ = require("jquery");
const validator = require("jquery-validation");
const {validationRules} = require("./validationRules");
const {validationMessages} = require("./validationMessages");

module.exports = function configureValidator(pageVersion){//pageVersion is a string and can be desktop or mobile
  $("form[name=settings]").validate({
    rules: validationRules[pageVersion],
    messages: validationMessages[pageVersion],
    ignore: "",
    focusCleanup: true
  });

  //prevent users from selecting future dates
  $.validator.addMethod("dateIsNotFuture", function(value, element){
    let currDate = new Date();
    let selectedDate = new Date(value);

    return this.optional(element) ||
      ( ( parseInt(currDate.valueOf(), 10) - parseInt(selectedDate.valueOf(), 10) ) >= 0 );

  }, "Не можна обирати майбутні дати");


  //prevent user from selecting dates like 31/02/2020 in mobile version of calendar
  $.validator.addMethod("dateIsValid", function(value, element){
    let dateElements = value.split("/");
    if(dateElements.length != 3) return false;

    let year = dateElements[0];
    let month = dateElements[1];
    let day = dateElements[2];

    day = parseInt(day, 10);
    month = parseInt(month, 10);
    year = parseInt(year, 10);

    let numDaysInMonth = parseInt(new Date(year, month, 0).getDate(), 10);
    if(day > numDaysInMonth) return false;

    return true;
  }, "Обрана дата не коректна");
}
