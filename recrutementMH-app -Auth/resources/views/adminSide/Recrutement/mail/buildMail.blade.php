@extends('adminSide.layouts.admin-dash-layout')
@section('title','Liste des annoces')
@section('css-script')
<!-- Font Awesome -->
<link rel="stylesheet" href={{asset("plugins/fontawesome-free/css/all.min.css")}}>
@endsection
@section('content')
       <!-- Main content -->
    <section class="content">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Nouveau Mail + </button> 
       @foreach ($mail as $m)
           <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$m['type']}}</h3>
                <span class="card-text">{{$m['object']}}</span>
                <span class="card-text">{{$m['contenue']}}</span>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
               
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
               
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
       @endforeach 
      
    </section>
    
    <!-- /.content -->
    <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">cree un email :</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- ... --}}
           <form id="id-mail-Form" method="post" action="{{ route('mail.storMail') }}">
           @csrf
           <section class="content">
            <div class="container-fluid">
              <div class="row">
                <span id="nom" class="d-none"></span>
                <span id="prenom" class="d-none"></span>
                <!-- /.col -->
                <div class="col-md-12">
                    <h2>Reponce au condidature de :   </h2>
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">Composer le Message</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="form-group">
                        <div class="form-group">
                              <label>choisire decision:</label>
                              <select class="form-control decision" name="type">
                                <option value="regeter">Condidature regete</option>
                                <option value="selectione">Condidature  Selectione</option>
                                <option value="confirmation">Mail de confirmation de condidature</option>
                                <option value="confirmAnonyme">Mail de confirmation de condidature pour offre anonyme</option>
                                
                              </select>
                          </div>
                          
                      </div>
                      <div class="form-group">
                      
                        {{-- <input class="form-control " name="a" placeholder="To:" value=""> --}}
                      </div>
                      <div class="form-group">
                          <div class="input-group-prepend">
                          <button type="button" class="btn btn-warning dropdown-toggle dynamic1" data-toggle="dropdown">
                            Champ dynamique
                          </button>
                          <ul class="dropdown-menu">
                            <li class="dropdown-item" class="nom" value="{nom_condidat}">nom Condidat</li>
                            <li class="dropdown-item" class="prenom" value="{prenom_condidat}">prenom</a></li>
                            <li class="dropdown-item" class="titre" value="{titre_condidat}">titre</a></li>
                          </ul>
                        </div>
                        <input class="form-control objectMail" name="object" placeholder="Subject:">
                      </div>
                      <div class="form-group">
                          <div class="input-group-prepend">
                          <button type="button" class="btn btn-warning dropdown-toggle dynamic2" data-toggle="dropdown">
                            Champ dynamique
                          </button>
                          <ul class="dropdown-menu">
                            <li class="dropdown-item" class="nom" value="{nom_condidat}">nom Condidat</li>
                            <li class="dropdown-item" class="prenom" value="{prenom_condidat}">prenom</a></li>
                            <li class="dropdown-item" class="titre" value="{titre_condidat}">titre</a></li>
                            
                          </ul>
                        </div>
                          <textarea id="compose-textarea" class="form-control mail" style="height: 300px" name="contenue">
                            txt
                          </textarea>
                      </div>
                      
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <div class="float-right">
                        {{-- <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button> --}}
                        <button type="submit" class="btn btn-primary save-mail"><i class="far fa-save"></i> Enregistrer</button>
                      </div>
                      {{-- <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button> --}}
                    </div>
                    <!-- /.card-footer -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>  
@endsection
@section('js-script')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  
   
   <script defer>
    var nom =  $("#nom").text();
    var prenom =  $("#prenom").text();
    
    $("li").on("click", function() {
        var variable = $(this).attr("value");
        //alert($(this).attr("value"));
         $(".mail").text($(".mail").text()+variable);
    });
     
    $(".save-mail").on("click", function() {


    $.ajaxSetup({
           headers: {
               "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
           },
       });
   
       $.ajax({
           url: "/dashboard/buildMail",
           type: "POST",
           data: $("#id-mail-Form").serialize(),
   
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

   </script>

@endsection