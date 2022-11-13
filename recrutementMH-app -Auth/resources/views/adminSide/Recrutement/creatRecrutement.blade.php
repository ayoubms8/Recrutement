@extends('adminSide.layouts.admin-dash-layout')
@section('css-script')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{asset("plugins/fontawesome-free/css/all.min.css")}}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{asset("dist/css/adminlte.min.css")}}>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href={{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Select2 -->
  <link rel="stylesheet" href={{asset("plugins/select2/css/select2.min.css")}}>
  <link rel="stylesheet" href={{asset("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}>
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href={{asset("plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css")}}>
  {{-- boostrap CDN--}}
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- summernote -->
  <link rel="stylesheet" href={{asset("plugins/summernote/summernote-bs4.min.css")}}>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- include libraries(jQuery, bootstrap) -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  {{-- BS - Stepper --}}
@endsection

@section('content')
  <form action="{{ route('anonce.store') }}" method="POST" id="id-annonce-Form">
    @csrf
    <input type="text" hidden value="R" name="Type">
    <input type="text" hidden value="R" name="Type">
    <section class="content">
    <!-- Infos recrutement -->
    <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Infos recrutement</h3>
          <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
              </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label>Titre du recrutement *</label>
                    <input type="text" class="form-control" id="titre" name="titre" placeholder="Enter un titre">
                </div>
              </div>
              
          </div>
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Lieu de travail</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="lieux">
                      <option selected="selected">Marrakech et region, Maroc</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Fonction du poste *</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="Secteur_activite">
                      <option selected="selected">assistanat, secretariat</option>
                      <option>comptabilite, Finance</option>
                      <option>Administration, Moyens generaux</option>
                      <option>Mitiers Banque et assurances</option>
                      <option>RH, personnel, formation</option>
                    </select>
                </div>
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label>Type de contrat</label>
                    <select class="form-control select2bs4"  style="width: 100%;" name="Type_Contrat">
                      <option selected="selected">assistanat, secretariat</option>
                      <option>comptabilite, Finance</option>
                      <option>Administration, Moyens generaux</option>
                      <option>Mitiers Banque et assurances</option>
                      <option>RH, personnel, formation</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre de poste*</label>
                    <input type="number" class="form-control" id="Nombre_Poste" name="Nombre_Poste" >
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                          <div>
                            <textarea id="summernote" class="form-control" style="height: 300px; w" name="discription">
                          <h1><u>Présentation de l’entreprise </u></h1>
                          <p>...</p>
                          <h4>Missions du poste</h4>
                          <ul>
                            <li>.....</li>
                            <li>.....</li>
                          </ul>
                          <h4>Profil recherché</h4>
                          <ul>
                            <li>.....</li>
                          </ul>
                          <h4>Avantages du poste </h4>
                          <ul>
                            <li>.....</li>
                          </ul>
                        
                        </textarea>
                          </div>
                      </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="submit btn btn-success" value="Submit" id="submit-annonce" />
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Information sure le recrutement
        </div>
    </div>
    <!-- /.card -->
    <!-- Critères de sélection -->
    {{-- <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Critères de sélection</h3>
          <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
              </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label>Titre du recrutement *</label>
                    <input type="text" class="form-control" id="titre" name="titre" placeholder="Enter un titre">
                </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Lieu de travail</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="lieux">
                      <option selected="selected">Marrakech et region, Maroc</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Fonction du poste *</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="Secteur_activite">
                      <option selected="selected">assistanat, secretariat</option>
                      <option>comptabilite, Finance</option>
                      <option>Administration, Moyens generaux</option>
                      <option>Mitiers Banque et assurances</option>
                      <option>RH, personnel, formation</option>
                    </select>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label>Type de contrat</label>
                    <select class="form-control select2bs4"  style="width: 100%;" name="Type_Contrat">
                      <option selected="selected">assistanat, secretariat</option>
                      <option>comptabilite, Finance</option>
                      <option>Administration, Moyens generaux</option>
                      <option>Mitiers Banque et assurances</option>
                      <option>RH, personnel, formation</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre de poste*</label>
                    <input type="number" class="form-control" id="Nombre_Poste" name="Nombre_Poste" >
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Inormation sure le recrutement
        </div>
    </div> --}}
    <!-- /.card -->
    </section>
  

  </form>
@endsection

@section('js-script')
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src={{asset("plugins/summernote/summernote-bs4.min.js")}}></script>
  <script>
    $(function() {
        $('#summernote').summernote();
       $(".submit-annonce").on("click", function () {
        console.log("is submit ");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: "/store-annonce",
            type: "POST",
            data: $("#id-annonce-Form").serialize(),

            success: function (response) {
                modal.css("display", "none");
                if (response.status == "success") {
                    Swal.fire("oui!", "Email bien envoyee !", "success");
                } else Swal.fire("Non!", "Erreur d'envoi d'email !", "error");
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
    });
  </script>
  {{-- <script src="{{asset('js/espaceStageaire/Formulaire.js') }}" defer></script> --}}

@endsection