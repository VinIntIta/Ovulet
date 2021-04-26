<?php

namespace App\Http\Controllers;
use App\Models\Cycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

include_once (app_path()."/includes/detectMobile.php");

class CalendarController extends Controller
{
    public function showCalendar(){
      if (isMobile()) return view("calendarPageMobile");
      return view("calendarPage");
    }

    public function saveCalendar(Request $request){
      if(Auth::user()){
        $validated = $request->validate([
          "prevCycleStart" => "required|date|max:10",
          "menstruationDuration" => "required|numeric|max:28"
        ]);
        $cycle = new Cycle;
        $cycle->user_id = Auth::id();
        $cycle->menstruation_started = $request->menstruation_started;
        $cycle->menstruation_duration = $request->menstruationDuration;
        $cycle->save();
        return view("calendarPage");
      } else {
        return view("calendarPage");//should be refactored
          //->with("error", "Будь-ласка увійдіть для того щоб мати можливість зерігати дані Вашого циклу");
      }
    }
}
