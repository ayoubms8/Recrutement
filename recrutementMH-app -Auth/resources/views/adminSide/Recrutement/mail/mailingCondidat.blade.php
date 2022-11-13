@extends('adminSide.layouts.admin-dash-layout')
@section('title','Liste des annoces')
@section('css-script')
<!-- Font Awesome -->
<link rel="stylesheet" href={{asset("plugins/fontawesome-free/css/all.min.css")}}>
@endsection
@section('content')
       <!-- Main content -->
       {{-- ... --}}
           <form wire:submit.prevent="submitForm" id="id-mail-Formc" method="post" action="/dashboard/sendmailto/{{$condidat[0]['email']}}">
           @csrf
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <span wire:model="name" id="nom" class="d-none" value="{{$condidat[0]['nom']}}">{{$condidat[0]['nom']}}</span>
          <span id="prenom" class="d-none">{{$condidat[0]['prenom']}}</span>
          <!-- /.col -->
          <div class="col-md-9">
              <h2>Reponce au condidature de : {{$condidat[0]['nom']}} {{$condidat[0]['prenom']}} </h2>
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Composer le Message</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <div class="form-group">
                        <label>choisire decision:</label>
                        <select class="form-control decision">
                          <option value="regeter">Condidature regeté</option>
                          <option value="selectione">Condidature  Selectionnée</option>
                          <option value="confirmation">Mail de confirmation de condidature</option>
                          <option value="confirmAnonyme">Mail de confirmation de condidature pour offre anonyme</option>
                          
                        </select>
                    </div>
                  
                </div>
                <div class="form-group">
                
                  <input wire:model="email" class="form-control " name="a" placeholder="To:" value=" {{$condidat[0]['email']}}">
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
                    <textarea wire:model="message" id="compose-textarea" class="form-control mail" style="height: 300px">
                      txt
                    </textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" name="attachment">
                  </div>
                  <p class="help-block">Max. 32MB</p>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</a>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
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
    <!-- /.content -->
@endsection
@section('js-script')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  
   
   <script defer>
    var nom =  $("#nom").text();
    var prenom =  $("#prenom").text();
    var titre = $("#titre").text();
    
    $("li").on("click", function() {
        var variable = $(this).attr("value");
        //alert($(this).attr("value"));
         $(".mail").text($(".mail").text()+variable);
    });
     $(".decision").on("click", function() {

        if($('.decision :selected').val()== "regeter"){
            $(".mail").html("Bonjour "+nom+" "+prenom+",Nous tenons à vous remercier de la confiance que vous nous témoignez, et de l’intérêt que vous portez aux activités de notre entreprise, en nous proposant votre collaboration pour le poste "+titre+".Malheureusement, malgrès tout l’intérêt que présente votre dossier, nous ne pouvons pas y donner une suite favorable.Nous nous permettons cependant de conserver votre dossier et ne manquerons pas de vous contacter si une nouvelle opportunité venait à se présenter.En vous souhaitant de réussir dans votre recherche actuelle.Cordialement;Direction des Ressources Humaines Menara Holding");
            $(".objectMail").val($('.decision :selected').text());

        }else if($('.decision :selected').val()== "selectione"){
            $(".mail").html("Bonjour "+nom+" "+prenom+", Nous avons le plaisir de vous annoncer que votre candidature à l'offre "+ titre +" a été sélectionnée. Nous vous invitons à passer un entretien au niveau de notre siège, le JJ/MM/AAAA . Merci de venir muni(e) de votre (CV mis à jour / pièce d'identité / Mail imprimé).Cordialement; Direction des Ressources Humaines Menara Holding");
            $(".objectMail").val($('.decision :selected').text());

        }else if($('.decision :selected').val()== "confirmation"){
            $(".mail").html("Bonjour "+nom+" "+prenom+" ,Nous tenons à vous informer que nous avons bien reçu votre candidature à l'offre "+titre+".Nous procéderons à l'étude de votre dossier et vous contacterons dans le cas ou votre candidature est retenue, dans le cas contraire à défaut de recevoir un mail de réponse négative de notre part dans un délai dépassant les 8 semaines, merci de comprendre que nous ne sommes pas en mesure d'y donner une suite favorable pour le moment.Cordialement,Direction des Ressources Humaines Menara Holding");
            $(".objectMail").val($('.decision :selected').text());

        }else if($('.decision :selected').val()== "confirmAnonyme"){
            $(".mail").html("Bonjour "+nom+" "+prenom+", Votre candidature à l'offre "+titre+" a bien été transmise à l'entreprise qui recrute.L'entreprise prendra contact avec vous dans le cas ou votre candidature correspond au profil recherché. Dans le cas contraire, Emploitic en tant que média n'intervient pas dans le processus de recrutement de l'entreprise.Cordialement,L’équipe Menara Holding");
            $(".objectMail").val($('.decision').text());

            
        }
     });


   </script>

@endsection