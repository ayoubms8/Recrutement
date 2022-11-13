@extends('adminSide.layouts.admin-dash-layout')
@section('css-script')
<!-- Font Awesome -->
<link rel="stylesheet" href={{asset("plugins/fontawesome-free/css/all.min.css")}}>
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>List des annonces</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">dashboard</a></li>
               <li class="breadcrumb-item active">List des annonce</li>
            </ol>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</section>
<div class="col-12">
<div class="callout callout-info">
   <h5><i class="fas fa-filter"></i> Critere des Filtres:</h5>
   <div class="col-sm-6">
      <!-- select -->
      <div class="form-group">
        <form action="" id="id-filter-form" method="get" action="{{ route('anonce.getAllAnonceFiltrer') }}">
          @csrf
       
         <label>Par region :</label>
         <select class="form-control" id="region" name="lieux">
            <option>Marrakech et région, Maroc</option>
            <option>Beni mallal , Khénifra, Maroc</option>
            <option>option 3</option>
            <option>option 4</option>
            <option>option 5</option>
         </select>
      </div>
      <div class="form-group">
         <label>Par Autheur :</label>
         <select class="form-control" >
            <option>option 1</option>
            <option>option 2</option>
            <option>option 3</option>
            <option>option 4</option>
            <option>option 5</option>
         </select>
      </div>
   </div>
   <div class="form-goup">
         <label for="">Par mot clee: </label>
      <div class="input-group mb-3">
         
         <input name ='keyword' type="text" class="form-control" placeholder="saisire un mot clee..." aria-label="Recipient's username" aria-describedby="basic-addon2">
         <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
         </div>
      </div> 
    </form>
</div>
<!-- Main content -->
<div class="content">
<div class="container">
   <div class="row all-anonce">
      @foreach ($annoces as $an)
      <div class="col-lg-6 ">
         <div class="card d-flex flex-row">
            <div class="card-body card-primary p-2">
               <h3 class="card-title">{{ $an['titre'] }}</h3>
               <div class="dropdown float-right">
                  <button class="btn " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-bars" aria-hidden="true"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                     {{-- <a class="dropdown-item" type="button" href="{{route('anonce.edit'),$an['id']}}"><i class="fa fa-pencil" aria-hidden="true"></i>Modifier</a> --}}
                     <button class="dropdown-item" type="button">Duplique</button>
                     <button class="dropdown-item" type="button">Cloture</button>
                     <button class="dropdown-item" type="button">Rapport d'activite</button>
                     <button class="dropdown-item" type="button">Genere bultin de placement</button>
                  </div>
               </div>
               <p class="card-text">
                  <i class="fa-solid fa-location-dot"></i>{{$an['lieux']}}
               </p>
               <p class="card-text">
                  <i class="fa-solid fa-location-dot"></i>{{$an['Date_creation']}}
               </p>
               <a href="#" class="card-link"> Non traités </a>
               <a href="#" class="card-link"> En traitement </a>
               <a href="#" class="card-link"> Non retenus </a>
            </div>
         </div>
         <!-- /.col-md-6 -->
      </div>
      @endforeach
      <!-- /.row -->
   </div>

   <div class="row filtred-anonce">
      @foreach ($annoces as $an)
      <div class="col-lg-6 ">
         <div class="card d-flex flex-row">
            <div class="card-body card-primary p-2">
               <h3 class="card-title">{{ $an['titre'] }}</h3>
               <div class="dropdown float-right">
                  <button class="btn " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-bars" aria-hidden="true"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                     {{-- <a class="dropdown-item" type="button" href="{{route('anonce.edit'),$an['id']}}"><i class="fa fa-pencil" aria-hidden="true"></i>Modifier</a> --}}
                     <button class="dropdown-item" type="button">Duplique</button>
                     <button class="dropdown-item" type="button">Cloture</button>
                     <button class="dropdown-item" type="button">Rapport d'activite</button>
                     <button class="dropdown-item" type="button">Genere bultin de placement</button>
                  </div>
               </div>
               <p class="card-text">
                  <i class="fa-solid fa-location-dot"></i>{{$an['lieux']}}
               </p>
               <p class="card-text">
                  <i class="fa-solid fa-location-dot"></i>{{$an['Date_creation']}}
               </p>
               <a href="#" class="card-link"> Non traités </a>
               <a href="#" class="card-link"> En traitement </a>
               <a href="#" class="card-link"> Non retenus </a>
            </div>
         </div>
         <!-- /.col-md-6 -->
      </div>
      @endforeach
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
@section('js-script')
  <script>
   
    $('#region').change(function(){
      //alert($('#id-filter-form').serialize());
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        console.log("ajax");
        $.ajax({
            url:"/dashboard/liste-annonce-filter",
            type:"POST",
            data: $('#id-filter-form').serialize(),

            success:function(response){
               console.log(response);

            },
            error: function(error) {
                console.log(error);
            }
        });

    });
  </script>
@endsection