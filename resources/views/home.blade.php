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
@endsection