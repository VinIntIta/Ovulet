@php
$warningMsg = isset($warningMsg) ? $warningMsg : null
@endphp

@if(@isset($isMobile))
  <x-calendar.calendarPageMobile :warningMsg="$warningMsg"/>
@else
  <x-calendar.calendarPageDesktop :warningMsg="$warningMsg"/>
@endif
