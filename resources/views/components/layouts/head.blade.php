<head>
  <title>{{config("app.name", "Ovulet")}} @isset($title){{"|"}} {{$title}}@endisset</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script defer type="text/javascript" src=./js/app.js></script>
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
