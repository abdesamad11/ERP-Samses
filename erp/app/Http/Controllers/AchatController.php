<?php

namespace App\Http\Controllers;

use AchatProduit;
use App\c;
use App\Model\GP\Achat;
use App\Model\GP\Fournisseur;
use App\Model\GP\Produit;
use App\Model\GP\Categorie;
use App\Parameter;
use Doctrine\DBAL\Driver\SQLSrv\LastInsertId;
use FontLib\Table\Type\name;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;
use PDF;
use Carbon\Carbon;

use function GuzzleHttp\json_decode;

class AchatController extends Controller
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



            $achats = DB::table('achats')
                     ->join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')
                     ->join('produits', 'achats.name', '=', 'produits.name')
                     ->select('achats.*','fournisseurs.*','produits.*')
                     ->get();

         //   dd($achats);



            return view('admin.GP.achat.index',compact('achats'));

    }

    public function search(Request $request){
     //   dd($request->all());

        $de=$request->input('date_deb');
        $fi=$request->input('date_fin');

        $achats = DB::table('achats')
        ->join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')
        ->join('produits', 'achats.name', '=', 'produits.name')
        ->select('achats.*','fournisseurs.*','produits.*')
        ->whereBetween('achats.date_achat',[$de,$fi])
        ->get();

       // dd($achats->all());


       return view('admin.GP.achat.index',compact('achats'));


    }


    public function print(Request $request,$id){

        //  dd($request->all(),$id);

        //  $attestation=Attestation::with('Employer')->where('id','=',$id)->get();


      $achats=DB::table('achats')
      ->join('fournisseurs','achats.fournisseur_id','=','fournisseurs.id')
      ->select('fournisseurs.nom_f','fournisseurs.raison_social','fournisseurs.tele','fournisseurs.email','fournisseurs.ICE','fournisseurs.adresse_f')
      ->where('achats.fournisseur_id','=',$id)
      ->Where('achats.active',0)
      ->first();

     //   dd($achats);

      $achatProd=DB::table('achats')
      ->join('fournisseurs','achats.fournisseur_id','=','fournisseurs.id')
      ->select('achats.no_commande','achats.name','achats.qte','achats.prix','achats.total','achats.remarque')
      ->where('fournisseurs.id','=',$id)
      ->Where('achats.active',0)
      ->get();


      $nocomd=DB::table('achats')
      ->join('fournisseurs','achats.fournisseur_id','=','fournisseurs.id')
      ->select('achats.no_commande')
      ->where('fournisseurs.id','=',$id)
      ->Where('achats.active',0)
      ->first();


       // dd($nocomd);


      $today = Carbon::today()->format('y-m-d');
      $dor=(new Carbon($today))->addWeeks(4)->format('y-m-d');

    // dd($dor,$today);

    //  dd($achats,$achatProd);


    $parameter=Parameter::all();

    //dd($parameter);


   $pdf = PDF::loadView('admin.GP.achat.bcmd',compact('achats','parameter','achatProd','dor','today','nocomd'));


   return  $pdf->download('BonCommande.pdf');




   return redirect('/admin/GP/achat')->withToastSuccess('Bon commande  est Bien Valider  avec sucess !');




      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $produit=Produit::with('Categorie')->get();

        //dd($produit);

      //  $categorie=Categorie::all();
        $CategorieData['data'] = Categorie::orderby("nom_cat","asc")
        			   ->select('id','nom_cat')
        			   ->get();

        $fournisseur=Fournisseur::all();

        return view('admin.GP.achat.create',compact('produit','fournisseur','CategorieData',$CategorieData));
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
        			->select('name','quantite_rest','prix_ht_achat')
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

        $validatedData = $request->validate([

            'date_Achat'=>'',

                ]);

         //   dd($request->all());

        $fourn_id=$request->input('four_id');
        $names =$request->input('name.*');
        $prodID =$request->input('prod_id.*');
        $date_Achat=$request->input('date_Achat');
        $qte=$request->input('qte.*');
        $prix=$request->input('prix.*');
        $total=$request->input('total_price.*');
        $remarque=$request->input('remarque');
        $no_fact=$request->input('no_facture');
        $no_fact=date('Y').'-'.mt_rand(1000,9999);

       //  dd($no_fact);

  //  for($i=0;$i<count($names);$i++){
     ///       $achat=new Achat();

     //       $achat->name=json_encode($names);
     //       $achat->fournisseur_id=$fourn_id;
     //       $achat->date_achat=$date_Achat;
     //       $achat->qte=json_encode($qte);
    //        $achat->prix=json_encode($prix);
    //        $achat->total=json_encode($total);
    //        $achat->remarque=$remarque;
    //        $achat->no_facture=$no_fact.date('Y').'-00'.$i;

 //   }

      //      $achat->save();
         //   dd($achat);

        for($i=0;$i<sizeof($names);$i++){
        $achat = new Achat([
            'name' => $names[$i],
           'fournisseur_id'=>$fourn_id,
            'date_achat'=>$date_Achat,
            'qte'=>$qte[$i],
             'prix'=>$prix[$i],
            'total'=>$total[$i],
            'remarque'=>$remarque,
            'no_commande'=>$no_fact,

           ]);

        //$prd['data']=Produit::where('name',$names[$i]);



         // $prod=new Produit();

        //  $prod->achats()->attach($achat,$prodID[$i]);

        $achat->save();

         //dd($prd);




            }



             //$achat







      return redirect('/admin/GP/achat')->withToastSuccess('achat est ajouter avec sucess !');


          //   $achat->save($request->all());






    }



    public function accepter($id){



            $achats=DB::table('achats')
            ->join('fournisseurs','achats.fournisseur_id','=','fournisseurs.id')
            ->where('achats.fournisseur_id','=',$id)
            ->update(['achats.active'=>1,'achats.status'=>'recu']);

         //   dd($achats);



        return redirect('/admin/GP/achat')->withToastSuccess('Stock est alimanter  avec sucess !');




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
    public function update(Request $request, $id)
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
