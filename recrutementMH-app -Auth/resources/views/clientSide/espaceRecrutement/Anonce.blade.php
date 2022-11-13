<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@if(Route::has('login'))
            @auth
            <x-app-layout>
			@endauth

@endif
                
<header>
     <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><span class="text-primary">Menara</span>-Holding</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
			@if(Route::has('login'))
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{url('/condidatur-sp')}}">Candidature spontanée</a>
            </li>
			@else
			<li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Candidature spontanée</a>
            </li>
			@endauth

            @endif
			<li class="nav-item">
              <a class="nav-link" href="{{url('/')}}">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/')}}">Stages</a>
            </li>
            @if(Route::has('login'))
            @auth

			@else
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login</a>
            </li>

             <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register</a>
            </li>

            @endauth

            @endif



          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
  <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link
		rel="stylesheet"
		href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"
		type="text/css"
		/>

		<title>Espace des Stages</title>
		
		<style></style>

	</head>
	<body class=" m-3" style="width: 100%;background-color: #80808017">

		<!-- Head : get information by ID "annance"-->
		@foreach ($annoces as $an)
			<!-- get all Annonces infos from dataBase: -->
			<center style="background-color:white" class="m-5">
				<form class="d-flex flex-column flex-md-row border rounded mr-10 p-4" method="post" action="{{ route('stageaire.index') }}">
					@csrf
					
					<!-- id anonce -->
					<input hidden id="idAnnonce"  name="idAnnonce" value="{{$an['id']}}">
					<input hidden id="type"  name="type" value="{{$an['type']}}">
			        <img src="https://ats.talenteo.com/attachments/company_logo/logo_2416045_large.jpg" alt="'company-logo'" width="160" height="100"class="mr-auto mr-md-30 ml-md-0 mb-30 mb-md-0"/>
			        <div class="d-flex flex-column text-center text-md-left">
			        <h3> Anonce des Recrutement (Espace Recrutement) </h3>

					<div>
		                <span data-qa="company-name" class="mr-10">
		                    <i class="icon md-balance mr-5"></i>
		                    <strong> {{$an['siege']}} </strong>
		                </span>
		                <span data-qa="job-locations">
		                    <i class="icon md-pin mr-5"></i>
		                    <strong>
								{{$an['lieux']}}
							</strong>
							<span style="color : red"></span>
		                </span>
						@if(Route::has('login'))
        				@auth
						<a href="/inscription" class="warning btn btn-primary">
							postuler
						</a>
						@else
						<a href="{{route('login')}}" class="warning btn btn-primary">
							postuler
						</a>
						@endauth
						@endif
		            </div>

			        </div>

			    </form>

			</center>
			

		<!-- end Head  -->
		@endforeach
		<!-- les annoces boucle  -->
		<div>

		</div>

	</body>
	@if(Route::has('login'))
        @auth
	</x-app-layout>
	@endauth

    @endif
</html>

