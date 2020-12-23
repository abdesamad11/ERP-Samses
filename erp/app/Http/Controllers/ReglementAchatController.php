<?php

namespace App\Http\Controllers;
use App\Model\GP\Achat;
use App\Model\GP\Fournisseur;
use App\Model\GP\Produit;
use App\Model\GP\Categorie;
use App\Model\GP\ReglementAchat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReglementAchatController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){


        $reglement=ReglementAchat::with('Achat')->get();

        $regl=DB::table('reglement_achats')->sum('Montant');

      //  dd($reglement);

        return view('admin.GP.reglementachat.index',compact('reglement','regl'));


    }



    public function reglement($id){

       // dd($id);


        $achats = DB::table('achats')
        ->join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')
        ->select('achats.*','fournisseurs.*')
        ->where('fournisseurs.id','=',$id)
        ->get();

       $total= DB::table('achats')
       ->join('fournisseurs', 'achats.fournisseur_id', '=', 'fournisseurs.id')
       ->select('achats.*','fournisseurs.*')
       ->where('fournisseurs.id','=',$id)
        ->sum('achats.rest');


        $parameter=DB::table('parameters')->get();



      //  dd($achats,$total);

        return view('admin.GP.reglementachat.create',compact('achats','total','parameter'));


    }



    public function store(Request $request){

    //    dd($request->all());

        $validatedData = $request->validate([

            'total'=>'',
            'achat_id'=>'',
            'mode'=>'required',
            'numero'=>'required',
            'date_reglement'=>'',
            'montant'=>'required',
            'remarque'=>'',
            'valide'=>'',
            'compte'=>'',
            'date_echance'=>'',

                ]);

          //  dd($request->all());

        $total=$request->input('total');
        $achat_id=$request->input('achat_id');
        $mode=$request->input('mode');
        $numero=$request->input('numero');
        $date_Reg=$request->input('date_reglement');
        $mont=$request->input('montant');
        $remaq=$request->input('remarque');
        $valide=$request->input('valide');
        $date_ech=$request->input('date_echance');

        $rest=$total-$mont;




        $achat=DB::table('achats')->select('id')
                ->where('no_commande','=',$achat_id)
                ->get();

      //  dd(sizeof($achat));

        $data=array();


        foreach($achat as $items){

             $data['achat_id']=$items->id;

            $g=$data['achat_id'];
         }


         //   dd($idfr);


        $data['Mode']=$mode;
        $data['numero']=$numero;
        $data['date_reglemant']=$date_Reg;
        $data['remarque']=$remaq;
        $data['Montant']=$mont;
        if($valide==0){

            $data['valide']=0;

        }else{

            $data['valide']=1;
        }

        $data['echeance']=$date_ech;


        $data['nrest']=$rest;


        $reslo = DB::table('achats')
              ->where('id', $g)
              ->update(['rest' => $rest]);





        $show =ReglementAchat::create($data);

        $show->save();




      return redirect('/admin/GP/reglementachat')->withToastSuccess('Reglement  est effectuer avec sucess !');


          //  dd($total);

    //    $data=array();

     //   $data['total']=$request->total;

     //  $show = Attestation::create($data);
     //  $show->save();


    }

    public function etat(Request $request){

      //  dd($request->all());


        $id=$request->input('id');

        $debut=$request->input('date_deb');

        $fin=$request->input('date_fin');

      //  $achats = DB::table('reglement_achats')
      //  ->join('achats', 'achats.id', '=', 'reglement_achats.achat_id')
      //  ->where('achats.fournisseur_id','=',$id)
      //->get();

      $achats=DB::table('reglement_achats')
                ->join('achats','achats.id', '=', 'reglement_achats.achat_id')
                ->join('fournisseurs','achats.fournisseur_id','=','fournisseurs.id')
                ->where('fournisseurs.id','=',$id)
                ->whereBetween('reglement_achats.date_reglemant',[$debut,$fin])
                ->get();


      //  dd($achats);


     //   $reglement=ReglementAchat::with('Achat')->get();

        $rogl=DB::table('reglement_achats')
        ->join('achats','achats.id', '=', 'reglement_achats.achat_id')
        ->join('fournisseurs','achats.fournisseur_id','=','fournisseurs.id')
        ->where('fournisseurs.id','=',$id)
        ->whereBetween('reglement_achats.date_reglemant',[$debut,$fin])
        ->sum('nrest');


        $nm=DB::table('fournisseurs')->select('nom_f')->where('id','=',$id)->get();

      //  dd($nom);
      //  dd($nm);
      //  dd($regl);

        return view('admin.GP.reglementachat.etat',compact('achats','rogl','nm'));
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

       // dd($id);


     //   $reglement=ReglementAchat::find($id);

        ReglementAchat::destroy($id);


      //  dd($reglement);


     //   $reglement->destroy();


      //  $reglement->save();



        return redirect('/admin/GP/reglementachat')->withToastSuccess('Reglement achat   est effectuer avec sucess !');


    }










}
