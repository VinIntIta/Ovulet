<?php

namespace App\Http\Controllers;

include_once (app_path()."/includes/detectMobile.php");

class CalendarController extends Controller
{
    public function showCalendar(){
      if (isMobile()) return view("calendarPageMobile");
      return view("calendarPage");
    }
}
