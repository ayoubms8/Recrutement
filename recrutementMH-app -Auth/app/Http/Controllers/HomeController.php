<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\anonce;
use App\Models\stageaire;

class HomeController extends Controller
{
    public function redirect(){

        if(Auth::id()){
            if(Auth::user()->usertype=='0'){

                $accepted       = stageaire::where('accepted', 'accepted')->count();
                $refused        = stageaire::where('accepted', 'refused')->count();
                $total          = stageaire::all()->count();
                return view('adminSide.dashboard')->with('total', $total)->with('accepted', $accepted)->with('refused', $refused);
            }
            else{
                $annoces = anonce::ALL()->where('type','S');
                return view('ClientSide.espaceStageaire.Anonce')->with('annoces',$annoces);
            }

        }
        else{
            return redirect()->back();
        }
    }
}
