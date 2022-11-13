
<!DOCTYPE html>
<html lang="en">
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
              <a class="nav-link" href="{{url('/Recrutement')}}">Recrutements</a>
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
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Document</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet" />
    </head>
    <body class="p-5 m-5" style="width: 100%; background-color: #80808017;">
        <!-- Head : get information by ID "annance"-->
        {{-- formulaire CV -START --}}
       
        <center style="background-color: white; width: 100%;" class="m-5">
            <div class="d-flex flex-column flex-md-row border rounded mr-10 p-4">
                <img src="https://ats.talenteo.com/attachments/company_logo/logo_2416045_large.jpg" alt="'company-logo'" width="160" height="100" class="mr-auto mr-md-30 ml-md-0 mb-30 mb-md-0" />
                <div class="d-flex flex-column text-center text-md-left">
                    <h3>Condidature Spontane de Stage (Espace Stage)</h3>
                    <div>
                        <span data-qa="company-name" class="mr-10">
                            <i class="icon md-balance mr-5"></i>
                            <strong> Menara Holding </strong>
                        </span>
                        
                    </div>
                </div>
            </div>
        </center>
        <!-- end Head  -->
        @if ($message = Session::get('success'))
            <div class="d-flex flex-column alert alert-success">
                <p> Votre demande a ete bien envoyer ! merci de votre inscription </p>
                
            </div>
        @endif

        <!-- Form - START -->
        <form id="id-cv-Form" class="ml-25 border rounded m-5 p-5" style="width: 100%; background-color: white;" method="POST" enctype="multipart/form-data" action="{{ route('stageaire.storeStage') }}">
            @csrf
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <input hidden id="idAnnonce"  name="idAnnonce" value="{{$data['idAnnonce']}}" />
            <input hidden id="type"  name="type" value="S" />
            <fieldset>
                <div class="form-row col-md-12 m-5">
                    <!--SEction: img + sex,info -->

                    <!-- col 1 -->
                   
                    <!-- col 2 -->

                    <!-- Check sex -->
                    <div class="form-group col-md-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="ID-radio-sex-H" value="H" />
                            <label class="form-check-label" for="inlineRadio1">Homme</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="ID-radio-sex-F" value="F" />
                            <label class="form-check-label" for="inlineRadio2">Femme</label>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control w-20" id="ID-txt-prenom" placeholder="Prenom" name="prenom" value="" oninput="this.className = '' " />
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="ID-txt-nom" placeholder="NOM" name="nom" oninput="this.className = '' " />
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="ID-txt-cin" placeholder="CIN" name="cin" oninput="this.className = '' " />
                            </div>
                            <input type="button" name="valider" class=" btn btn-primary" value="valider CIN" id="valider-cin" />
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" id="ID-txt-email" name="email" placeholder="Email" />
                            </div>
                            <div class="form-group col-md-6">
                                <input type="tel" class="form-control" id="ID-txt-tele" name="tele" placeholder="tele" />
                            </div>
                        </div>
                        <div class="form-row mb-6">
                            <label for="ID-select-ville" >Ville/Commune</label>
                            <select id="ID-select-ville" class="form-control" name="ville">
                                <option selected>Choose...</option>
                                @foreach ($data['villes'] as $ville)
                                <option >{{ $ville['libelle'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                   

                    <div class="form-group col-md-6">
                        <!-- Select from data base info -->
                        <label for="ID-metier">Métier</label>
                        <select id="ID-metier" class="form-control" placeholder="Métier" name="metier">
                            <option selected>Choose...</option>
                            @foreach ($data['mitiers'] as $mitier)
                            <option>{{ $mitier['libelle'] }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <!-- select data from dataBase -->
                        <label for="ID-select-experience">Années d'expérience</label>
                        <select id="ID-select-experience" class="form-control" placeholder="Années d'expérience" name="annee_experience">
                            <option selected>Choose...</option>
                            @foreach ($data['experiences'] as $experience)
                            <option>{{ $experience['experience'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    

                    <div class="form-group col-md-6">
                        <!-- select data from dataBase -->
                        <label for="ID-select-etude">Niveau d'études</label>
                        <select id="ID-select-etude" class="form-control" placeholder="Niveau d'études" name="niveau_etude">
                            <option selected>Choose...</option>
                            @foreach ($data['etudes'] as $etude)
                            <option>{{ $etude['libelle'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <!-- select data from dataBase -->
                        <label for="ID-select-etude">Ecole ou Universite</label>
                        <select id="ID-select-etude" class="form-control" placeholder="Ecole ou Universite" name="ecole">
                            <option selected>Choisir...</option>
                            <option selected>EMSI</option>
                            <option selected>ENCG</option>
                            <option selected>ENSA</option>
                            <option selected>ENAM</option>
                            <option selected>FSSM</option>
                            @foreach ($data['ecoles'] as $ecole)
                            <option>{{ $ecole['libelle'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <!-- select data from dataBase -->
                        <label for="ID-select-etude">Lettre de Motivation</label>
                        <textarea class="form-control" id="id-Motivation" rows="4" name="motivation"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="file-id">Glissez et déposez un fichier ou cliquez ici </label>
                        <input type="file" class="form-control-file btn btn-outline-success" id="file-id " name="file_pdf"  />
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="file-id">Glissez et déposez un img ou cliquez ici </label>
                        <input type="file" class="form-control-file btn btn-outline-warning" id="img-id " name="upload_image"  />
                    </div>
                </div>
                
                {{-- formulaire CV -END --}}

				{{-- Btn Navigation -START --}}
				<input type="button" id="btn-next" name="data[password]" class="next btn btn-info" value="Next" />
				{{-- Btn Navigation -END --}}
            </fieldset>

            <fieldset>
                    {{-- Questionaie - START --}}
                    <div class="form-group border mt-5 p-5" style="background-color:white">

			<!-- Region Sage -->
			<label > Region</label>
			<div class="form-group region">
				<div class="form-check ">
					<input class="form-check-input" type="radio" name="region" id="ID-radio-Region" value="Marrakech">
					<label class="form-check-label" for="inlineRadio1">Marrakech</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="region" id="ID-radio-Region" value="Beni_Mellal">
					<label class="form-check-label" for="inlineRadio2">Beni Mellal</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="region" id="ID-radio-Region" value="Sraghna">
					<label class="form-check-label" for="inlineRadio3">EL Kella des Sraghna</label>
				</div>
			</div>

			<!-- Date Stage -->
			<label> Date debut de Stage</label>
			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="dateDebut" id="ID-radio-Date" value="janvier">
					<label class="form-check-label" for="inlineRadio1">Janvier 2022</label>
				</div>

				<div class="form-check">
					<input class="form-check-input" type="radio" name="dateDebut" id="ID-radio-Date" value="Fevrier">
					<label class="form-check-label" for="inlineRadio2">Fevrier 2022</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="dateDebut" id="ID-radio-Date" value="Mars">
					<label class="form-check-label" for="inlineRadio3">Mars 2022</label>
				</div>
			</div>

			<!-- Dure Satge -->
			<label> Duree de Stage</label>
			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="dateFin" id="ID-radio-duree" value="1m">
					<label class="form-check-label" for="inlineRadio1">1 mois</label>
				</div>

				<div class="form-check">
					<input class="form-check-input" type="radio" name="dateFin" id="ID-radio-duree" value="2m">
					<label class="form-check-label" for="inlineRadio2">2 mois</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="dateFin" id="ID-radio-duree" value="3m">
					<label class="form-check-label" for="inlineRadio3">3 mois</label>
				</div>
			</div>
		</div>
                    {{-- Questionaie - END --}}
					<input type="button" name="previous" class="previous btn btn-outline-default" value="Previous" />
					<input type="submit" name="submit" class="submit btn btn-outline-success" value="Submit" id="submit_data" />
            </fieldset>
            <div id="output"></div>
        </form>
        <!-- Form - END -->

        <!-- Navigation Button - START -->
        <div class="ml-25 border rounded m-5 p-5" style="width: 100%; background-color: white;">
            {{-- <button type="button" class="btn btn-primary float-right p-1" src="questionaireStag.php" onclick="nextPrev(1)" id="nextBtn">suivant</button>
            <button type="button" class="btn btn-warning float-right p-1" src="annonceStag.php" onclick="nextPrev(-1)" id="prevBtn">Precedant</button> --}}
            {{-- <button type="button" class="btn btn-warning float-right p-1" src="annonceStag.php" onclick="nextPrev(-1)">Precedant</button> --}}
        </div>
        <!--  Navigation Button - END -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
        <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
        <script src="https://unpkg.com/dropzone"></script>
        <script src="https://unpkg.com/cropperjs"></script>
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

        <!-- Js code for modale Cropper Image -->
        <script type="test/javascript" src="assets/js.js"></script>

        {{-- PDF js --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/1.10.100/pdf.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.entry.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/1.10.100/pdf.worker.min.js" ></script>

    </body>
    @if(Route::has('login'))
            @auth
            </x-app-layout>
			@endauth

@endif
</html>

<script src="{{asset('js/espaceStageaire/Formulaire.js') }}" defer></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script defer>
   $(function(){
       
      $("#valider-cin").on("click", function() {
          var cin = $("#ID-txt-cin").val();
        alert(cin);
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/condidatur-sp/checkCIN",
            type:"Post",
            data: {cin: cin},
            success: function(response){
                //alert(response);
                if(response =="find"){
                    Swal.fire({
                        icon: 'error',
                        title: 'CIN invalide !',
                        text: "impossible d'inscrire avec ce CIN, car il est deja exist"
                    });
                    $("#btn-next").prop('disabled', true);
                }
                else $("#btn-next").prop('disabled', false);
            },
            error: function(error){
                console.log(error);
            }
        });
      });
   });
</script>

