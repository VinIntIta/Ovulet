let getNumDaysToPrevCycle = function(prevCycleStart){
  let msInDay = 24*60*60*1000;
  let prev = prevCycleStart.valueOf();//prevCycleStart is a Date object
  let today = new Date().valueOf();
  return Math.floor( (today - prev)/msInDay );
}

let getNumDaysInMonth = function(date){
  let dateCopy = new Date(date.getTime());
  let year = dateCopy.getFullYear();
  let month = dateCopy.getMonth() + 1;

  return parseInt(new Date(year, month, 0).getDate(), 10);
}

let getFirstDayPos = function(cycleDuration, nextOvulationStartDate){
  let dateCopy = new Date(nextOvulationStartDate.getTime());
  let nextOvulationStart = dateCopy.getDate();
  nextOvulationStart = parseInt(nextOvulationStart, 10);

  let daysInMonth = getNumDaysInMonth(dateCopy);
  let numFullCycles = Math.floor(nextOvulationStart/cycleDuration);

  return cycleDuration - (nextOvulationStart - numFullCycles*cycleDuration - 1) + 1;
}

module.exports.getNumDaysToPrevCycle = getNumDaysToPrevCycle;
module.exports.getNumDaysInMonth = getNumDaysInMonth;
module.exports.getFirstDayPos = getFirstDayPos;
