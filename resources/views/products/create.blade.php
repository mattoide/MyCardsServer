@extends('layouts.standard')

@section('content')


  <body>


    <div class="container">

     
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


  


          <div class="card mt-4">
          <!--  <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">-->
            <div class="card-body">
         
         <form method="POST" action="/addProduct" enctype="multipart/form-data">
         {{ csrf_field() }}

            <div class="form-group">

    <label for="exampleFormControlTextarea1">Nome</label>
    <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Nome prodotto" required>

    <label for="exampleFormControlTextarea1">Prezzo</label>
    <input type="number" min="0" class="form-control"   id="price" name="price" placeholder="Prezzo prodotto (in €)" required >

     <label for="exampleFormControlTextarea1">Quantità</label>
    <input type="number" min="0" class="form-control"   id="quantity" name="quantity" placeholder="Quantità" required >
</div>

    <div class="form-group">
    <label for="exampleFormControlTextarea1">Descrizione</label>
    <textarea class="form-control"  rows="3" id="description "name="description" placeholder="Descrizione prodotto" required></textarea>
    <label for="exampleFormControlTextarea1">Link</label>
    <input type="url" class="form-control form-control-lg"  id="link" name="link" placeholder="Link" required>
  </div>

  
  <div class="form-group">
    <label for="exampleFormControlFile1">Scegli immagine prodotto</label>
    <input type="file" class="form-control-file" id="image" name="image" accept="image/x-png ,image/jpeg">
  </div>
  <button style="float:right" class="btn btn-primary" type="submit">Aggiungi prodotto</button>
  

</form>

  </div>
              
            </div>
          </div>
          </div>
      </div>
    </div>

       @include('pezzi.formerrors')


  </body>

</html>


    @endsection
