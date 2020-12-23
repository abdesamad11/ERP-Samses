<?php

namespace App\Http\Controllers;

use App\Model\GP\Client;
use App\Model\GS\Activite;
use App\Model\GS\Vservice;
use App\Parameter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $vservice=Vservice::with('Activites')->get();

        $client =DB::table('vservices')
        ->join('clients', 'clients.id', '=', 'vservices.clients_id')
        ->select('clients.nom_cl')
        ->first();

       // dd($vservice,$client);

        return view('admin.GS.vserv.index',compact('vservice','client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients=Client::all();
        $service=Activite::all();

        return view('admin.GS.vserv.create',compact('clients','service'));
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
     //   dd($request->all());
        $data=array();

        $clients_id=$request->input('clients_id');
         if($clients_id==0){

             return redirect('/admin/GP/vente/create')->withToastWarning('Veuiller Entre Client Exacte  !');

         }else{


        $date_ser=$request->input('date_ser');
        $qte=$request->input('qty',[]);
        $prod = $request->input('sel_service',[]);
        $remarque=$request->input('remarque');
        $prix=$request->input('price',[]);

         }

         $data['clients_id']=$request->clients_id;
         $data['date_ser']=$request->date_ser;
         $data['total']=$request->total_amount;
         $data['rest']=$request->total_amount;
         $data['remarque']=$remarque;
        // $nbr=Count($products);

           $vente = Vservice::create($data);
            $cur_id=$vente->id;

            $no_sr=date('Y').'-00'.$cur_id;

             DB::table('vservices')
             ->where('id', $cur_id)
             ->update(['num_vs' => $no_sr]);


             for ($i=0; $i<count($prod); $i++) {
                 if ($prod[$i] != '') {


                         $vente->Activites()->attach([$prod[$i]],['prix_vs' => $prix[$i]]);


                   //  $prod->Ventes()->attach($prod[$i],$vente,['quantity' => $qte[$i]]);
                 }
             }


             $vente->save();



          //   return redirect('/admin/GP/produit')->withToastWarning('Sotck de Produit est epuise  !');




          return redirect('/admin/GS/vserv')->withToastSuccess('vente est ajouter avec sucess !');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */

public function devis(Request $request,$id){


    //dd($id);

$clients=DB::table('vservices')
  ->join('clients', 'clients.id', '=', 'vservices.clients_id')
  ->select('clients.nom_cl','clients.ICE','clients.adresse_cl')
  ->where('vservices.id','=',$id)
  ->get();

  //dd($clients);

$venteService=DB::table('vservices')
  ->join('clients', 'clients.id', '=', 'vservices.clients_id')
  ->join('activite_vservice', 'activite_vservice.vservice_id', '=', 'vservices.id')
  ->join('activites','activites.id','=','activite_vservice.activite_id')
  ->select('activites.nom_serv','activites.prix_serv','activites.decription','activite_vservice.prix_vs')
  ->where('vservices.id','=',$id)
  ->get();

//dd($venteService);

  $cod=DB::table('vservices')
  ->join('clients', 'clients.id', '=','vservices.clients_id')
  ->select('vservices.num_vs','vservices.date_ser')
  ->where('vservices.id','=',$id)
  ->Where('vservices.active',0)
  ->get();

 // dd($cod);

  $idf=DB::table('vservices')
  ->join('clients', 'clients.id', '=','vservices.clients_id')
  ->select('vservices.id','vservices.date_ser')
  ->where('vservices.id','=',$id)
  ->Where('vservices.active',0)
  ->get();


 // dd($idf);


  $today = Carbon::today()->format('y-m-d');

  $parameter=Parameter::all();


    $dcv=DB::table('vservices')
    ->join('clients', 'clients.id', '=', 'vservices.clients_id')
    ->join('activite_vservice', 'activite_vservice.vservice_id', '=', 'vservices.id')
    ->where('vservices.id',$id)
    ->sum('prix_vs');

   // dd($dcv);





//dd($parameter);


// $pdf = \PDF::loadView('admin.GP.vente.bl',compact('clients','parameter','today','bl','venteProd','idf'));

//  return $pdf->download('BonLivraison.pdf');

return view('admin.GS.vserv.devis',compact('clients','parameter','today','cod','venteService','idf','dcv'));






     }





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

        $vservice=Vservice::findOrfail($id);

      //  $clients=Client::a();
     //  $service=Activite::with('Vservice')->find($id)->get();

        $clservi=DB::table('vservices')
         ->join('clients', 'clients.id', '=', 'vservices.clients_id')
         ->select('clients.id','clients.nom_cl')
         ->where('vservices.id','=',$id)
         ->first();

         $clients=Client::all();

         $venteService=DB::table('vservices')
        ->join('clients', 'clients.id', '=', 'vservices.clients_id')
        ->join('activite_vservice', 'activite_vservice.vservice_id', '=', 'vservices.id')
        ->join('activites','activites.id','=','activite_vservice.activite_id')
        ->select('activites.id','activites.nom_serv','activites.prix_serv','activite_vservice.prix_vs')
        ->where('vservices.id','=',$id)
        ->get();




        $veService=DB::table('activite_vservice')
        ->join('vservices','vservices.id','=','activite_vservice.vservice_id')
        ->join('activites','activites.id','=','activite_vservice.activite_id')
        ->select('activites.id','activites.nom_serv','activite_vservice.prix_vs')
        ->where('vservices.id','=',$id)
        ->get();


       // dd($veService);

        $activite=Activite::all();

      //  dd($clients);

     //   dd($vservice);

       // dd($venteService);

        return view('admin.GS.vserv.edit',compact('vservice','clients','venteService','activite','clservi','veService'));
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


        $vservice=Vservice::findOrFail($id);

      //  dd($vservice);

        $data=array();



        $clients_id=$request->input('clients_id');
         if($clients_id==0){

             return redirect('/admin/GP/vente/create')->withToastWarning('Veuiller Entre Client Exacte  !');

         }else{


        $date_ser=$request->input('date_ser');
        $qte=$request->input('qty',[]);
        $prod = $request->input('sel_service',[]);
        $remarque=$request->input('remarque');
        $prix=$request->input('price',[]);

         }

        // $data['nom']=$employer->nom=$request->input('nom');
         $data['clients_id']=$vservice->clients_id=$request->clients_id;
         $data['date_ser']=$vservice->date_ser=$request->date_ser;
         $data['total']=$vservice->total=$request->total_amount;
         $data['rest']=$vservice->rest=$request->total_amount;
         $data['remarque']=$vservice->remarque=$remarque;
        // $nbr=Count($products);

         //  $vente = Vservice::create($data);
            $cur_id=$vservice->id;

            $no_sr=date('Y').'-00'.$cur_id;

             DB::table('vservices')
             ->where('id', $cur_id)
             ->update(['num_vs' => $no_sr]);


             for ($i=0; $i<count($prod); $i++) {
                 if ($prod[$i] != '') {


                         $vservice->Activites()->detach([$prod[$i]],['prix_vs' => $prix[$i]]);




                         $vservice->Activites()->attach([$prod[$i]],['prix_vs' => $prix[$i]]);



                   //  $prod->Ventes()->attach($prod[$i],$vente,['quantity' => $qte[$i]]);
                 }
             }


             $vservice->save();



          //   return redirect('/admin/GP/produit')->withToastWarning('Sotck de Produit est epuise  !');




          return redirect('/admin/GS/vserv')->withToastSuccess('vente est ajouter avec sucess !');






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
        $vservice=Vservice::findOrFail($id);


         $vservice->delete();
         $vservice->save();


         return redirect('/admin/GS/vserv')->withToastSuccess('Service Vendu est supprimer !');



    }


    public function supprimer($id){


        $vservice=Vservice::findOrFail($id);

        $vservice->forceDelete($id);

        $vservice->save();



        return redirect('/admin/GS/vserv')->withToastSuccess('Service Vendu est supprimer !');

    }
}
