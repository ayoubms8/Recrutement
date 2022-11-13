<?php

namespace App\Http\Controllers;
use App\Models\anonce;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

use App\Models\etude;
use App\Models\experience;
use App\Models\ville;
use App\Models\mitier;
use App\Models\stageaire;

use function PHPSTORM_META\type;

class AnonceController extends Controller
{
    public function indexStageaire(){
        $annoces = anonce::ALL()->where('type','S');
        //return view('welcome');
        return view('ClientSide.espaceStageaire.Anonce')->with('annoces',$annoces);
    }

    public function indexRecrutement(){
        $annoces = anonce::ALL()->where('type','R');
        return view('ClientSide.espaceRecrutement.Anonce')->with('annoces',$annoces);
    }
    public function tst(){

        $villes         = ville::all();
        $mitiers        = mitier::all();
        $experiences    = experience::all();
        $etudes         = etude::all();
        $accepted       = stageaire::where('accepted', 'accepted')->count();
        $refused        = stageaire::where('accepted', 'refused')->count();
        $total          = stageaire::all()->count();
        

        $data           = [
            
            "total"         => $total,
            "accepted"      => $accepted,
            "refused"       => $refused,
            "villes"        => $villes,
            "mitiers"       => $mitiers,
            "experiences"   => $experiences,
            "etudes"        => $etudes
        ];

        return view('adminSide.dashboard')->with('total', 15)->with('accepted', $accepted)->with('refused', $refused);
    }

    public function indexR(){

        return view('adminSide.Recrutement.creatRecrutement');

    }
    public function indexS(){

        return view('adminSide.Recrutement.creatStage');

    }

    public function store(Request $request){
        $req = $request->validate([
            'titre'             =>'required',
            'siege'             =>'nullable',
            'lieux'             =>'nullable',
            'Type'              =>'required',
            'Secteur_activite'  =>'nullable',
            'Type_Contrat'      =>'nullable',
            'Niveau_Poste'      =>'nullable',
            'experience'        =>'nullable',
            'Nombre_Poste'      =>'nullable',
            'discription'       =>'nullable'
        ]);

        //dd($req['discription']);
        anonce::insert($req);
        dd('store');    
        //return redirect()->route('anonce.tst')->with('success','votre Anonce est bien enregistrer !');

    }
    //admin dash:
    public function getAllAnonce(){
         $annoces = anonce::ALL();
         return view('adminSide.Recrutement.listeAnonce')->with('annoces',$annoces);
    
    }
    

    
    public function getAllAnonceFiltrer(Request $request){
        $req = $request->validate([
            'lieux' =>'nullable',
            'secteur' =>'nullable'
            ]
        );
        $keyword = $_GET['keyword'];

        $annoces = anonce::where('titre', 'LIKE', '%'.$keyword.'%' )->where('lieux', 'LIKE', '%'.$req['lieux'].'%')->where('Secteur_activite','LIKE', '%'.$req['secteur'].'%')->get();
        return view('adminSide.Recrutement.listeAnonce', compact('annoces'));
        
        
    }
    public function edit($id){
        dd('edit');
        $idAnonce = anonce::findOrFail($id);
        return view('adminSide.Recrutement.updateRecrutement', compact('idAnonce'));
        // $idAnonce = $request->idAnonce;
        // dd($idAnonce);
        // if (anonce::get()->where('id', $idAnonce)->exists()) {
        //     dd('exist');
        //     $anonce = anonce::get()->where('id', $idAnonce);
        //     return view('adminSide.Recrutement.updateRecrutement', compact('anonce'));
        // }else{
        //     dd("anonce not found");
        // }
        
    }
    
    public function getprofile($id){

        return view('resume.index');
    }

    public function Update(Request $request){
        return view('adminSide.Recrutement.updateRecrutement', compact('request'));
    }

    public function updateEtat(Request $request){
        dd("update etat->cloturer");
        
    }
    
    public function getCvByAnonce(Request $req){
        // dd($req->id);
        $cvByAnonce = stageaire::where('idAnnonce',$req->id)->get();
        
        return view('adminSide.Recrutement.CVTheque.ListeCVbyAnonce')->with('CVAn',$cvByAnonce);
    }
}
