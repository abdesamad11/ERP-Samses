<?php

namespace App\Http\Controllers;

use App\Model\GP\ReglementVente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReglementVenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ventes = DB::table('reglement_ventes')
        ->join('ventes','reglement_ventes.vente_id','=','ventes.id')
        ->join('clients', 'ventes.clients_id', '=', 'clients.id')
        ->select('reglement_ventes.id','reglement_ventes.vente_id','reglement_ventes.Mode','reglement_ventes.date_reglemant','reglement_ventes.remarque','reglement_ventes.Montant','reglement_ventes.nrest','clients.nom_cl')
        ->get();

        $regl=DB::table('reglement_ventes')->sum('nrest');

      //  dd($ventes);

        return view('admin.GP.reglementvente.index',compact('ventes','regl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.GP.reglementvente.create');
    }




    public function reglement($id){


        $ventes = DB::table('ventes')
        ->join('clients', 'ventes.clients_id', '=', 'clients.id')
        ->select('ventes.id','ventes.clients_id','ventes.date_v','ventes.bon_livr','ventes.total','ventes.rest','ventes.remarque','clients.nom_cl')
        ->where('clients.id','=',$id)
        ->get();

       $total= DB::table('ventes')
       ->join('clients', 'ventes.clients_id', '=', 'clients.id')
       ->select('ventes.*','clients.*')
       ->where('clients.id','=',$id)
        ->sum('ventes.total');


        $parameter=DB::table('parameters')->get();



     //  dd($ventes,$total);

        return view('admin.GP.reglementvente.create',compact('ventes','total','parameter'));



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

        $validatedData = $request->validate([

            'total'=>'',
            'vente_id'=>'',
            'mode'=>'required',
            'date_reglement'=>'',
            'montant'=>'required',
            'remarque'=>'',
            'valide'=>'',
            'compte'=>'',
            'date_echance'=>'',

                ]);

          //  dd($request->all());

        $total=$request->input('total');
        $vente_id=$request->input('vente_id');
        $mode=$request->input('mode');
        $date_Reg=$request->input('date_reglement');
        $mont=$request->input('montant');
        $remaq=$request->input('remarque');
        $valide=$request->input('valide');
        $date_ech=$request->input('date_echance');

        $rest=$total-$mont;




        $achat=DB::table('achats')->select('id')
                ->where('id','=',$vente_id)
                ->get();

      //  dd(sizeof($achat));

        $data=array();


        foreach($achat as $items){

             $data['vente_id']=$items->id;

            $g=$data['vente_id'];
         }


         //   dd($idfr);


        $data['Mode']=$mode;
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





        $show =ReglementVente::create($data);

        $show->save();




      return redirect('/admin/GP/reglementvente')->withToastSuccess('Reglement  est effectuer avec sucess !');




























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

        $regl=ReglementVente::findOrFail($id);



        $regl->destroy($id);


        $regl->save();




        return redirect('/admin/GP/reglementvente')->withToastSuccess('Reglement vente   est effectuer avec sucess !');






    }
}
