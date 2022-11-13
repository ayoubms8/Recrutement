<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\selectionmail;
use App\Mail\confirmmail;

use Spatie\PdfToText\Pdf;

use App\Models\anonce;
use App\Models\etude;
use App\Models\experience;
use App\Models\ville;
use App\Models\mitier;
use DB;
use App\Models\stageaire;
use App\Models\ecole;

class StageaireController extends Controller
{


    /**
     * index()
     * @param : request
     * * this function used to redirect user from Anonce, with type as : recrutement or Stage, blade  *
     */
    public function index(Request $request){
      
        $idAnnonce      = $request->idAnnonce;
        $type           = $request->type;
        // $isSpontane     = $request->isSpontane;
        
        $villes         = ville::all();
        $mitiers        = mitier::all();
        $experiences    = experience::all();
        $etudes         = etude::all();

        $data           = [
            "idAnnonce"     => $idAnnonce,
            "villes"        => $villes,
            "mitiers"       => $mitiers,
            "experiences"   => $experiences,
            "etudes"        => $etudes
        ];

       
        return view('clientSide.espaceRecrutement.Formulaire')->with('data',$data);
        
            
        
    }

    public function indexCondidatureSP(Request $request){
      
        $idAnnonce      = $request->idAnnonce;
        $type           = $request->type;
        // $isSpontane     = $request->isSpontane;
        
        $villes         = ville::all();
        $mitiers        = mitier::all();
        $experiences    = experience::all();
        $etudes         = etude::all();
        $ecoles         = ecole::all();
        //dd($ecoles);

        $data           = [
            "idAnnonce"     => $idAnnonce,
            "villes"        => $villes,
            "mitiers"       => $mitiers,
            "experiences"   => $experiences,
            "etudes"        => $etudes,
            "ecoles"         => $ecoles
        ];

    //   / dd($data["ecoles"]);
        return view('ClientSide.espaceStageaire.condidatureSpontane')->with('data',$data);
     }
            
        
    

 
    public function store(Request $request){
        
        $req = $request->validate([
            'idAnnonce'         =>'nullable',
            'sex'               =>'nullable',
            'prenom'            =>'nullable',
            'nom'               =>'nullable',
            'email'             =>'nullable',
            'tele'              =>'nullable',
            'ville'             =>'nullable',
            'poste'             =>'nullable',
            'metier'            =>'nullable',
            'annee_experience'  =>'nullable',
            'niveau_etude'      =>'nullable',
            'upload_image'      =>'nullable',
            'file_pdf'          =>'nullable',
            'region'            =>'nullable',
            'dateDebut'         =>'nullable',
            'dateFin'           =>'nullable'
        ]);
        
        
        $newImage = time() . '-' . $request->nom . '.' . $request->upload_image->extension();
        $request->upload_image->move(public_path('images/profiles'), $newImage);
        dd($newImage);
        $newPDF = time() . '-' . $request->file_pdf . '.' . $request->file_pdf->getClientOriginalExtension();
        $pdf = $request->file_pdf->move(public_path('cv'), $newPDF);
        // dd($pdf);

        //$textContent = $this->getTextFromPDF($pdf);
        //$dataAnonce     = anonce::where('id',$req["idAnnonce"])->get();
        //$jobDescription = $dataAnonce[0]['Discription_poste'];
        
        //$score = $this->getScore($textContent,$jobDescription,$request->idAnonce);
        //$req +=["score"=>$score];

        stageaire::insert($req);

        return redirect()->route('stageaire.store', $req['idAnnonce'])->with('success','votre demande est bien enregistrer !');

    }

     public function storeStage(Request $request){
        //dd("stor");
        
        $req = $request->validate([
            'idAnnonce'         =>'nullable',
            'sex'               =>'required',
            'prenom'            =>'required',
            'nom'               =>'required',
            'cin'               =>'required',
            'email'             =>'required',
            'tele'              =>'required',
            'ville'             =>'required',
            'poste'             =>'nullable',
            'metier'            =>'required',
            'annee_experience'  =>'nullable',
            'niveau_etude'      =>'nullable',
            'ecole'             =>'nullable',
            'motivation'        =>'nullable',
            'upload_image'      =>'nullable',
            'file_pdf'          =>'nullable',
            'region'            =>'nullable',
            'dateDebut'         =>'nullable',
            'dateFin'           =>'nullable'
        ]);
        Mail::to($request->email)->send(new confirmmail);
        
        $newImage = time() . '-' . $request->nom . '.' . $request->upload_image->extension();
        $request->upload_image->move(public_path('images/profiles'), $newImage);
       // dd("tst sp");
        $newPDF = time() . '-' . $request->file_pdf . '.' . $request->file_pdf->getClientOriginalExtension();
        $pdf = $request->file_pdf->move(public_path('cv'), $newPDF);
       
        // $textContent = $this->getTextFromPDF($pdf);
        // $dataAnonce     = anonce::where('id',$req["idAnnonce"])->get();
        // $jobDescription = $dataAnonce[0]['Discription_poste'];
        
        // $score = $this->getScore($textContent,$jobDescription,$request->idAnonce);
        // $req +=["score"=>$score];

        stageaire::insert($req);
        DB::table('formulaire')->insert($req);
    //    //dd("ok store");
        return redirect()->route('stageaire.indexSP', $req['idAnnonce'])->with('success','votre demande est bien enregistrer !');

    }

    public function accept($id){

        stageaire::where('id', $id)->update(array('accepted' => 'accepted'));
        return redirect("/dashboard/mailCondidat/$id");
    }

    public function refuse($id){

        stageaire::where('id', $id)->update(array('accepted' => 'refused'));
        return redirect("/dashboard/mailCondidat/$id");
    }
    
   /**
     * get Scoor()
     * @param : text 
     * * this function used to compare twoo text, and return the score %*
     */

    public function getScore($text,$jobDescription,$idAnonce){
        
        $score          =  similar_text($text, $jobDescription, $percent);
        return $percent;
    }

     /**
     * get getTextFromPDF()
     * @param : path  
     * * this function used to extract text from PDF, and return the text *
     */
    public function getTextFromPDF($path){
        $parser = new \Smalot\PdfParser\Parser(); 
        $pdf = $parser->parseFile($path); 
        return $pdf->getText();
       
    }

    public function checkCIN(Request $request){
        //nom prenom, cin periode: critere de filtere..
        $cin = $request->cin;
        $res = stageaire::where("CIN",$cin)->get();
        if(count($res)>=1){return response("find");}
        else return response("not found");
        //dd($res);
    }

    public function listCv(){
        $cv = stageaire::all();
        return view('adminSide.Recrutement.CVTheque.ListeCV')->with('CVs',$cv);
    }
     public function listCvByAnonce(Request $req){
         
        $idAnnonce = $req->idAnonce;
        $cv = stageaire::where('idAnonce',$idAnnonce)->get();
        
        return view('adminSide.Recrutement.CVTheque.ListeCVbyAnonce')->with('CVAn',$cv);


    }


    public function config(){
        return view('adminSide.config');
    }

    public function MailCondidat(Request $request){
        //dd($request->idCondidat);
        $infoCondidat = stageaire::where('id',$request->idCondidat)->get();
        //dd($infoCondidat);
        return view('adminSide.Recrutement.mail.mailingCondidat')->with('condidat',$infoCondidat);
    }

    public function sendmail($email){
        Mail::to($email)->send(new selectionmail);
        return redirect('/dashboard');
    }

    public function addMail(){
        return view('adminSide.Recrutement.mail.buildMail');
    }

    public function listCvFilter(request $request){
        $req = $request->validate([
            'experience' =>'nullable',
            'secteur' =>'nullable'
            ]
        );
        $keyword = $_GET['keyword'];

        $CVs = stageaire::where('nom', 'LIKE', '%'.$keyword.'%' )
        ->where('annee_experience', 'LIKE', '%'.$req['experience'].'%')
        ->where('metier', 'LIKE', '%'.$req['secteur'].'%')->get();
        return view('adminSide.Recrutement.CVTheque.ListeCV', compact('CVs'));
    }
    

}