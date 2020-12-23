<?php

use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {return view('welcome');});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//--------------------------Dasborad Users------------------//
Route::get('/users/bord','UserController@bord')->name('users.bord');

Route::get('/admin/GU/users','UserController@index')->name('users.index');
Route::get('/admin/GU/users/create','UserController@create')->name('users.create');


//-----------------------------End---------------------------//


//--------------------------Adminsatraion--------------------+++++++++++++++++++++++++++++++++++++++++//
Route::get('/admin/bord', 'HomeController@bord')->name('admin.bord');
Route::get('/admin/Eord', 'HomeController@Ebord')->name('admin.Ebord');

//--------------------------Profile--------------------------------------------//

Route::resource('/admin/profile', 'ProfilController');

//-----------------------------fin----------------------------------------------//




//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/admin','HomeController@bord')->name('bord');

//------------------- Gestion RH--------------------------------------------------------------//
Route::resource('/admin/RH/gemp', 'EmployerController');
Route::get('export', 'EmployerController@export');
Route::get('import', 'EmployerController@csv');
Route::post('/admin/RH/gemp/create','EmployerController@store')->name('gemp.store');
Route::post('/admin/RH/gemp','EmployerController@search')->name('gemp.search');
//Route::get('/admin/gemp','EmployerController@pdf')->name('gemp.pdf');
// Gestion service
//Route::get('/admin/gemp','EmployerController@export');
Route::resource('/admin/RH/serviices', 'ServiceController');
// fin gestion
//-------------------------------Gestion conger------------------------------------//
Route::resource('/admin/RH/conger', 'CongeController');
Route::post('/admin/RH/conger','CongeController@search')->name('conger.search');
Route::post('/admin/RH/conger/create','CongeController@store')->name('conger.store');
Route::post('/admin/RH/conger/{id}','CongeController@etat')->name('conger.etat');
Route::get('/admin/RH/conger/show/{id}','CongeController@pdfview')->name('conger.pdfview');
// end conger
// gestion attestation  et notation
//------------------------------------gestion attestation-------------------------//
Route::get('/admin/RH/attestation/archive','AttestationController@archive')->name('attestation.archive');
Route::get('/admin/RH/attestation/all','AttestationController@all')->name('attestation.all');
Route::patch('/admin/RH/attestation/restore/{id}','AttestationController@restore')->name('attestation.restore');
Route::resource('/admin/RH/attestation', 'AttestationController');
Route::post('/admin/RH/attestation/create','AttestationController@store')->name('attestation.store');
Route::post('/admin/RH/attestation','AttestationController@search')->name('attestation.search');
Route::post('/admin/RH/attestation/{id}','AttestationController@etat')->name('attestation.etat');
Route::get('/admin/RH/attestation/print/{id}','AttestationController@print')->name('attestation.print');

//---------------------------notation----------------------------------------//
Route::resource('/admin/RH/notations', 'EvaluationController');
Route::post('/admin/RH/notations/{id}','EvaluationController@etat')->name('notations.etat');
// Fin gestion
//-----------------------End RH -----------------------------------------------------------------//


//-----------------------Parameter--societe------------------------------------------------------//
Route::resource('/admin/parameter', 'ParameterController');
//Route::get('/admin/parameter', 'ParameterController@index')->name('parameter.index');
//Route::get('/admin/parameter', 'ParameterController@create')->name('parameter.create');
//--------------------------fin--------------------------------------------------------------------//


//-----------------------------------Gestion Achats et vente------------------------//

//---------------------------categorie++++++++++++++++++++++++++++//
Route::resource('/admin/GP/categorie', 'CategorieController');
//---------------------------end----------------------------------//

//---------------------------produit-----------------------------------//
Route::get('/admin/GP/produit/archive','ProduitController@archive')->name('produit.archive');
Route::get('/admin/GP/produit/all','ProduitController@all')->name('produit.all');
Route::resource('/admin/GP/produit', 'ProduitController');
Route::post('/admin/GP/produit','ProduitController@search')->name('produit.search');
Route::post('/admin/GP/produit/create','ProduitController@store')->name('produit.store');
Route::patch('/admin/GP/produit/restore/{id}','ProduitController@restore')->name('produit.restore');
Route::delete('/admin/GP/produit/forcedelete/{id}','ProduitController@forcedelete')->name('produit.forcedelete');

//---------------------------end----------------------------------------//

//--------------------------Fournisseurs---------------------------------//
Route::resource('/admin/GP/fornisseurs', 'FournisseurController');

//------------------------fin------------------------------------------//

//-------------------------AchatsProduits-----------------------------------//
Route::resource('/admin/GP/achat', 'AchatController');
Route::get('/admin/GP/achat/getProudit/{id}','AchatController@getProudit')->name('getProduit');
Route::get('/admin/GP/achat/getQte/{id}','AchatController@getQte')->name('getQte');
Route::post('/admin/GP/achat','AchatController@search')->name('achat.search');
Route::post('/admin/GP/achat/create','AchatController@store')->name('achat.store');
//Route::get('/admin/GP/achat/{id}','AchatController@prComd')->name('achat.bcmd');
//-------reglementachatas ----//
Route::get('/admin/GP/reglementachat','ReglementAchatController@index')->name('reglementachat.index');
Route::get('/admin/GP/reglementachat/{id}','ReglementAchatController@reglement')->name('achat.reglement');
Route::post('/admin/GP/reglementachat/create','ReglementAchatController@store')->name('reglementachat.store');
Route::post('/admin/GP/reglementachat/etat','ReglementAchatController@etat')->name('reglementachat.etat');
//Route::get('/admin/GP/reglementachat/regl','ReglementAchatController@etat');
Route::delete('/admin/GP/reglementachat/{id}','ReglementAchatController@destroy')->name('reglementachat.destroy');

Route::get('/admin/GP/achat/bcmd/{id}','AchatController@print')->name('achat.bcmd');

Route::get('/admin/GP/achat/accepter/{id}','AchatController@accepter')->name('achat.accepter');

//-------------------------fin--------------------------------------//
//---------------------------Stock-Entree--------------------------//
Route::resource('/admin/GP/stockIn', 'StockInController');
Route::get('/admin/GP/stockIn/getProduit/{id}','StockInController@getProduit')->name('getProduit');
Route::get('/admin/GP/stockIn/getAchat/{id}','StockInController@getAchat')->name('getAchat');

Route::post('/admin/GP/stockIn/create','StockInController@store')->name('stockIn.store');
Route::post('/admin/GP/stockIn','StockInController@search')->name('stockIn.search');
//----------------------------Fin----------------------------------//


//-------------------------Clients-----------------------------------//
Route::resource('/admin/GP/clients', 'ClientController');

//-------------------------fin--------------------------------------//
//-----------------------VentProduits-------------------------------//
Route::resource('/admin/GP/vente', 'VenteController');
Route::post('/admin/GP/vente/create','VenteController@store')->name('vente.store');
Route::get('/admin/GP/vente/bl/{id}','VenteController@print')->name('vente.bl');


//Route::post('/admin/GP/vente/bl/{id}','VenteController@pdf')->name('vente.pdf');



Route::get('/admin/GP/vente/getProudit/{id}','VenteController@getProudit')->name('getProduit');
Route::get('/admin/GP/vente/getQte/{id}','VenteController@getQte')->name('getQte');
Route::post('/admin/GP/vente','VenteController@search')->name('ventes.search');


//--------------------------fin-------------------------------------//

//------------------------reglement vente --------------------------//
Route::get('/admin/GP/reglementvente','ReglementVenteController@index')->name('reglementvente.index');
Route::get('/admin/GP/reglementvente/{id}','ReglementVenteController@reglement')->name('vente.reglement');
Route::post('/admin/GP/reglementvente/create','ReglementVenteController@store')->name('reglementvente.store');
Route::delete('/admin/GP/reglementvente/{id}','ReglementVenteController@destroy')->name('reglementvente.destroy');

//------------------------------------------------------------------//
//---------------------------stock out------------------------------//
Route::resource('/admin/GP/stockOut', 'StockOutController');
//-------------------------------------------------------------------//
//-------------------------facture Produit -----------------------------------//
//-------------------------fin--------------------------------------//
//-------------------------devis Produit -----------------------------------//

//-------------------------fin--------------------------------------//

//------------------------- Model Service-----------------------------------//
Route::resource('/admin/GS/offre', 'ActiviteController');

//------------------------devis--------------------------------------//
Route::resource('/admin/GS/devis', 'DevisController');
//-------------------------facture----------------------------------//
Route::resource('/admin/GS/facturation', 'FactureController');

//--------------------------Vendu--Services--------------------------//
Route::resource('/admin/GS/vserv', 'VserviceController');
Route::get('/admin/GS/vserv/devis/{id}','VserviceController@devis')->name('vserv.devis');
Route::delete('/admin/GS/vserv/{id}','VserviceController@destroy')->name('vserv.destroy');
Route::get('/admin/GS/facturation/create/{facturation}','FactureController@seradd')->name('facturation.seradd');
Route::get('/admin/GS/facturation/{facturation}','FactureController@show')->name('facturation.show');


//Route::delete('/admin/GS/vserv/{id}','VserviceController@supprimer')->name('vserv.supprimer');








//---------------------------fin-------------------------------------//

//--------------------------Reglement Service------------------------//
Route::resource('/admin/GS/reglement', 'ReglementserviceController');

Route::get('/admin/GS/reglement/create/{reglement}','ReglementserviceController@regladd')->name('reglement.regladd');






//-----------------------------fin----------------------------------//

//-------------------------fin--------------------------------------//






//-----------------------------Projet et chat-------------------------------//

Route::resource('/admin/Projet', 'ProjetController');
Route::get('/admin/chat', 'ProjetController@chat')->name('chat.index');


//----------------------------fin-----------------------------------//
//Route::get('/admin/GP/facturation','FactureController@test');






//----------------------------------fin-----------------------------------------------------------------------//






















// FIN RH
// test pdf
//Route::get('/admin/pdf','pdfController@vue');
//Route::get('/admin/pdf','pdfController@index');
Route::get('/admin/pdf','pdfController@test');

Route::get('/admin/pdf/dg','pdfController@vente');
//Route::get('/admin/pdf','pdfController@index');


//Route::get('/admin/pdf','pdfController@test');





