@extends('layouts.standard')
@section('content')

@foreach($products as $product)

 <div class="container">

  <div class="card mt-4">
            <div class="card-body">
            @if(  $product->image  != "null")
            <img class="img-fluid" src= {{url('/images')}}/<?php echo $product->image?>  >
            @else
            <img class="img-fluid" src= {{url('/images')}}/noimg.png  >

            @endif

              <h3 class="card-title">{{$product->name}}</h3>
              <h4>{{$product->price}} €</h4>
              <p class="card-text">{{$product->description}}</p>
              <h6>Disponibili: {{$product->quantity}} </h6>
              <h6>{{$product->link}} </h6>
              <h5>Inserito da: {{$product->user}} </h5>

@if( auth()->user()->email  == $product->user)
            <form method="POST" action="/removeProduct">
            {{ csrf_field() }}

              <button  name="remove" style="float:right" type="submit" class="btn btn-outline-danger">Rimuovi prodotto</button>
              <input type="hidden" name="name"  value="<?php echo $product->name;?>"/>
              <input type="hidden" name="image"  value="<?php echo $product->image;?>"/>



              </form>
@endif
            </div>
          </div>
</div>


    @endforeach
    @include('pezzi.formerrors')

@endsection
  


