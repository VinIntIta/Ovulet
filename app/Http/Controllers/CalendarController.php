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
      return view("calendarPage.calendarPageMobile");
    }

    public function saveCalendar(Request $request){
      if(Auth::user()){
        $validated = $request->validate([
          "prevCycleStart" => "required|date|max:10",
          "menstruationDuration" => "required|numeric|max:28"
        ]);
        $intendedToSave = date_create($request->prevCycleStart);
        $newestSaved = date_create(Cycle::latest()->first()->menstruation_started);

        if($intendedToSave < $newestSaved){
          return view("calendarPage.calendarPageMobile")//should be refactored
            ->with("warningMsg", "Остання збережена дата більша ніж Ви намагаєтесь зберегти");
        }
        $restricted = date_add($intendedToSave, date_interval_create_from_date_string($request->menstruationDuration." days"));
        if( $newestSaved <= $restricted){
          return view("calendarPage.calendarPageMobile")//should be refactored
            ->with( "warningMsg", "Згідно останніх збережених даних у Вас йде менструація до ".date_format($restricted, "d/m/Y") );
        }
        $cycle = new Cycle;
        $cycle->user_id = Auth::id();
        $cycle->menstruation_started = $request->prevCycleStart;
        $cycle->menstruation_duration = $request->menstruationDuration;
        $cycle->save();

        if(isMobile()) return view("calendarPage.calendarPageMobile");
        return view("calendarPage.calendarPageMobile");
      } else {
        if(isMobile()) return view("calendarPage.calendarPageMobile")
          ->with("warningMsg", "Будь-ласка увійдіть для того щоб мати можливість зберігати дані Вашого циклу");
        return view("calendarPage.calendarPage")
          ->with("warningMsg", "Будь-ласка увійдіть для того щоб мати можливість зберігати дані Вашого циклу");
      }
    }
}
