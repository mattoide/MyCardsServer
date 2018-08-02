@extends('layouts.standard')
@section('content')

@foreach($products as $product)

 <div class="container">

  <div class="card mt-4">
          <!--  <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">-->
            <div class="card-body">
              <h3 class="card-title">{{$product->name}}</h3>
              <h4>{{$product->price}} €</h4>
              <p class="card-text">{{$product->description}}</p>
              <h6>Disponibili: {{$product->quantity}} </h6>
              <h6>{{$product->link}} </h6>

              <h5>Inserito da: {{$product->user}} </h5>

@if( auth()->user()->email  == $product->user)
              <button style="float:right" type="button" class="btn btn-outline-danger">Rimuovi prodotto</button>
@endif
            </div>
          </div>
</div>


    @endforeach
    @include('pezzi.formerrors')

@endsection
  


