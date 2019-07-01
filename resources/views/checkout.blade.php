@extends('layouts.master')
@section('title')
Checkout
@endsection
@section('content')
<div class="content">
    <div class="w3-container" style="width:40%">
        <header class="w3-container w3-green" style="display:block;"> 
            <h1 class="w3-left">Final Step!</h1>
        </header>
        <br>
        <form action="/payment" method="post">
            <label class="w3-left"style="font-size:20px;margin-left:1rem   ">Fill your adress below</label>
            <div class="w3-container">
                    <input class="w3-left " style="margin:0;width:50%"type="text" name="address" id="">
                    @csrf
                    <br>
                    <br>
            <h2 class="w3-left">Amount to be paid : Rp {{$total}}</h2>
                    <br>
                    <br>
                    <br>
                    <input class="w3-left" type="submit" value="Order now!">
            </div>
            
        </form>
    </div>
</div>
@endsection