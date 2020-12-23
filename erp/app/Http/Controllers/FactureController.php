<?php

namespace App\Http\Controllers;

use App\Model\GS\Facture;
use App\Parameter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $facture=DB::table('factures')
                    ->join('vservices','factures.vservices_id','=','vservices.id')
                    ->join('clients','vservices.clients_id','=','clients.id')
                    ->select('factures.id','factures.num_f','factures.date_f','clients.nom_cl','vservices.total','factures.etat')
                    ->where('factures.deleted_at',NULL)
                    ->get();


      //  dd($facture);
        return view('admin.GS.facturation.index',compact('facture'));


    }



    public function seradd($id){

           // dd($id);

        //   return view('admin.GS.facturation.vsrv');


        $codID=DB::table('vservices')
        ->select('id','num_vs')
        ->where('vservices.id','=',$id)
        ->first();

       // dd($codID);

        return view('admin.GS.facturation.create',compact('codID'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.GP.facturation.create');
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

        $data=array();


        $data['vservices_id']=$cod_id=$request->input('cod_id');
        $data['num_f']=$reference_f=$request->input('reference_f');
        $orderStatus=$request->input('orderStatus');
        if($orderStatus=='Processing'){
            $od=0;
        }elseif($orderStatus=='Delivered'){
            $od=1;
        }

        $data['etat']=$od;
        $data['date_f']=$date_f=$request->input('date_f');
        $data['date_exp']=$date_limit_f=$request->input('date_limit_f');
        $data['condition']=$remarque=$request->input('remarque');



        $facture=Facture::create($data);
        $facture->save();



         return redirect('/admin/GS/facturation')->withToastSuccess('Facture  est cree avec sucess !');




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

      //  dd($id);


$clients=DB::table('factures')
->join('vservices','factures.vservices_id','=','vservices.id')
->join('clients','vservices.clients_id','=','clients.id')
->select('clients.nom_cl','clients.ICE','clients.adresse_cl')
->where('factures.deleted_at',NULL)
->where('factures.id',$id)
->get();

// dd($cls);

$venteService=DB::table('factures')
->join('vservices','factures.vservices_id','=','vservices.id')
->join('clients', 'clients.id', '=', 'vservices.clients_id')
->join('activite_vservice', 'activite_vservice.vservice_id', '=', 'vservices.id')
->join('activites','activites.id','=','activite_vservice.activite_id')
->select('activites.nom_serv','activites.prix_serv','activites.decription','activite_vservice.prix_vs')
->where('factures.id','=',$id)
->get();

//dd($venteService);

$cod=DB::table('factures')
->join('vservices','factures.vservices_id','=','vservices.id')
->join('clients', 'clients.id', '=', 'vservices.clients_id')
->select('factures.num_f','vservices.date_ser','factures.date_f','factures.date_exp')
->where('factures.id','=',$id)
->Where('vservices.active',0)
->get();

//dd($cod);

$idf=DB::table('vservices')
->join('clients', 'clients.id', '=','vservices.clients_id')
->select('vservices.id','vservices.date_ser')
->where('vservices.id','=',$id)
->Where('vservices.active',0)
->get();


// dd($idf);


$condition=DB::table('factures')
->join('vservices','factures.vservices_id','=','vservices.id')
->join('clients', 'clients.id', '=', 'vservices.clients_id')
->select('factures.condition')
->where('factures.id','=',$id)
->first();

//dd($condition);


$today = Carbon::today()->format('y-m-d');

$parameter=Parameter::all();


  $total=DB::table('factures')
  ->join('vservices','factures.vservices_id','=','vservices.id')
  ->join('clients', 'vservices.clients_id', '=', 'clients.id')
  ->join('activite_vservice', 'activite_vservice.vservice_id', '=', 'vservices.id')
  ->where('factures.id',$id)
  ->sum('activite_vservice.prix_vs');

 //dd($dcv);
//dd($parameter);
// $pdf = \PDF::loadView('admin.GP.vente.bl',compact('clients','parameter','today','bl','venteProd','idf'));
//  return $pdf->download('BonLivraison.pdf');

return view('admin.GS.facturation.show',compact('clients','parameter','today','cod','venteService','condition','total'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $fact=Facture::findOrFail($id);

      //  dd($fact);

       // dd($codID);

        return view('admin.GS.facturation.edit',compact('fact'));
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

       // dd($request->all());

        $facture=Facture::findOrFail($id);


        // dd($facture);

        $data=array();

        $did=$request->input('cod_id');
        $data['vservices_id']=$facture->vservices_id=$did;
        $data['num_f']=date('Y').'-00'.$did;
        $orderStatus=$request->input('orderStatus');
        if($orderStatus=='Processing'){
            $od=0;
        }elseif($orderStatus=='Delivered'){
            $od=1;
        }

        $data['etat']=$facture->etat=$od;
        $data['date_f']=$facture->date_f=$request->input('date_f');
        $data['date_exp']=$facture->date_exp=$request->input('date_limit_f');
        $data['condition']=$facture->condition=$request->input('remarque');


     //   $facture=Facture::updated($data);

        $facture->save();





        return redirect('/admin/GS/facturation')->withToastSuccess('facturation  est Modifier avec sucess !');






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

        $facture=Facture::findOrFail($id);


        Facture::destroy($id);

        $facture->save();


        return redirect('/admin/GS/facturation')->withToastSuccess('facturation  est Supprimer avec sucess !');


    }
}
