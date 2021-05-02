<?php

namespace App\Http\Controllers;
use App\Models\Cycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

include_once (app_path()."/Includes/detectMobile.php");

class CalendarController extends Controller
{
    private $isMobile;

    public function __construct(){
      $this->isMobile = isMobile();//checks if user is on mobile device
    }

    public function showCalendar(){
      return view("calendarPage.calendarPage")->with("isMobile", $this->isMobile);
    }

    public function saveCalendar(Request $request){
      if(Auth::user()){
        $validated = $request->validate([
          "prevCycleStart" => "required|date|max:10",
          "menstruationDuration" => "required|numeric|max:28"
        ]);
        $intendedToSaveDate = date_create($request->prevCycleStart);

        $latestSavedDate = date_create(Cycle::latest()->first()->menstruation_started);
        $latestSavedDuration = Cycle::latest()->first()->menstruation_duration;

        if($intendedToSaveDate < $latestSavedDate){
          return view("calendarPage.calendarPage", [
            "isMobile" => $this->isMobile,
            "warningMsg" => "Остання збережена дата більша ніж Ви намагаєтесь зберегти"
          ]);
        }
        
        $restrictionBound = intval($latestSavedDuration, 10) - 1;
        $restrictedDate = date_add($latestSavedDate, date_interval_create_from_date_string($restrictionBound." days"));//should be refactored

        if($intendedToSaveDate <= $restrictedDate){
          return view("calendarPage.calendarPage", [
            "isMobile" => $this->isMobile,
            "warningMsg" => "Згідно останніх збережених даних у Вас йде менструація до ".date_format($restrictedDate, "d/m/Y")//should be shown with error notification
          ]);
        }

        $cycle = new Cycle;
        $cycle->user_id = Auth::id();
        $cycle->menstruation_started = $request->prevCycleStart;
        $cycle->menstruation_duration = $request->menstruationDuration;
        $cycle->save();

        return view("calendarPage.calendarPage")->with("isMobile", $this->isMobile);//should add succes notification

      } else {
        return view("calendarPage.calendarPage", [
          "isMobile" => $this->isMobile,
          "warningMsg" => "Будь-ласка увійдіть для того щоб мати можливість зберігати дані Вашого циклу"
        ]);
      }
    }
}
