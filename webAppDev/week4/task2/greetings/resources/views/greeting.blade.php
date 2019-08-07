<!DOCTYPE html>
<html>
  <head>
    <title>Greeting</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{asset('css/wp.css')}}">
  </head>
  
  <body>  
    <p>
    Hello {{$name}}.
    Next year, you will be {{$age + 1}} years old.
    <hr>
  </body>
</html>
