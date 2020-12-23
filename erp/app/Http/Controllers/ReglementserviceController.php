<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReglementserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.GS.reglement.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.GS.reglement.create');
    }


    public function regladd($id){

        $vservice = DB::table('vservices')
        ->join('clients', 'vservices.clients_id', '=', 'clients.id')
        ->select('vservices.id','vservices.clients_id','vservices.num_vs','vservices.date_ser','vservices.total','vservices.rest','vservices.remarque','clients.nom_cl')
        ->where('vservices.id','=',$id)
        ->get();

       // dd($vservice);

       $total= DB::table('vservices')
       ->join('clients', 'vservices.clients_id', '=', 'clients.id')
       ->select('vservices.*','clients.*')
       ->where('vservices.id','=',$id)
        ->sum('vservices.total');

      //  dd($total);


        $parameter=DB::table('parameters')->get();

        return view('admin.GS.reglement.create',compact('parameter','vservice','total'));

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
    public function update(Request $request,  $id)
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
