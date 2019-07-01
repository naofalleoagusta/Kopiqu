@extends('layouts.master')
@section('title')
Welcome to Kopiqu
@endsection
@section('content')
    <div class="content">
        @foreach ($products as $product)
        @if ($product->quantity>0)
        <div class="w3-card-4 w3-margin ">
            <img src="/images/kopi.png" alt="">
            <div class="w3-container w3-green conta">
                <p class="w3-left element" style="font-size:20px;">{{$product->name}}</p>
                <br>
                <p class="w3-right element" style="">Rp {{$product->price}}</p>
                <br>
                <form class="w3-container w3-right form" action="/addToCart" method="post">
                    <input  class="w3-left w3-green"type="number" name="quantity" min=1 max={{$product->quantity}} id="">
                    <input type="hidden" name="id_product" value="{{$product->id_product}}">
                    {{csrf_field()}}
                    <input type="submit" class="w3-button sbm w3-round-large w3-white w3-hover-black"  value="Order!">
                </form>
            </div>
        </div>
        @else
        <div class="w3-card-4 w3-margin ">
            <img src="/images/kopi.png" alt="">
            <div class="w3-container w3-green conta">
                <p class="w3-left element" style="font-size:20px;">{{$product->name}}</p>
                <br>
                <p class="w3-right element" style="">Rp {{$product->price}}</p>
                <br>
                <form class="w3-container w3-right form" action="">
                    <input type="submit" class="w3-button w3-round-large w3-white w3-hover-black" disabled value="Out of Stock!">
                </form>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @if (!isset($name)&!isset($id))
    <div id="id01" class="w3-modal" >
            <div class="w3-modal-content w3-animate-top w3-card-4"style="width:40%;">
              <header class="w3-container w3-green"> 
                <span onclick="document.getElementById('id01').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <h2>Kopiqu</h2>
              </header>
              <div class="w3-container w3-center">
                <form action="/login" method="post">
                    <label for="">Email</label>
                    <br>
                  <input type="email" name="email" id=""><br>
                  <label for="">Password</label>
                  {{csrf_field()}}
                  <br>
                  <input type="password" name="password" id=""><br>
                  <br>
                  <input type="submit" value="Login!">
                </form>
                <br>
              </div>
              <footer class="w3-container w3-green">
                <p>&copy; Kopiqu 2019</p>
              </footer>
            </div>
    @endif
    
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
                <form action="/checkOut" method="post">
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
    
    @endif
@endsection