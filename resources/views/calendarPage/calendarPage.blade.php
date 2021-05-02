@php
  $warningMsg = isset($warningMsg) ? $warningMsg : null;
@endphp

<!DOCTYPE html>
<html lang="en">
  <x-layouts.head>
    <x-slot name="title">Calendar</x-slot>
  </x-layouts.head>
  <body>
    <x-layouts.header/>
  	<div>
      @if(@isset($isMobile))
        <x-calendar.calendarPageMobile :warningMsg="$warningMsg"/>
      @else
        <x-calendar.calendarPageDesktop :warningMsg="$warningMsg"/>
      @endif
    </div>
    <x-layouts.footer/>
  </body>
</html>
