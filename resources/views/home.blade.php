@extends('layouts.master')
@section('title')
Welcome to Kopiqu
@endsection
@section('content')
<div class="w3-right w3-container w3-green" style="margin-top:10rem;padding-left:-1rem;margin-right:1rem;width:9rem;">
    <p style="font-size:20px">Search by categories</p>
    <form action="/home" method="post">
        <select name="cat">
            @foreach ($categories as $category)
                <option value="{{$category->id_category}}">{{$category->name}}</option>
            @endforeach
        </select>
        @csrf
        <input type="submit">
    </form><br>
</div>
    <div class="content">
        @foreach ($products as $product)
        @if ($product->quantity>0)
        <div class="w3-card-4 w3-margin " style="width:20%">
            <img src="/images/kopi.png" alt="">
            <div class="w3-container w3-green conta" style="height:40%">
                @if (!isset($role)&!isset($admin))
                    <p class="w3-left element" style="font-size:20px;">{{$product->name}}</p>
                    <br>
                    <div class="w3-left" style="overflow:auto;height:40%">
                        <p class="w3-left element" style="color:black;font-size:10px;">{{$product->description}}</p>
                    </div>
                    <br>
                    <p class="w3-right element" style="">Rp {{$product->price}}</p>
                    <br>
                    <form class="w3-container w3-right form" action="/addToCart" method="post">
                        <input  class="w3-left w3-green"type="number" value=1 name="quantity" min=1 max={{$product->quantity}} id="">
                        <input type="hidden" name="id_product" value="{{$product->id_product}}">
                            {{csrf_field()}}
                        <input type="submit" class="w3-button sbm w3-round-large w3-white w3-hover-black"  value="Order!">
                    </form>
                @else
                    @if ($role=="operation"||$role=="inventory")
                    <form class="w3-container w3-right form" action="/updateItem" method="post">
                        <input type="text" name="product_name" value="{{$product->name}}">
                        <br>
                        <input type="text" name="description" value="{{$product->description}}">
                        <br>
                        <input type="number" name="price" value="{{$product->price}}">
                        <br>
                        <input type="hidden" name="id_product" value="{{$product->id_product}}">
                            {{csrf_field()}}
                        <input type="submit" class="w3-button sbm w3-round-large w3-white w3-hover-black"  value="Update!">
                    </form>
                    <form action="/deleteItem" method="post">
                        @csrf
                        
                        <input type="hidden" name="id_product" value="{{$product->id_product}}">
                        <input type="submit" class="w3-button sbm w3-round-large w3-white w3-hover-black"  value="Delete!">
                    </form>
                    @endif
                
                @endif
            </div>
        </div>
        @else
        <div class="w3-card-4 w3-margin " style="width:20%">
                <img src="/images/kopi.png" alt="">
                <div class="w3-container w3-green conta" style="height:40%">
                    
                @if (!isset($role)&!isset($admin))
                    <p class="w3-left element" style="font-size:20px;">{{$product->name}}</p>
                    <br>
                    <div class="w3-left" style="overflow:auto;height:40%">
                        <p class="w3-left element" style="color:black;font-size:10px;">{{$product->description}}</p>
                    </div>
                    <br>
                    <p class="w3-right element" style="">Rp {{$product->price}}</p>
                    <br>
                    <form class="w3-container w3-right form" action="/addToCart" method="post">
                        <input  class="w3-left w3-green"type="number" value=1 name="quantity" min=1 max={{$product->quantity}} id="">
                        <input type="hidden" name="id_product" value="{{$product->id_product}}">
                            {{csrf_field()}}
                        <input type="submit" class="w3-button sbm w3-round-large w3-white w3-hover-black" disabled value="Out of Stock!">
                    </form>
                    @else
                    @if ($role=="operation"||$role=="inventory")
                    <form class="w3-container w3-right form" action="/updateItem" method="post">
                        <input type="text" name="product_name" value="{{$product->name}}">
                        <br>
                        <input type="text" name="description" value="{{$product->description}}">
                        <br>
                        <input type="number" name="price" value="{{$product->price}}">
                        <br>
                        <input type="hidden" name="id_product" value="{{$product->id_product}}">
                            {{csrf_field()}}
                        <input type="submit" class="w3-button sbm w3-round-large w3-white w3-hover-black"  value="Update!">
                    </form>
                    <form action="/deleteItem" method="post">
                        @csrf
                        
                        <input type="hidden" name="id_product" value="{{$product->id_product}}">
                        <input type="submit" class="w3-button sbm w3-round-large w3-white w3-hover-black"  value="Delete!">
                    </form>
                    
                    @endif  
                @endif
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
                  <input type="text" name="email" id=""><br>
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
        </div>
    @endif
    
@endsection