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
        <form  id="id-filter-form" method="get" action="{{ url('/dashboard/liste-annonce-filter') }}">
          @csrf
       
         <label>Par region :</label>
         <select class="form-control" id="region" name="lieux">
         <option></option>
            <option>Marrakech et région, Maroc</option>
            <option>Beni Mellal, Khénifra, Maroc</option>
            <option>California</option>
            <option>Alaska</option>
         </select>
      </div>
      <div class="form-group">
         <label>Par Secteur :</label>
         <select id="secteur" name="secteur" class="form-control" >
         <option></option>
            <option>BTP, Construction, Immobilier</option>
            <option>Administration, Moyen generale</option>
            <option>assistanat, secretariat</option>
            <option>comptabilite, Finance</option>
         </select>
      </div>
      <div class="form-goup">
         <label for="">Par mot clee: </label>
      <div class="input-group mb-3">
         
         <input name ='keyword' type="text" class="form-control" placeholder="saisire un mot clee..." aria-label="Recipient's username" aria-describedby="basic-addon2">
         <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
         </div>
      </div>  
      </div>
       
   </div>
    </form>
</div>
<!-- Main content -->
<div class="content">
<div class="container">
   {{-- <form action="{{route('anonce.updateEtat')}}" method="POST" id="form-updateAn"> --}}
      <div class="row">
      @foreach ($annoces as $an)
         <div class="col-lg-6 " id="all-anonce">
            <div class="card d-flex flex-row">
               <div class="card-body card-primary p-2" >
                  
                  <h2 class="card-title"><b>{{ $an['titre'] }}</b></h2>
                  <div class="dropdown float-right">
                     <button class="btn " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa fa-bars" aria-hidden="true"></i>
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        {{-- <a class="dropdown-item" type="button" href="{{route('anonce.edit'),$an['id']}}"><i class="fa fa-pencil" aria-hidden="true"></i>Modifier</a> --}}
                        <button class="dropdown-item" type="button">Duplique</button>
                        <button class="dropdown-item" type="button" id="btn-cloturer">Cloture</button>
                        <button class="dropdown-item" type="button">Rapport d'activite</button>
                        <button class="dropdown-item" type="button">Genere bultin de placement</button>
                     </div>
                  </div>
                  <p class="card-text">
                     <i class="fa-solid fa-location-dot"></i>{{$an['lieux']}}
                  </p>
                  <p class="card-text">
                     <i class="fa-solid fa-location-dot"></i>{{$an['Date_creation']}}
                     <span name = "id" class="hide" id="idAn" >{{ $an['id'] }}</span>
                  </p>
                  <br>
                  <form method="POST" action="/dashboard/liste-annonce-cv/{{ $an['id'] }}" >
                     @csrf
                     {{-- <span name = "idAnonce" value="{{ $an['id'] }}"></span> --}}
                    <button type="submit" class="btn btn-warning">Condidats</button>
                  </form>
               </div>
                
            </div>
            
            <!-- /.col-md-6 -->
         </div>
         @endforeach
         <!-- /.row -->
      </div>

      <div class="row filtred-anonce">
      
         
      
      </div>
   {{-- </form> --}}
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
@section('js-script')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script>
      
      $('.all-anonce').show();
      $('.filtred-anonce').hide();
      let cards = document.querySelectorAll('.click-event');

      for(let card of cards) {
      card.addEventListener('click', (e) => {
         console.log(e.target.dataset.id);
      });
      }

    $('#region').change(function(){
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
              //
              //alert( JSON.stringify(response.annoces[0]['titre']) );
               $('.all-anonce').hide();
               var h ="";
              // dataItems = JSON.stringify(response.annoces);
               //item = [];
               // alert(dataItems);
               // //for(data in dataItems)
               // dataItems = [dataItems].map((item, i) => {
               //    alert("i "+i);
               //     h+='<div class="row filtred-anonce">@foreach ($annoces as $an)<div class="col-lg-6 "><div class="card d-flex flex-row"><div class="card-body card-primary p-2"><h3 class="card-title">'+response.annoces[i]['titre']+'</h3><div class="dropdown float-right"><button class="btn " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button><div class="dropdown-menu" aria-labelledby="dropdownMenu2"><button class="dropdown-item" type="button">Duplique</button><button class="dropdown-item" type="button">Cloture</button><button class="dropdown-item" type="button">Rapport activite</button><button class="dropdown-item" type="button">Genere bultin de placement</button></div></div><p class="card-text"><i class="fa-solid fa-location-dot"></i>'+response.annoces[i]['lieux']+'</p><p class="card-text"><i class="fa-solid fa-location-dot"></i>'+response.annoces[i]['Date_creation']+'</p><a href="#" class="card-link"> Non traités </a><a href="#" class="card-link"> En traitement </a><a href="#" class="card-link"> Non retenus </a></div></div></div>@endforeach</div>';              
                   
               // });
                  // for (i = 0; i < response.annoces.length; i++){
                  //    alert(responce.annoces.length);
                  //     //h+='<div class="row filtred-anonce">@foreach ($annoces as $an)<div class="col-lg-6 "><div class="card d-flex flex-row"><div class="card-body card-primary p-2"><h3 class="card-title">'+response.annoces[i]['titre']+'</h3><div class="dropdown float-right"><button class="btn " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button><div class="dropdown-menu" aria-labelledby="dropdownMenu2"><button class="dropdown-item" type="button">Duplique</button><button class="dropdown-item" type="button">Cloture</button><button class="dropdown-item" type="button">Rapport activite</button><button class="dropdown-item" type="button">Genere bultin de placement</button></div></div><p class="card-text"><i class="fa-solid fa-location-dot"></i>'+dataItems[i]['lieux']+'</p><p class="card-text"><i class="fa-solid fa-location-dot"></i>'+dataItems[i]['Date_creation']+'</p><a href="#" class="card-link"> Non traités </a><a href="#" class="card-link"> En traitement </a><a href="#" class="card-link"> Non retenus </a></div></div></div>@endforeach</div>';              

                  // }
               //alert(h);
               
               $('.filtred-anonce').html(response);
               $('.filtred-anonce').show();
               $('.all-anonce').hide();
              
            },
            error: function(error) {
                console.log(error);
            }
        });

    });
    
   //  $("#btn-cloturer").click(function () {
   //     var idAnonce = $("#id").text();
   //     //alert(idAnonce);

   //     $.ajaxSetup({
   //          headers: {
   //              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //          }
   //      });
   //     $.ajax({
   //        url : "/dashboard/update-Etat",
   //        type: "POST",
   //        data: {
   //           idAnonce: idAnonce,
   //           etat : "cloture"
   //        },

   //        success: function(response){
   //           console.log(response);
   //        },
   //        error: function(error){
   //           console.error(error);
   //        }
   //     });
   //  });
    
  </script>
@endsection