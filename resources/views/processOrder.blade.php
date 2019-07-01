@extends('layouts.master')
@section('title')
Process Order
@endsection
@section('content')
<div class="content">
        @if(count($orders)!=0)
        <table class="w3-table-all w3-card-4 w3-center" style="margin-left:10rem;width:80%">
                <tr class="w3-green">
                  <th>Id Order</th>
                  <th>Id Customer</th>
                  <th>Amount</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id_order}}</td>
                    <td>{{$order->id_customer}}</td>
                    <td>{{$order->amount_to_be_paid}}</td>
                    <td>{{$order->address}}</td>
                    <td><form action="/processOrder" method="post">
                        @csrf
                        <input type="hidden" name="id_order" value="{{$order->id_order}}">
                        <input class="w3-button sbm w3-round-large w3-green w3-hover-black"type="submit" value="Finished">    
                    </form></td>
                </tr>
            @endforeach
              </table>
            @else
            <div class="w3-display-middle w3-container">
                <h1>No orders!</h1>  
            </div>
            @endif



</div>
@endsection