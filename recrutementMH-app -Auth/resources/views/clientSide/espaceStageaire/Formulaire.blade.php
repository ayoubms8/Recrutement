
<!DOCTYPE html>
<html lang="en">
<x-app-layout>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Document</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet" />
    </head>
    <body class="p-5 m-5" style="width: 90%; background-color: #80808017;">
        <!-- Head : get information by ID "annance"-->
        {{-- formulaire CV -START --}}
       
        <center style="background-color: white; width: 100%;" class="m-5">
            <div class="d-flex flex-column flex-md-row border rounded mr-10 p-4">
                <img src="https://ats.talenteo.com/attachments/company_logo/logo_2416045_large.jpg" alt="'company-logo'" width="160" height="100" class="mr-auto mr-md-30 ml-md-0 mb-30 mb-md-0" />
                <div class="d-flex flex-column text-center text-md-left">
                    <h3>Demande de Stage (Espace Stage)</h3>
                    <div>
                        <span data-qa="company-name" class="mr-10">
                            <i class="icon md-balance mr-5"></i>
                            <strong> Menara Holding </strong>
                        </span>
                        <span data-qa="job-locations">
                            <i class="icon md-pin mr-5"></i>
                            <strong>
                                Beni Mellal, Khénifra, Maroc | El Kelaâ des Sraghna, Marrakech et région, Maroc | Marrakech et région, Maroc
                            </strong>
                            <label></label>
                        </span>
                    </div>
                </div>
            </div>
        </center>
        <!-- end Head  -->
        @if ($message = Session::get('success'))
            <div class="d-flex flex-column alert alert-success">
                <p> Votre demande a ete bien envoyer ! merci de votre inscription <a href="{{ route('anonce.indexStageaire') }}">revenire a la page d'annonce</a></p>
                
            </div>
        @endif

        <!-- Form - START -->
        <form id="id-cv-Form" class="ml-25 border rounded m-5 p-5" style="width: 100%; background-color: white;" method="POST" enctype="multipart/form-data" action="{{ route('stageaire.store') }}">
            @csrf
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <input hidden id="idAnnonce"  name="idAnnonce" value="{{$data['idAnnonce']}}" />
            <input hidden id="type"  name="type" value="S" />
            <fieldset>
                <div class="form-row col-md-12 m-5">
                    <!--SEction: img + sex,info -->

                    <!-- col 1 -->
                    <div class="form-row col-md-6 p-1">
                        <!-- choose imge profile -->
                        <div class="form-group m-0 p-0">
                            <img src="upload/user.png" id="uploaded_image" class="img-responsive img-circle rounded-circle border" style="width: 30%;" />
                            <button type="button" class="btn btn-primary m-3 p-2" style="display: block;">
                                <label for="upload_image"> + Ajouter</label>
                            </button>
                            <div class="overlay">
                                <div class="text">Click to Change Profile Image</div>
                            </div>
                            <input type="file" class="form-control-file image" id="upload_image" style="display: none;" />
                        </div>
                        <!-- <div class="image_area form group">
							<form method="post">
								<label for="upload_image">
									<img src="upload/user.png" id="uploaded_image" class="img-responsive img-circle" />
									<div class="overlay">
										<div class="text">Click to Change Profile Image</div>
									</div>
									<input type="file" name="image" class="image" id="upload_image" style="display:none" />
								</label>
		
							</form>
						</div> -->
                        <!-- Modal Crop Image Profile -->
                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Crop Image Before Upload</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="img-container">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <img src="" id="sample_image" />
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="crop" class="btn btn-primary">Crop</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control w-20" id="ID-txt-prenom" placeholder="Prenom" name="prenom" value="" oninput="this.className = '' " />
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="ID-txt-nom" placeholder="NOM" name="nom" oninput="this.className = '' " />
                            </div>
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
                        <label for="ID-txt-lastPoste">Intitulé du dernier poste ou poste souhaité</label>
                        <input type="text" class="form-control" id="ID-txt-lastPoste" placeholder="Intitulé du dernier poste ou poste souhaité" name="poste" />
                    </div>

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
                </div>

                <div class="form-row">
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
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="file-id">Glissez et déposez un fichier ou cliquez ici </label>
                        <input type="file" class="form-control-file" id="file-id " name="file_pdf"  />
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="file-id">Glissez et déposez un img ou cliquez ici </label>
                        <input type="file" class="form-control-file" id="img-id " name="upload_image"  />
                    </div>
                </div>
                <input type="button" onclick="ExtractText()"/>
                {{-- formulaire CV -END --}}

				{{-- Btn Navigation -START --}}
				<input type="button" name="data[password]" class="next btn btn-info" value="Next" />
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
					<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
					<input type="submit" name="submit" class="submit btn btn-success" value="Submit" id="submit_data" />
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
</x-app-layout>

</html>

<script src="{{asset('js/espaceStageaire/Formulaire.js') }}" defer></script>
<script defer>
   
  var datass = '';
        var DataArr = [];
       // PDFJS.workerSrc = '';

        function ExtractText() {
            var input = document.getElementById("file-id");
            var fReader = new FileReader();
            console.log(input);
            console.log(fReader);
            //fReader.readAsDataURL(input.files[0]);
            console.log(input.files[0]);
            fReader.onloadend = function (event) {
               // convertDataURIToBinary(event.target.result);
            }
        }

        var BASE64_MARKER = ';base64,';

        function convertDataURIToBinary(dataURI) {

            var base64Index = dataURI.indexOf(BASE64_MARKER) + BASE64_MARKER.length;
            var base64 = dataURI.substring(base64Index);
            var raw = window.atob(base64);
            var rawLength = raw.length;
            var array = new Uint8Array(new ArrayBuffer(rawLength));

            for (var i = 0; i < rawLength; i++) {
                array[i] = raw.charCodeAt(i);
            }
            pdfAsArray(array)

        }

        function getPageText(pageNum, PDFDocumentInstance) {
            // Return a Promise that is solved once the text of the page is retrieven
            return new Promise(function (resolve, reject) {
                PDFDocumentInstance.getPage(pageNum).then(function (pdfPage) {
                    // The main trick to obtain the text of the PDF page, use the getTextContent method
                    pdfPage.getTextContent().then(function (textContent) {
                        var textItems = textContent.items;
                        var finalString = "";

                        // Concatenate the string of the item to the final string
                        for (var i = 0; i < textItems.length; i++) {
                            var item = textItems[i];

                            finalString += item.str + " ";
                        }

                        // Solve promise with the text retrieven from the page
                        resolve(finalString);
                    });
                });
            });
        }

        function pdfAsArray(pdfAsArray) {

            PDFJS.getDocument(pdfAsArray).then(function (pdf) {

                var pdfDocument = pdf;
                // Create an array that will contain our promises
                var pagesPromises = [];

                for (var i = 0; i < pdf.pdfInfo.numPages; i++) {
                    // Required to prevent that i is always the total of pages
                    (function (pageNumber) {
                        // Store the promise of getPageText that returns the text of a page
                        pagesPromises.push(getPageText(pageNumber, pdfDocument));
                    })(i + 1);
                }

                // Execute all the promises
                Promise.all(pagesPromises).then(function (pagesText) {

                    // Display text of all the pages in the console
                    // e.g ["Text content page 1", "Text content page 2", "Text content page 3" ... ]
                    console.log(pagesText); // representing every single page of PDF Document by array indexing
                    console.log(pagesText.length);
                    var outputStr = "";
                    for (var pageNum = 0; pageNum < pagesText.length; pageNum++) {
                        console.log(pagesText[pageNum]);
                        outputStr = "";
                        outputStr = "<br/><br/>Page " + (pageNum + 1) + " contents <br/> <br/>";

                        var div = document.getElementById('output');

                        div.innerHTML += (outputStr + pagesText[pageNum]);

                    }




                });

            }, function (reason) {
                // PDF loading error
                console.error(reason);
            });
        }
</script>

