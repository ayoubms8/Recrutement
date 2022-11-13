<?php

use App\Http\Controllers\AnonceController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StageaireController;
use App\Models\stageaire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Client Routes
Route::get('/',[AnonceController::class,'indexStageaire'])->name('anonce.indexStageaire');
Route::any('/Recrutement',[AnonceController::class,'indexRecrutement'])->name('stageaire.index');

Route::any('/inscription', [StageaireController::class, 'index'])->name('stageaire.store');
Route::any('/condidatur-sp', [StageaireController::class, 'indexCondidatureSP'])->name('stageaire.indexSP');
Route::post('/condidatur-sp/checkCIN', [StageaireController::class, 'checkCIN'])->name('stageaire.checkCIN');

Route::any('/storeStage', [StageaireController::class, 'storeStage'])->name('stageaire.storeStage');

// Admine Routes:
Route::get('/dashboard',[AnonceController::class,'tst'])->name('anonce.tst');

Route::get('/home',[HomeController::class,'redirect']);

Route::post('/store-annonce',[AnonceController::class,'store'])->name('anonce.store');
    //Recrutement:
Route::any('/dashboard/liste-annonce',[AnonceController::class,'getAllAnonce'])->name('anonce.getAllAnonce');
Route::any('/dashboard/liste-annonce-filter',[AnonceController::class,'getAllAnonceFiltrer'])->name('anonce.getAllAnonceFiltrer');
Route::get('/dashboard/liste-annonce-edit/{idAnonce}',[AnonceController::class,'edit'])->name('anonce.edit');
Route::any('/dashboard/liste-annonce-cv/{id}',[AnonceController::class,'getCvByAnonce'])->name('anonce.getCvByAnonce');
Route::any('/dashboard/profile/{id}',[AnonceController::class,'getprofile'])->name('anonce.getprofile');

//Route::post('/dashboard/update-Etat',[AnonceController::class,'updateEtat'])->name('anonce.updateEtat');
    //CVs:
Route::get('/dashboard/liste-cv',[StageaireController::class,'listCv'])->name('stageaire.listCv');
Route::get('/dashboard/liste-cv-accept/{id}',[StageaireController::class,'accept'])->name('stageaire.accept');
Route::get('/dashboard/liste-cv-refuse/{id}',[StageaireController::class,'refuse'])->name('stageaire.refuse');
Route::any('/dashboard/liste-cv-filter',[StageaireController::class,'listCvFilter'])->name('stageaire.listCvFilter');
Route::any('/dashboard/liste-cv-filter/{id}',[StageaireController::class,'listCvFilterByAnnonce'])->name('stageaire.listCvFilterByAnnonce');

Route::get('/dashboard/config',[StageaireController::class,'config'])->name('stageaire.config');
Route::get('/dashboard/creeRecrutement',[AnonceController::class,'indexR'])->name('createRecrutement.indexR');
Route::get('/dashboard/creeStage',[AnonceController::class,'indexS'])->name('createStage.indexS');
Route::any('/dashboard/sendmailto/{email}',[StageaireController::class,'sendmail'])->name('stageaire.sendmail');

    //mail:
Route::any('/dashboard/mailCondidat/{idCondidat}',[StageaireController::class,'MailCondidat'])->name('stagaire.MailCondidat');
Route::get('/dashboard/getMAil',[MailController::class,'index'])->name('mail.index');
Route::any('/dashboard/buildMail',[MailController::class,'storMail'])->name('mail.storMail');
Route::get('/dashboard/getMail',[MailController::class,'getMail'])->name('mail.getMail');

