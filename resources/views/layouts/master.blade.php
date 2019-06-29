<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/master.css">
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  </head>
  <body>
    <div class="navbar w3-bar w3-green">
        <a href="/home" class="brand w3-bar-item w3-padding-16">Kopiqu</a>
        <a class ="li w3-bar-item w3-padding-32 " href="#">Category</a>
        <a class ="li w3-bar-item w3-padding-32 w3-right " href="#"><i class="fas fa-shopping-cart"></i></a>
        <a class ="li w3-bar-item w3-padding-32 w3-right" href="#">Login/Register</a>
      </div>
  </body>
  @yield('content')
  </html>