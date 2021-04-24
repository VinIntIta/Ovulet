<?php

namespace App\Http\Controllers;

include (app_path()."/includes/detectMobile.php");

class CalendarController extends Controller
{
    public function showCalendar(){
      if (isMobile()) return view("calendarPageMobile");
      return view("calendarPageMobile");
    }
}
