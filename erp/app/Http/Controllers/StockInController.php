<?php

namespace App\Http\Controllers;

use App\c;
use App\Model\GP\Produit;
use App\Model\GP\StockIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Alert;

class StockInController extends Controller
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

        $achats=DB::table('stock_ins')
        ->join('achats','stock_ins.achat_id','=','achats.id')
        ->join('fournisseurs','achats.fournisseur_id','=','fournisseurs.id')
        ->join('produits','stock_ins.produit_id','=','produits.id')
        ->join('categories','produits.cat_id','=','categories.id')
        ->select('stock_ins.id','categories.nom_cat','produits.name','fournisseurs.nom_f','achats.date_achat','stock_ins.qte_entree','produits.quantite_rest','produits.prix_ht_achat','produits.prix_ht_vente','stock_ins.date_entree')
        ->where('stock_ins.active','=',1)
        ->get();

      //   dd($achats);
        return view('admin.GP.stockIn.index',compact('achats'));
    }




    public function search(Request $request){

       //   dd($request->all());


          $de=$request->input('date_deb');
          $fi=$request->input('date_fin');



          $achats=DB::table('stock_ins')
          ->join('achats','stock_ins.achat_id','=','achats.id')
          ->join('fournisseurs','achats.fournisseur_id','=','fournisseurs.id')
          ->join('produits','stock_ins.produit_id','=','produits.id')
          ->join('categories','produits.cat_id','=','categories.id')
          ->select('stock_ins.id','categories.nom_cat','produits.name','fournisseurs.nom_f','achats.date_achat','stock_ins.qte_entree','produits.quantite_rest','produits.prix_ht_achat','produits.prix_ht_vente','stock_ins.date_entree')
          ->where('stock_ins.active','=',1)
          ->whereBetween('stock_ins.date_entree',[$de,$fi])
          ->get();


        if(empty($achats->toArray())){




            return redirect('/admin/GP/stockIn')->withToastWarning('vérifier la date entre exacte !');







        }else{

           // dd($stockin);


            return view('admin.GP.stockIn.index',compact('achats'));

        }





     //  return view('admin.GP.produit.index', compact('produits'));





      }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $forId=DB::table('fournisseurs')
                    ->join('achats','fournisseurs.id','=','achats.fournisseur_id')
                    ->select('fournisseurs.id','fournisseurs.nom_f')
                    ->where('achats.active','=',1)
                    ->get();

        return view('admin.GP.stockIn.create',compact('forId'));
    }




    public function getProduit($prodId=0){


        $achats['data']=DB::table('achats')
        ->join('fournisseurs','achats.fournisseur_id','=','fournisseurs.id')
        ->join('produits','achats.name','=','produits.name')
        ->select('produits.id','produits.name')
        ->where('achats.active','=',1)
        ->where('achats.fournisseur_id','=',$prodId)
        ->get();



        echo json_encode($achats);

        exit;


    }


    public function getAchat($idach=0){


       // $prodname=DB::table('produits')->select('name')->where('id',$idach)->get();

       $gpro['data']=DB::table('achats')
       ->join('produits','achats.name','=','produits.name')
       ->select('achats.id','produits.name','produits.prix_ht_achat','produits.prix_ht_vente','produits.quantite_rest','achats.qte')
       ->where('achats.active','=',1)
       ->where('produits.id','=',$idach)
       ->get();


        echo json_encode($gpro);

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
      //  dd($request->all());

        $validatedData = $request->validate([

            'achat_id'=>'',
            'prod_id'=>'',
            'qcm'=>'',

            'qte_entre'=>'required',
            'date_entre'=>'required',




                ]);

          //  dd($request->all());





        $achat_id=$request->input('achat_id');
        $prod_id=$request->input('prod_id');
        $qte_entre=$request->input('qte_entre');
        $date_entre=$request->input('date_entre');

        $oldqant=DB::table('produits')
        ->select('quantite_rest')
        ->where('id',$prod_id)->get();

        foreach($oldqant as $item){

            $qr=$item->quantite_rest;

        }


        $qnv=$qr+$qte_entre;



        $stock = new StockIn([
            'achat_id' =>$achat_id,
            'produit_id'=>$prod_id,
            'date_entree'=>$date_entre,
            'qte_entree'=>$qte_entre,
            'active'=>1,
           ]);


        DB::table('produits')->where('id',$prod_id)->update(['quantite_rest'=>$qnv]);


        $stock->save();








      return redirect('/admin/GP/stockIn')->withToastSuccess('Stock est alimanter  avec sucess !');









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
        $stockin=DB::table('stock_ins')
        ->join('achats','stock_ins.achat_id','=','achats.id')
        ->join('fournisseurs','achats.fournisseur_id','=','fournisseurs.id')
        ->join('produits','stock_ins.produit_id','=','produits.id')
        ->join('categories','produits.cat_id','=','categories.id')
        ->select('stock_ins.id','stock_ins.produit_id','stock_ins.achat_id','categories.nom_cat','produits.name','fournisseurs.nom_f','achats.date_achat','stock_ins.qte_entree','produits.quantite_rest','produits.prix_ht_achat','produits.prix_ht_vente','stock_ins.date_entree')
        ->where('stock_ins.active','=',1)
        ->where('stock_ins.id',$id)
        ->first();

      // dd($stockin);


       return view('admin.GP.stockIn.edit',compact('stockin'));

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

      //  $achat_id=$request->input('achat_id');
        $prod_id=$request->input('prod_id');
        $qte_entre=$request->input('qte_entre');


        $oldqant=DB::table('produits')
        ->select('quantite_rest')
        ->where('id',$prod_id)->get();

        foreach($oldqant as $item){

            $qr=$item->quantite_rest;

        }


        $qnv=$qr+$qte_entre;



        $stockin=StockIn::findOrFail($id);


        $data=array();



        $data['date_entree']=$stockin->date_entree=$request->input('date_entre');
        $data['qte_entree']=$stockin->qte_entree=$qnv;



        DB::table('produits')->where('id',$prod_id)->update(['quantite_rest'=>$qnv]);




        $stockin->save();







      return redirect('/admin/GP/stockIn')->withToastSuccess('Stock est Modifier  avec sucess !');






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


        StockIn::destroy($id);



        return redirect('/admin/GP/stockIn')->withToastSuccess('Stox est Supprimer   avec sucess !');






    }
}
