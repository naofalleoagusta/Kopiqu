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
        
        
        
          @if (isset($name)&isset($id))
          <a class ="li w3-bar-item w3-padding-32 w3-right " onclick="document.getElementById('id02').style.display='block'" href="#"><i class="fas fa-shopping-cart"></i>Cart</a>
          <a class ="li w3-bar-item w3-padding-32 w3-right" href="/logout">Logout</a>
          <a class ="li w3-bar-item w3-padding-32 w3-right" style=" cursor: pointer;" onclick="">Welcome, {{$name}}!</a>
          @elseif(isset($admin)&isset($role))
          
          <a class ="li w3-bar-item w3-padding-32 w3-right" href="/logout">Logout</a>
          @if ($role=="operation"||$role=="processor")
          <a class ="li w3-bar-item w3-padding-32 w3-right" href="/processOrder" style=" cursor: pointer;" onclick="">Process Order</a>
          @endif
          <a class ="li w3-bar-item w3-padding-32 w3-right" style=" cursor: pointer;" onclick="">Welcome, {{$admin}}!</a>
          
          @else
          <a class ="li w3-bar-item w3-padding-32 w3-right " onclick="document.getElementById('id02').style.display='block'" href="#"><i class="fas fa-shopping-cart"></i>Cart</a>
          <a class ="li w3-bar-item w3-padding-32 w3-right" style=" cursor: pointer;" onclick="document.getElementById('id01').style.display='block'">Login/Register</a>
          @endif
      </div>
  </body>
  @yield('content')
  
  @if (isset($cart))
    <div id="id02" class="w3-modal" >
            <div class="w3-modal-content w3-animate-top w3-card-4"style="width:40%;">
              <header class="w3-container w3-green"> 
                <span onclick="document.getElementById('id02').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <h2>Shopping Cart</h2>
              </header>
              <div class="w3-container w3-left w3-white" style="width:100%">
                  @php
                    $total=0;
                  @endphp   
                  <div class="w3-container" style="height:300px;overflow: auto;">
                    @foreach ($cart as $key=>$value)
                        <h2>{{$key}}</h2>
                        @foreach ($value as $keys=>$values)
                            @if (strcmp($keys,'id_product')!=0)
                                @if ($keys=='total')
                                    @php
                                        $total+=$item[$keys]=$values
                                    @endphp
                                    
                                    {{$keys}} : Rp {{$item[$keys]=$values}}
                                @else
                                    {{$keys}} : {{$item[$keys]=$values}}
                                @endif
                                    <br>
                            @endif
                        @endforeach 
                        
                        <hr style="border:1px solid black">
                @endforeach
            </div>
                <br>
                <h2>Total to be paid : Rp {{$total}}</h2>
                <form action="/checkOut" method="get">
                <input type="hidden" name="total" value="{{$total}}">
                    {{csrf_field()}}
                    <input type="submit" class="w3-button sbm w3-round-large w3-green w3-hover-black" value="Checkout!">
                </form>
                <br>
                <br>
              </div>
              <footer class="w3-container w3-green">
                <p>&copy; Kopiqu 2019</p>
              </footer>
            </div>
    
          </div>
    @else
    <div id="id02" class="w3-modal" >
            <div class="w3-modal-content w3-animate-top w3-card-4"style="width:40%;">
              <header class="w3-container w3-green"> 
                <span onclick="document.getElementById('id02').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <h2>Shopping Cart</h2>
              </header>
              <div class="w3-container w3-left w3-white" style="width:100%">
                  <h2>Your Shopping Cart is Empty!</h2>
                  
            </div>
              <footer class="w3-container w3-green">
                <p>&copy; Kopiqu 2019</p>
              </footer>
    
        
        </div>
    </div>
          
    @endif
  </html>