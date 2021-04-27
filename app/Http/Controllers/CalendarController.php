<?php

namespace App\Http\Controllers;
use App\Models\Cycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

include_once (app_path()."/includes/detectMobile.php");

class CalendarController extends Controller
{
    public function showCalendar(){
      if (isMobile()) return view("calendarPage.calendarPageMobile");
      return view("calendarPage.calendarPage");
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
        if(isMobile()) return view("calendarPage.calendarPageMobile");
        return view("calendarPage.calendarPage");
      } else {
        if(isMobile()) return view("calendarPage.calendarPageMobile")
          ->with("warningMsg", "Будь-ласка увійдіть для того щоб мати можливість зберігати дані Вашого циклу");
        return view("calendarPage.calendarPage")
          ->with("warningMsg", "Будь-ласка увійдіть для того щоб мати можливість зберігати дані Вашого циклу");
      }
    }
}
