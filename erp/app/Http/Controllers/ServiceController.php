<?php

namespace App\Http\Controllers;

use App\Model\RH\Service;

use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $service=Service::all();
        return view('admin.RH.serviices.index',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.RH.serviices.create');

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
           //
           $service=$request->only(['nom','description']);


           $service=Service::create($service);


           return redirect()->route('serviices.index')->withToastSuccess('Services est cree avec sucess !');;

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
        $service=Service::findOrFail($id);


        return view('admin.RH.serviices.show',compact('service'));
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
        $service=Service::findOrfail($id);

        return view('admin.RH.serviices.edit',compact('service'));

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
        $service=Service::findOrFail($id);

        $service->nom=$request->input('nom');
        $service->description=$request->input('description');


        $service->save();




        return redirect()->route('serviices.index')->withToastSuccess('Services est Modifier avec sucess !');
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
        Service::destroy($id);


        return redirect('admin/RH/serviices')->withToastSuccess('Services est Modifier avec sucess !');


    }
}
