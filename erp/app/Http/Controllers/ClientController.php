<?php

namespace App\Http\Controllers;

use App\c;
use App\Model\GP\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        $clients=Client::all();

        return view('admin.GP.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('admin.GP.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $validatedData = $request->validate([

            'type_compte'=>'required|max:255',
            'radio'=>'required|max:255',
            'nom_cl'=>'required|max:255',
            'tele'=>'required',
            'email'=>'required',
            'ICE'=>'required',
            'secteur_activite'=>'required',
            'adresse_cl'=>'required',
            'logo'=>'',
            'nom_banck'=>'',
            'num_compte'=>'',

        ]);

        $data=array();

        $data['type_compte']=$request->type_compte;
        $data['nom_cl']=$request->nom_cl;
        $data['raison_social']=$request->raison_social;
        $data['tele']=$request->tele;
        $data['email']=$request->email;
        $data['ICE']=$request->ICE;
        $data['secteur_activite']=$request->secteur_activite;
        $data['adresse_cl']=$request->adresse_cl;
        $data['nom_banck']=$request->nom_banck;
        $data['num_compte']=$request->num_compte;
        $data['logo']=$request->photo->getClientOriginalName();




        if($request->hasFile('photo')){

            $image=$request->photo;
            $image->move('uploads', $image->getClientOriginalName());

                     }

      $clients=Client::create($data);
      $clients->save();


      return redirect('/admin/GP/clients')->withToastSuccess('clients est cree avec sucess !');











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
        $clients=Client::findOrFail($id);


        return view('admin.GP.clients.edit',compact('clients'));
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
        $clients=Client::findOrFail($id);


        $data=array();

        $data['type_compte']=$clients->type_compte=$request->input('type_compte');
        $data['nom_cl']=$clients->nom_cl=$request->input('nom_cl');
        $data['raison_social']=$clients->raison_social=$request->input('raison_social');
        $data['tele']=$clients->tele=$request->input('tele');
        $data['email']=$clients->email=$request->input('email');
        $data['ICE']=$clients->ICE=$request->input('ICE');
        $data['secteur_activite']=$clients->secteur_activite=$request->input('secteur_activite');
        $data['adresse_cl']=$clients->adresse_cl=$request->input('adresse_cl');
        $data['nom_banck']=$clients->nom_banck=$request->input('nom_banck');
        $data['num_compte']=$clients->num_compte=$request->input('num_compte');


      //  $data['']
     //   $data['nom']=$request->nom;
    //    dd($data);

        // image upload
        if($request->hasFile('photo')){

            if(file_exists(public_path('uploads').$clients->photo)){

             unlink(public_path('uploads').$clients->photo);

                                        }

            $image=$request->photo;


            $image->move('uploads', $image->getClientOriginalName());


                $data['logo']=$clients->logo=$request->photo->getClientOriginalName();


        }


        // flash seesion


        $clients->save();


        return redirect('/admin/GP/clients')->withToastSuccess('clients est Modifier avec sucess !');
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
        $clients=Client::findOrFail($id);


        $clients->destroy($id);


        $clients->save();


        return redirect('/admin/GP/clients')->withToastSuccess('clients est Supprimer avec sucess !');
    }
}
