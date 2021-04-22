const $ = require("jquery");
const {monthNames} = require("./monthNames");

module.exports = function configureDatepicker(){
  $(".settings .datepicker").datepicker({
    dayNamesMin: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
    firstDay: 1,
    maxDate: new Date(),
    monthNames: monthNames,
    hideIfNoPrevNext: true,
    prevText: "",
    nextText: "",
    dateFormat: "dd.mm.yy",
    altFormat: "mm/dd/yy",
    altField: ".datepickerHidden",
  });

  $(".datepicker").change(function(){
    if($(".datepickerHidden").val() != "") $(".datepickerHidden").valid()
  });
}
