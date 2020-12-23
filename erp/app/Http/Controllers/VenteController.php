<?php

namespace App\Http\Controllers;

use App\c;
use App\Model\GP\Categorie;
use App\Model\GP\Client;
use App\Model\GP\Produit;
use App\Model\GP\Vente;
use App\Parameter;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class VenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $ventes =DB::table('ventes')
        ->join('clients', 'clients.id', '=', 'ventes.clients_id')
        ->join('produit_vente', 'produit_vente.vente_id', '=', 'ventes.id')
        ->join('produits','produits.id','=','produit_vente.produit_id')
        ->select('ventes.id','clients.nom_cl','ventes.date_v','produits.name','ventes.total','ventes.rest','ventes.remarque')
        ->get();


        $client =DB::table('ventes')
        ->join('clients', 'clients.id', '=', 'ventes.clients_id')
        ->select('clients.nom_cl')
        ->first();

        $vente=Vente::with('produits')->get();

      //  dd($client);

       // dd($vente);

        return view('admin.GP.vente.index',compact('vente','client'));
    }

    public function search(Request $request){
        //   dd($request->all());

           $de=$request->input('date_deb');
           $fi=$request->input('date_fin');



           $ventes =DB::table('ventes')
           ->join('clients', 'clients.id', '=', 'ventes.clients_id')
           ->join('produit_vente', 'produit_vente.vente_id', '=', 'ventes.id')
           ->join('produits','produits.id','=','produit_vente.produit_id')
           ->select('ventes.id','clients.nom_cl','ventes.date_v','produits.name','ventes.total','ventes.rest','ventes.remarque')
           ->whereBetween('ventes.date_V',[$de,$fi])
           ->get();


           $vente=Vente::with('produits')
                        ->whereBetween('ventes.date_V',[$de,$fi])
                        ->get();

                        $client =DB::table('ventes')
                        ->join('clients', 'clients.id', '=', 'ventes.clients_id')
                        ->select('clients.nom_cl')
                        ->first();

         //  dd($vente->all());


          return view('admin.GP.vente.index',compact('vente','client'));


       }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients=Client::all();


        $produits=Produit::with('categorie')->get();


        $CategorieData['data'] = Categorie::orderby("nom_cat","asc")
        ->select('id','nom_cat')
        ->get();

        $deta=0;

        return view('admin.GP.vente.create',compact('clients','produits','CategorieData','deta'));
    }





    public function getProudit($Categorieid=0){

        // Fetch  produit by categorie
        $ProduitData['data'] = Produit::orderby('name','asc')
        			->select('id','name','quantite_rest')
        			->where('cat_id',$Categorieid)
        			->get();

        echo json_encode($ProduitData);

        exit;


    }

    public function getQte($id=0){

        // Fetch  produit by categorie
        $ProduitData['data'] = Produit::orderby('name','asc')
        			->select('name','quantite_rest','prix_ht_vente')
        			->where('id',$id)
        			->get();

        echo json_encode($ProduitData);

        exit;


    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

     // dd($request->all());

     //  $no_blcd='BL-'.date('Y').'-'.$no_bl.'-'.mt_rand(100,999);

       // dd(count($products));

       $data=array();

       $clients_id=$request->input('clients_id');
        if($clients_id==0){

            return redirect('/admin/GP/vente/create')->withToastWarning('Veuiller Entre Client Exacte  !');

        }else{

       $date_vente=$request->input('date_vente');
       $qte=$request->input('qty',[]);
       $prod = $request->input('product',[]);
       $remarque=$request->input('remarque');
       $no_bl=$request->input('bonliv');
       $num_Fact=$request->input('no_facture');
       $no_blcd='BL-'.date('Y').'-'.$no_bl.'-'.mt_rand(100,999);
       $nu_Fact='Fact-'.date('Y').'-'.$num_Fact.'-'.mt_rand(100,999);

        }

        $data['clients_id']=$request->clients_id;
        $data['date_v']=$request->date_vente;
        $data['total']=$request->total_amount;
        $data['rest']=$request->total_amount;
        $data['remarque']=$request->remarque;
        $data['num_facture']=$nu_Fact;
        $data['num_bl']=$no_blcd;

       // $nbr=Count($products);


        $produit=new Produit();
        $qto=$produit->quantite_init;
        $qte_R=$produit->quantite_rest;
        if($qte_R >= 2){

            $vente = Vente::create($data);
            $vente->save();


            for ($i=0; $i<count($prod); $i++) {
                if ($prod[$i] != '') {

                    if($qte[$i]>=$qto){

                       return redirect('/admin/GP/vente/create')->withToastWarning('Verifier quantite du produit !');

                    }else{

                        $vente->produits()->attach([$prod[$i]],['quantity' => $qte[$i]]);

                    }


                  //  $prod->Ventes()->attach($prod[$i],$vente,['quantity' => $qte[$i]]);
                }
            }

        }else{

            $vente = Vente::create($data);
            $vente->save();

            for ($i=0; $i<count($prod); $i++) {
                if ($prod[$i] != '') {

                    if($qte[$i]<=$qto){

                       return redirect('/admin/GP/vente/create')->withToastWarning('Verifier quantite du produit !');

                    }else{

                        $vente->produits()->attach([$prod[$i]],['quantity' => $qte[$i]]);

                    }


                  //  $prod->Ventes()->attach($prod[$i],$vente,['quantity' => $qte[$i]]);
                }
            }

         //   return redirect('/admin/GP/produit')->withToastWarning('Sotck de Produit est epuise  !');


        }



         return redirect('/admin/GP/vente')->withToastSuccess('vente est ajouter avec sucess !');





    }


    public function print(Request $request,$id){

      //  dd($id);


  $clients=DB::table('ventes')
      ->join('clients', 'clients.id', '=', 'ventes.clients_id')
      ->select('clients.nom_cl','clients.ICE','clients.adresse_cl')
      ->where('ventes.id','=',$id)
      ->get();

      //dd($clients);

  $venteProd=DB::table('ventes')
      ->join('clients', 'clients.id', '=', 'ventes.clients_id')
      ->join('produit_vente', 'produit_vente.vente_id', '=', 'ventes.id')
      ->join('produits','produits.id','=','produit_vente.produit_id')
      ->select('produits.reference_prod','produits.name','produits.designation','produits.unite','produit_vente.quantity')
      ->where('ventes.id','=',$id)
      ->get();

    //  dd($venteProd);

      $bl=DB::table('ventes')
      ->join('clients', 'clients.id', '=','ventes.clients_id')
      ->select('ventes.num_bl','ventes.date_v')
      ->where('ventes.id','=',$id)
      ->Where('ventes.active',0)
      ->get();


      $idf=DB::table('ventes')
      ->join('clients', 'clients.id', '=','ventes.clients_id')
      ->select('ventes.id','ventes.date_v')
      ->where('ventes.id','=',$id)
      ->Where('ventes.active',0)
      ->get();


     //  dd($idf);


      $today = Carbon::today()->format('y-m-d');
   //   $dor=(new Carbon($today))->addWeeks(4)->format('y-m-d');
    // dd($dor,$today);
    //  dd($achats,$achatProd);


    $parameter=Parameter::all();



    //dd($parameter);
    DB::table('ventes')
    ->where('id', $id)
    ->update(['bon_livr' => true]);

   // $pdf = \PDF::loadView('admin.GP.vente.bl',compact('clients','parameter','today','bl','venteProd','idf'));

  //  return $pdf->download('BonLivraison.pdf');

   return view('admin.GP.vente.bl',compact('clients','parameter','today','bl','venteProd','idf'));




 //   return redirect('/admin/GP/vente')->withToastSuccess('Bon Livraison est Bien Valider  avec sucess !');




      }



      public function pdf(Request $request,$id){

     //    dd($id);


    $clients=DB::table('ventes')
        ->join('clients', 'clients.id', '=', 'ventes.clients_id')
        ->select('clients.nom_cl','clients.ICE','clients.adresse_cl')
        ->where('ventes.id','=',$id)
        ->get();

        //dd($clients);

    $venteProd=DB::table('ventes')
        ->join('clients', 'clients.id', '=', 'ventes.clients_id')
        ->join('produit_vente', 'produit_vente.vente_id', '=', 'ventes.id')
        ->join('produits','produits.id','=','produit_vente.produit_id')
        ->select('produits.reference_prod','produits.name','produits.designation','produits.unite','produit_vente.quantity')
        ->where('ventes.id','=',$id)
        ->get();

      //  dd($venteProd);

        $bl=DB::table('ventes')
        ->join('clients', 'clients.id', '=','ventes.clients_id')
        ->select('ventes.num_bl','ventes.date_v')
        ->where('ventes.id','=',$id)
        ->Where('ventes.active',0)
        ->get();


        $idf=DB::table('ventes')
        ->join('clients', 'clients.id', '=','ventes.clients_id')
        ->select('ventes.id','ventes.date_v')
        ->where('ventes.id','=',$id)
        ->Where('ventes.active',0)
        ->get();


       //  dd($idf);


        $today = Carbon::today()->format('y-m-d');
     //   $dor=(new Carbon($today))->addWeeks(4)->format('y-m-d');
      // dd($dor,$today);
      //  dd($achats,$achatProd);


      $parameter=Parameter::all();

      //dd($parameter);


      $pdf = \PDF::loadView('admin.GP.vente.bl',compact('clients','parameter','today','bl','venteProd','idf'));

     return $pdf->download('BonLivraison.pdf');

     // return view('admin.GP.vente.bl',compact('clients','parameter','today','bl','venteProd','idf'));




    //return redirect('/admin/GP/vente')->withToastSuccess('Bon Livraison est Bien Valider  avec sucess !');




        }


    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
