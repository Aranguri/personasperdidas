<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Personas Perdidas</title>
  <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/css/panel/style.css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="icon" href="{{ url('/') }}/favicon.ico" type="image/x-icon">
</head>
<body>
  @yield('content')
  <script type="text/javascript" src="{{ url('/') }}/js/jquery.min.js"></script>
  <script type="text/javascript" src="{{ url('/') }}/js/panel/main.js"></script>
  <script type="text/javascript" src="{{ url('/') }}/js/bootstrap.min.js"></script>
</body>
</html>
