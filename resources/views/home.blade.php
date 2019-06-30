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
                <form class="w3-container w3-right form" action="">
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
    
@endsection