
<!DOCTYPE html>
<html lang="en">
  <x-layouts.head>
    <x-slot name="title">Calendar</x-slot>
  </x-layouts.head>
  <body>
    <x-layouts.header/>
  	<div>
      @if($isMobile==true)
        <x-calendar.calendarPageMobile message="{{$message ?? ''}}" class="{{$class ?? ''}}"/>
      @else
        <x-calendar.calendarPageDesktop message="{{$message ?? ''}}" class="{{$class ?? ''}}"/>
      @endif
    </div>
    <x-layouts.footer/>
  </body>
</html>
