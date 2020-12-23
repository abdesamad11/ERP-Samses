<?php

namespace App\Http\Controllers;

use App\c;
use App\Model\GS\Activite;
use Illuminate\Http\Request;

class ActiviteController extends Controller
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
        $service=Activite::all();

        return view('admin.GS.offre.index',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.GS.offre.create');
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

       $validatedData = $request->validate([

        'nom_serv' => 'required',
        'prix' => 'required',
        'decription' => ''
            ]);



        $nom_serv=$request->input('nom_serv');
        $prix=$request->input('prix');
        $description=$request->input('description');


          $data=array();


          $data['nom_serv']=$nom_serv;
          $data['prix_serv']=$prix;
          $data['decription']=$description;




        $active=Activite::create($data);

        $active->save();

    //   $request->session()->flash('status','Categorie est cree  ');

        return redirect('/admin/GS/offre')->withToastSuccess('Offre  Ajouter  avec sucess !');

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
        $service=Activite::findOrFail($id);
        return view('admin.GS.offre.edit',compact('service'));
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
        $service=Activite::findOrFail($id);
        $nom_serv=$request->input('nom_serv');
        $prix=$request->input('prix');
        $description=$request->input('description');


          $data=array();


          $data['nom_serv']=$service->nom_serv=$nom_serv;
          $data['prix']=$service->prix_serv=$prix;
          $data['decription']=$service->decription=$description;



          $service=Activite::updated($data);

          return redirect('/admin/GS/offre')->withToastSuccess('Service  Modifer   avec sucess !');







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
        //
        $service=Activite::findOrFail($id);


        Activite::destroy($id);

        $service->save();

        return redirect('/admin/GS/offre')->withToastSuccess('Offre Service  supprimer   avec sucess !');



    }
}
